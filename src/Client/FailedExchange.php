<?php

declare(strict_types=1);

namespace Exsited\Client;

/** A request that never produced a response, in the shape the console reads. */
final class FailedExchange
{
    public readonly int|string $statusCode;
    public readonly mixed $data;
    /** Always null - carried because the console reads `map` off whatever it is handed. */
    public readonly mixed $map;
    /** @var array<string,string> */
    public readonly array $headers;
    public readonly RequestInfo $requestInfo;

    public function __construct(RequestInfo $requestInfo)
    {
        $this->statusCode = 'no response';
        $this->data = null;
        $this->map = null;
        $this->headers = [];
        $this->requestInfo = $requestInfo;
    }

    public function succeeded(): bool
    {
        return false;
    }
}
