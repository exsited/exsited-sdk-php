<?php

declare(strict_types=1);

namespace Exsited\Sdk\Http;

use GuzzleHttp\Client;
use GuzzleHttp\Handler\CurlFactory;
use GuzzleHttp\Handler\CurlMultiHandler;
use GuzzleHttp\HandlerStack;
use GuzzleHttp\Psr7\HttpFactory;
use GuzzleHttp\Psr7\Utils;
use GuzzleHttp\RequestOptions;
use Psr\Http\Client\ClientInterface;
use Psr\Http\Message\RequestInterface;
use Psr\Http\Message\ResponseInterface;
use Exsited\Sdk\Config\SdkConfig;
use Exsited\Sdk\Redaction;

/** Builds the default Guzzle client: redirects never followed, verify from the config,
 *  connect/read timeouts, proxy, and 4xx/5xx returned as responses rather than thrown. */
final class GuzzleClientFactory
{
    public static function create(SdkConfig $config): ClientInterface
    {
        [$connect, $read] = $config->timeout();
        $handler = HandlerStack::create(new CurlMultiHandler([
            'handle_factory' => new CurlFactory($config->poolMaxsize),
        ]));
        $handler->push(self::capResponseBytes($config->maxResponseBytes), 'exsited_response_cap');
        $options = [
            RequestOptions::ALLOW_REDIRECTS => false,
            RequestOptions::HTTP_ERRORS => false,
            // The path, not the bytes: curl opens and parses it, and its size ceiling is
            // applied in SdkConfig::validate().
            RequestOptions::VERIFY => $config->caBundle ?? $config->verifySsl,
            // curl's `CURLOPT_TIMEOUT`: total transfer time for one attempt, body included,
            // not an idle window, and every retry attempt gets the whole of it again.
            RequestOptions::TIMEOUT => $read,
            RequestOptions::CONNECT_TIMEOUT => $connect,
            // No RequestOptions::STREAM: CurlMultiHandler ignores it, so the middleware below enforces the
            // size cap. No Guzzle retry middleware either - Transport owns retrying.
            'handler' => $handler,
        ];
        if ($config->proxyUrl !== null && $config->proxyUrl !== '') {
            $options[RequestOptions::PROXY] = $config->proxyUrl;
        }
        return new Client($options);
    }

    public static function factory(): HttpFactory
    {
        return new HttpFactory();
    }

    /** Per request, not per client: the sink holds state, so a shared instance would carry
     *  one response's total into the next. */
    private static function capResponseBytes(int $cap): callable
    {
        return static fn (callable $next): callable =>
            static function (RequestInterface $request, array $options) use ($next, $cap) {
                $sink = new CappedSink(Utils::streamFor(Utils::tryFopen('php://temp', 'r+')), $cap);
                $declared = null;
                // Redacted once here so neither the URI nor the request travels as an argument
                // into the throwing code, which PHP would record in the exception's trace.
                $method = $request->getMethod();
                $redactedUrl = Redaction::redactText((string) $request->getUri());
                $options[RequestOptions::SINK] = $sink;
                $options[RequestOptions::ON_HEADERS] = static function (
                    ResponseInterface $response
                ) use ($method, $redactedUrl, $cap, &$declared): void {
                    $header = $response->getHeaderLine('Content-Length');
                    if ($header === '' || !ctype_digit($header) || (int) $header <= $cap) {
                        return;
                    }
                    $declared = (int) $header;
                    // A throw is the only way to tell curl to stop before the body starts.
                    throw new ResponseTooLargeException($method, $redactedUrl, $cap, $declared, null);
                };

                return $next($request, $options)->otherwise(
                    static function (\Throwable $failure) use ($method, $redactedUrl, $cap, $sink, &$declared) {
                        if ($declared !== null) {
                            throw new ResponseTooLargeException($method, $redactedUrl, $cap, $declared, null);
                        }
                        if ($sink->exceeded()) {
                            throw new ResponseTooLargeException($method, $redactedUrl, $cap, null, $sink->accepted());
                        }
                        throw $failure;
                    }
                );
            };
    }
}
