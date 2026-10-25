<?php

declare(strict_types=1);

namespace Exsited\Sdk\Client;

use Closure;
use Psr\Log\LoggerInterface;
use Psr\Log\LogLevel;
use Psr\Log\NullLogger;
use Exsited\Sdk\Auth\FileTokenStore;
use Exsited\Sdk\Auth\MemoryTokenStore;
use Exsited\Sdk\Auth\TokenCache;
use Exsited\Sdk\Auth\TokenProvider;
use Exsited\Sdk\Auth\TokenStore;
use Exsited\Sdk\Config\SdkConfig;
use Exsited\Sdk\Errors\InsecureTransportWarning;
use Exsited\Sdk\Errors\SdkError;
use Exsited\Sdk\Errors\SdkUsageError;
use Exsited\Sdk\Http\QueryParams;
use Exsited\Sdk\Http\RetryPolicy;
use Exsited\Sdk\Http\Transport;
use Exsited\Sdk\Http\UrlBuilder;
use Exsited\Sdk\Redaction;

/** The client: config in, ApiResponse out.
 *  @property-read BoundResource $abaFiles see AbaFiles
 *  @property-read BoundResource $accountEmails see AccountEmails
 *  @property-read BoundResource $accountGroups see AccountGroups
 *  @property-read BoundResource $accountingCodes see AccountingCodes
 *  @property-read BoundResource $accounts see Accounts
 *  @property-read BoundResource $actionScripts see ActionScripts
 *  @property-read BoundResource $additionalCodes see AdditionalCodes
 *  @property-read BoundResource $alertResponsibilities see AlertResponsibilities
 *  @property-read BoundResource $alertResponsibility see AlertResponsibility
 *  @property-read BoundResource $alerts see Alerts
 *  @property-read BoundResource $applications see Applications
 *  @property-read BoundResource $approvalProfiles see ApprovalProfiles
 *  @property-read BoundResource $approvalUserGroups see ApprovalUserGroups
 *  @property-read BoundResource $approvals see Approvals
 *  @property-read BoundResource $attributeAttachments see AttributeAttachments
 *  @property-read BoundResource $billingPeriods see BillingPeriods
 *  @property-read BoundResource $bookings see Bookings
 *  @property-read BoundResource $chargingPeriods see ChargingPeriods
 *  @property-read BoundResource $communicationProfiles see CommunicationProfiles
 *  @property-read BoundResource $communications see Communications
 *  @property-read BoundResource $countries see Countries
 *  @property-read BoundResource $creditNoteApplications see CreditNoteApplications
 *  @property-read BoundResource $creditNotes see CreditNotes
 *  @property-read BoundResource $customAttributes see CustomAttributes
 *  @property-read BoundResource $customComponents see CustomComponents
 *  @property-read BoundResource $customEvents see CustomEvents
 *  @property-read BoundResource $customFeatures see CustomFeatures
 *  @property-read BoundResource $customFields see CustomFields
 *  @property-read BoundResource $customForms see CustomForms
 *  @property-read BoundResource $dayOfMonth see DayOfMonth
 *  @property-read BoundResource $departments see Departments
 *  @property-read BoundResource $designations see Designations
 *  @property-read BoundResource $documentTemplates see DocumentTemplates
 *  @property-read BoundResource $emailTemplates see EmailTemplates
 *  @property-read BoundResource $employees see Employees
 *  @property-read BoundResource $events see Events
 *  @property-read BoundResource $express see Express
 *  @property-read BoundResource $externalDatabases see ExternalDatabases
 *  @property-read BoundResource $fulfillmentProfiles see FulfillmentProfiles
 *  @property-read BoundResource $fulfillmentTerms see FulfillmentTerms
 *  @property-read BoundResource $giftCertificates see GiftCertificates
 *  @property-read BoundResource $integrationConnections see IntegrationConnections
 *  @property-read BoundResource $inventoryAdjustments see InventoryAdjustments
 *  @property-read BoundResource $invoiceTerms see InvoiceTerms
 *  @property-read BoundResource $invoices see Invoices
 *  @property-read BoundResource $itemFulfillments see ItemFulfillments
 *  @property-read BoundResource $itemReceipts see ItemReceipts
 *  @property-read BoundResource $items see Items
 *  @property-read BoundResource $labours see Labours
 *  @property-read BoundResource $milestones see Milestones
 *  @property-read BoundResource $noteAttachments see NoteAttachments
 *  @property-read BoundResource $noteGroups see NoteGroups
 *  @property-read BoundResource $orders see Orders
 *  @property-read BoundResource $organisation see Organisation
 *  @property-read BoundResource $organisations see Organisations
 *  @property-read BoundResource $payments see Payments
 *  @property-read BoundResource $portals see Portals
 *  @property-read BoundResource $pricingPeriods see PricingPeriods
 *  @property-read BoundResource $proformaInvoices see ProformaInvoices
 *  @property-read BoundResource $purchaseCreditNoteApplications see PurchaseCreditNoteApplications
 *  @property-read BoundResource $purchaseCreditNotes see PurchaseCreditNotes
 *  @property-read BoundResource $purchaseExpress see PurchaseExpress
 *  @property-read BoundResource $purchaseInvoices see PurchaseInvoices
 *  @property-read BoundResource $purchaseOrders see PurchaseOrders
 *  @property-read BoundResource $purchasePayments see PurchasePayments
 *  @property-read BoundResource $purchaseRefunds see PurchaseRefunds
 *  @property-read BoundResource $quoteOrders see QuoteOrders
 *  @property-read BoundResource $receiveTerms see ReceiveTerms
 *  @property-read BoundResource $reconciliations see Reconciliations
 *  @property-read BoundResource $refunds see Refunds
 *  @property-read BoundResource $rentalAssets see RentalAssets
 *  @property-read BoundResource $reports see Reports
 *  @property-read BoundResource $returnMerchandiseAuthorisations see ReturnMerchandiseAuthorisations
 *  @property-read BoundResource $returnVendorAuthorizations see ReturnVendorAuthorizations
 *  @property-read BoundResource $roles see Roles
 *  @property-read BoundResource $salesReps see SalesReps
 *  @property-read BoundResource $salutations see Salutations
 *  @property-read BoundResource $settings see Settings
 *  @property-read BoundResource $settingsWorkflows see SettingsWorkflows
 *  @property-read BoundResource $shippingPackages see ShippingPackages
 *  @property-read BoundResource $shippingRules see ShippingRules
 *  @property-read BoundResource $systemEvents see SystemEvents
 *  @property-read BoundResource $tasks see Tasks
 *  @property-read BoundResource $teams see Teams
 *  @property-read BoundResource $timePeriods see TimePeriods
 *  @property-read BoundResource $timesheets see Timesheets
 *  @property-read BoundResource $uom see Uom
 *  @property-read BoundResource $usages see Usages
 *  @property-read BoundResource $webhooks see Webhooks
 *  @property-read BoundResource $workflows see Workflows
 *  @property-read BoundResource $zones see Zones */
final class ExsitedClient
{
    /** The header v4 collapses a repeated create under; it refuses a `POST` without one. */
    public const IDEMPOTENCY_HEADER = 'X-Idempotency-Key';
    private const API_VERSION_PARAM = 'api_version';
    /** What a 401 body says when the access token is the problem, plus the RFC 6750 codes;
     *  matched as whole words. `expired` alone is not one: a business message says it too. */
    private const TOKEN_FAILURE_MARKERS = [
        'unauthorized',
        'invalid_access_token',
        'invalid_token',
        'expired_token',
        'invalid_request',
    ];
    /** Read independently, not as a chain: v4 always sends `message`, and the word sits under `code`. */
    private const TOKEN_FAILURE_KEYS = ['code', 'error', 'message'];
    private const LOOPBACK_HOSTNAMES = ['localhost', 'localhost.localdomain'];

    private readonly Transport $transport;
    private readonly TokenStore $tokenStore;
    private readonly TokenProvider $tokenProvider;
    private readonly LoggerInterface $logger;
    private readonly bool $ownsTransport;
    /** @var array<string,BoundResource> */
    private array $resources = [];
    private bool $closed = false;

    public function __construct(
        private readonly SdkConfig $config,
        ?TokenStore $tokenStore = null,
        ?Transport $transport = null,
        ?RetryPolicy $retryPolicy = null,
        ?TokenProvider $tokenProvider = null,
        ?LoggerInterface $logger = null,
    ) {
        if ($transport !== null && $retryPolicy !== null) {
            throw new SdkUsageError(
                'pass transport or retry_policy, not both - an injected transport already carries '
                . 'its own policy; build it into the transport instead'
            );
        }

        $this->logger = $logger ?? ($config->logFile !== null && $config->logFile !== ''
            ? new FileLogger($config->logFile, $config->logLevel)
            : new NullLogger());

        if (!$config->verifySsl) {
            InsecureTransportWarning::emit(
                'TLS verification is disabled (verify_ssl=false); responses cannot be trusted',
                $this->logger
            );
        }
        $this->warnAboutPlaintextTransport();

        $this->ownsTransport = $transport === null;
        $this->transport = $transport ?? new Transport(
            $config,
            retryPolicy: $retryPolicy,
            onProgress: fn (string $message): null => $this->reportProgress($message),
        );
        $this->tokenStore = $tokenStore ?? self::buildTokenStore($config);
        $this->tokenProvider = $tokenProvider ?? new TokenProvider($config, $this->transport, $this->tokenStore);
    }

    public function __get(string $name): BoundResource
    {
        return $this->resources[$name] ??= new BoundResource($this, ResourceRegistry::resolveResourceModule($name));
    }

    public function config(): SdkConfig
    {
        return $this->config;
    }

    public function name(): string
    {
        return $this->config->clientName();
    }

    /** @return list<string> */
    public function listResourceNames(): array
    {
        return ResourceRegistry::registeredResourceNames();
    }

    /** @param array<string,mixed>|null $pathParams
     *  @param array<string,mixed>|null $queryParams
     *  @param array<string,string>|null $headers
     *  @param string|null $responseFormat `"map"`, `"json"` or `"dto"` for this one call;
     *      null takes the client's setting
     *  @param class-string<Dto>|(Closure(array<string,mixed>): Dto)|null $dtoType */
    public function sendApiRequest(
        string $httpMethod,
        string $path,
        ?array $pathParams = null,
        #[\SensitiveParameter] ?array $queryParams = null,
        #[\SensitiveParameter] mixed $jsonBody = null,
        #[\SensitiveParameter] mixed $formData = null,
        #[\SensitiveParameter] mixed $files = null,
        #[\SensitiveParameter] ?array $headers = null,
        bool $authenticated = true,
        ?bool $raiseOnError = null,
        ?string $responseFormat = null,
        string|Closure|null $dtoType = null,
    ): ApiResponse {
        $this->refuseWhenClosed();
        $method = self::normalizeMethod($httpMethod);
        self::validatePath($path);
        $resolvedFormat = $this->resolveResponseFormat($responseFormat);
        $jsonText = $this->resolveJsonPayload($jsonBody, $formData, $files);
        // Checked and copied before the OAuth2 grant: this call's own header set now.
        $headers = self::freezeSendableHeaders($headers, $files, $formData);
        // Once per call, so a retry and the 401 replay collapse into the first create.
        $headers = self::withIdempotencyKey($method, $headers);
        // One resolution of every live form value, shared by the wire and diagnostics.
        $formData = Transport::freezeFormPayload($formData);

        $resolvedPath = UrlBuilder::substitutePathParams($path, $this->seedApiVersion($path, $pathParams));
        $url = UrlBuilder::buildUrl($this->config->baseUrl(), $resolvedPath);
        $params = QueryParams::build($queryParams);
        $this->rejectDuplicatedQueryParams($url, $params);

        // Method, URL, query, boundary and body bytes are decided once here and both sends
        // below re-send that - before the grant, during which a caller's value may move.
        $wire = $this->transport->materializeRequest(
            $method,
            $url,
            $params,
            jsonBody: $jsonText,
            formData: $formData,
            files: $files,
            endpointTemplate: $path,
        );

        // Same boundary: a `files` entry may be an object whose `filename` can change.
        $reportedBody = $jsonText ?? $formData;
        $reportedFiles = Console::freezeMultipartLabels($files);
        $formEncoded = $jsonText === null && $formData !== null;
        $reportedPayload = Redaction::redactValue(Console::summarisePayload($reportedBody, $reportedFiles));

        $accessToken = $authenticated ? $this->tokenProvider->getAccessToken() : null;

        $sendOnce = function (?string $token) use ($wire, $reportedFiles, $headers, $reportedBody, $reportedPayload, $formEncoded, $resolvedFormat, $dtoType): ApiResponse {
            $requestHeaders = $this->buildRequestHeaders($headers, $token);
            try {
                return $this->transport->sendMaterializedRequest(
                    $wire,
                    $requestHeaders,
                    Redaction::redactMapping($requestHeaders),
                    $reportedPayload,
                    $resolvedFormat,
                    $dtoType,
                );
            } catch (SdkError $error) {
                if ($error->requestInfo instanceof RequestInfo) {
                    $this->reportExchange(new FailedExchange($error->requestInfo), $reportedBody, $reportedFiles, LogLevel::ERROR, $formEncoded);
                }
                throw $error;
            }
        };

        $response = $sendOnce($accessToken);

        // A dead token is replaced whether or not this request can be replayed, so the next call
        // works; a refresh that fails clears the refused token, compare-and-clear, so no process
        // inherits it. The replay re-sends the same representation, never a second one.
        if ($authenticated && self::meansExpiredToken($response, $method)) {
            $replayable = Transport::rewindMaterializedBody($wire);
            if ($replayable) {
                $this->reportExchange($response, $reportedBody, $reportedFiles, LogLevel::WARNING, $formEncoded);
            }
            try {
                $freshToken = $this->tokenProvider->refreshAccessToken($accessToken);
            } catch (\Throwable $problem) {
                $this->tokenProvider->invalidateAccessToken($accessToken);
                throw $problem;
            }
            if ($replayable) {
                $response = $sendOnce($freshToken);
            }
        }

        $this->reportExchange($response, $reportedBody, $reportedFiles, LogLevel::INFO, $formEncoded);

        $shouldRaise = $raiseOnError ?? $this->config->raiseOnError;
        if ($shouldRaise) {
            $response->raiseForStatus();
        }
        return $response;
    }

    public function sendGetRequest(string $path, ?array $pathParams = null, #[\SensitiveParameter] ?array $queryParams = null, #[\SensitiveParameter] mixed $jsonBody = null, #[\SensitiveParameter] mixed $formData = null, #[\SensitiveParameter] mixed $files = null, #[\SensitiveParameter] ?array $headers = null, bool $authenticated = true, ?bool $raiseOnError = null, ?string $responseFormat = null, string|Closure|null $dtoType = null): ApiResponse
    {
        return $this->sendApiRequest('GET', $path, $pathParams, $queryParams, $jsonBody, $formData, $files, $headers, $authenticated, $raiseOnError, $responseFormat, $dtoType);
    }

    public function sendPostRequest(string $path, ?array $pathParams = null, #[\SensitiveParameter] ?array $queryParams = null, #[\SensitiveParameter] mixed $jsonBody = null, #[\SensitiveParameter] mixed $formData = null, #[\SensitiveParameter] mixed $files = null, #[\SensitiveParameter] ?array $headers = null, bool $authenticated = true, ?bool $raiseOnError = null, ?string $responseFormat = null, string|Closure|null $dtoType = null): ApiResponse
    {
        return $this->sendApiRequest('POST', $path, $pathParams, $queryParams, $jsonBody, $formData, $files, $headers, $authenticated, $raiseOnError, $responseFormat, $dtoType);
    }

    public function sendPutRequest(string $path, ?array $pathParams = null, #[\SensitiveParameter] ?array $queryParams = null, #[\SensitiveParameter] mixed $jsonBody = null, #[\SensitiveParameter] mixed $formData = null, #[\SensitiveParameter] mixed $files = null, #[\SensitiveParameter] ?array $headers = null, bool $authenticated = true, ?bool $raiseOnError = null, ?string $responseFormat = null, string|Closure|null $dtoType = null): ApiResponse
    {
        return $this->sendApiRequest('PUT', $path, $pathParams, $queryParams, $jsonBody, $formData, $files, $headers, $authenticated, $raiseOnError, $responseFormat, $dtoType);
    }

    public function sendPatchRequest(string $path, ?array $pathParams = null, #[\SensitiveParameter] ?array $queryParams = null, #[\SensitiveParameter] mixed $jsonBody = null, #[\SensitiveParameter] mixed $formData = null, #[\SensitiveParameter] mixed $files = null, #[\SensitiveParameter] ?array $headers = null, bool $authenticated = true, ?bool $raiseOnError = null, ?string $responseFormat = null, string|Closure|null $dtoType = null): ApiResponse
    {
        return $this->sendApiRequest('PATCH', $path, $pathParams, $queryParams, $jsonBody, $formData, $files, $headers, $authenticated, $raiseOnError, $responseFormat, $dtoType);
    }

    public function sendDeleteRequest(string $path, ?array $pathParams = null, #[\SensitiveParameter] ?array $queryParams = null, #[\SensitiveParameter] mixed $jsonBody = null, #[\SensitiveParameter] mixed $formData = null, #[\SensitiveParameter] mixed $files = null, #[\SensitiveParameter] ?array $headers = null, bool $authenticated = true, ?bool $raiseOnError = null, ?string $responseFormat = null, string|Closure|null $dtoType = null): ApiResponse
    {
        return $this->sendApiRequest('DELETE', $path, $pathParams, $queryParams, $jsonBody, $formData, $files, $headers, $authenticated, $raiseOnError, $responseFormat, $dtoType);
    }

    /** @param callable(self): mixed $callback run with a client closed however it ends */
    public static function withClient(SdkConfig $config, callable $callback): mixed
    {
        $client = new self($config);
        try {
            return $callback($client);
        } finally {
            $client->closeClient();
        }
    }

    /** Idempotent; every later request-issuing call is refused. */
    public function closeClient(): void
    {
        if ($this->closed) {
            return;
        }
        $this->closed = true;
        try {
            if ($this->ownsTransport) {
                $this->transport->closeTransport();
            }
        } finally {
            if ($this->logger instanceof FileLogger) {
                $this->logger->close();
            }
        }
    }

    private function refuseWhenClosed(): void
    {
        if (!$this->closed) {
            return;
        }
        throw new SdkUsageError(
            "client '{$this->name()}' is closed: closeClient() has already run, so this request "
            . 'was not sent; build a new ExsitedClient to keep talking to the API'
        );
    }

    private static function buildTokenStore(SdkConfig $config): TokenStore
    {
        $path = $config->tokenCachePath();
        if ($path !== null && $path !== '') {
            return new FileTokenStore(
                $path,
                TokenCache::buildCredentialsNamespace(
                    $config->baseUrl(),
                    $config->clientId(),
                    $config->clientSecret(),
                    grantType: $config->grantType(),
                )
            );
        }
        return new MemoryTokenStore();
    }

    /** @param array<string,mixed>|null $pathParams @return array<string,mixed> */
    private function seedApiVersion(string $path, ?array $pathParams): array
    {
        $resolved = $pathParams ?? [];
        if (in_array(self::API_VERSION_PARAM, UrlBuilder::findPathParamNames($path), true)
            && !array_key_exists(self::API_VERSION_PARAM, $resolved)) {
            $resolved[self::API_VERSION_PARAM] = $this->config->apiVersion;
        }
        return $resolved;
    }

    /** @param array<string,string>|null $headers @return array<string,string> */
    private function buildRequestHeaders(#[\SensitiveParameter] ?array $headers, ?string $accessToken): array
    {
        $own = ['Accept' => 'application/json', 'User-Agent' => $this->config->userAgent];
        $merged = [];
        foreach ($own as $name => $value) {
            $merged[strtolower($name)] = [$name, $value];
        }
        foreach ($this->config->defaultHeadersDict() as $name => $value) {
            $merged[strtolower((string) $name)] = [(string) $name, $value];
        }
        foreach ($headers ?? [] as $name => $value) {
            $name = self::headerName($name);
            $merged[strtolower($name)] = [$name, self::headerValue($name, $value)];
        }
        if ($accessToken !== null && $accessToken !== '') {
            $merged['authorization'] = ['Authorization', "Bearer {$accessToken}"];
        }
        $out = [];
        foreach ($merged as [$name, $value]) {
            $out[$name] = $value;
        }
        return $out;
    }

    /** Refused before the OAuth2 grant so a typo does not cost a credentialled request; the
     *  transport re-checks the merged set, and correctness rests on that check.
     *  @param array<string,string>|null $headers @return array<string,string> validated copy */
    private static function freezeSendableHeaders(
        #[\SensitiveParameter] ?array $headers,
        #[\SensitiveParameter] mixed $files,
        #[\SensitiveParameter] mixed $formData,
    ): array {
        $checked = [];
        foreach ($headers ?? [] as $name => $value) {
            $name = self::headerName($name);
            $checked[$name] = self::headerValue($name, $value);
        }
        Transport::refuseUnsendableHeaders($checked);
        Transport::refuseUnsendableMultipartLabels($files, $formData);
        return $checked;
    }

    /** A fresh uuid under IDEMPOTENCY_HEADER on a `POST`; a caller's own key, in any spelling, wins.
     *  @param array<string,string> $headers @return array<string,string> */
    private static function withIdempotencyKey(string $method, #[\SensitiveParameter] array $headers): array
    {
        if ($method !== 'POST') {
            return $headers;
        }
        foreach (array_keys($headers) as $name) {
            if (strcasecmp((string) $name, self::IDEMPOTENCY_HEADER) === 0) {
                return $headers;
            }
        }
        $headers[self::IDEMPOTENCY_HEADER] = self::newUuid();
        return $headers;
    }

    /** A random RFC 9562 version 4 uuid. */
    private static function newUuid(): string
    {
        $bytes = random_bytes(16);
        $bytes[6] = chr((ord($bytes[6]) & 0x0f) | 0x40);
        $bytes[8] = chr((ord($bytes[8]) & 0x3f) | 0x80);
        return vsprintf('%s%s-%s-%s-%s-%s%s%s', str_split(bin2hex($bytes), 4));
    }

    private static function headerName(mixed $key): string
    {
        if (!is_string($key)) {
            throw new SdkUsageError('headers: a header name must be text, got ' . get_debug_type($key));
        }
        return $key;
    }

    private static function headerValue(string $name, mixed $value): string
    {
        if (!is_string($value)) {
            throw new SdkUsageError("headers: the value for '{$name}' must be text, got " . get_debug_type($value));
        }
        return $value;
    }

    /** Serialised here and nowhere else, or a value that answers differently twice is
     *  validated as one document and sent as another. */
    private function resolveJsonPayload(#[\SensitiveParameter] mixed $jsonBody, #[\SensitiveParameter] mixed $formData, #[\SensitiveParameter] mixed $files): ?string
    {
        if ($jsonBody !== null && $formData !== null) {
            throw new SdkUsageError('pass json_body or form_data, not both - they are different content types');
        }
        if ($jsonBody !== null && $files !== null) {
            throw new SdkUsageError('pass json_body or files, not both - a multipart body replaces the JSON one');
        }
        if ($jsonBody === null) {
            return null;
        }
        if ($jsonBody instanceof Dto) {
            $jsonBody = $jsonBody->toMap();
        }
        // Parsed only to verify: the bytes that cross the wire are the caller's own.
        if (is_string($jsonBody)) {
            $decoded = json_decode($jsonBody, true);
            if (json_last_error() !== JSON_ERROR_NONE) {
                throw new SdkUsageError('json_body: not valid JSON: ' . json_last_error_msg());
            }
            if (!is_array($decoded)) {
                throw new SdkUsageError(
                    'json_body: a JSON string must hold an object or an array, got ' . get_debug_type($decoded)
                );
            }
            return $jsonBody;
        }
        if (!is_array($jsonBody)) {
            throw new SdkUsageError('json_body must be a JSON string, a mapping, a list or a DTO, got ' . get_debug_type($jsonBody));
        }
        $encoded = json_encode($jsonBody, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE);
        if ($encoded === false) {
            throw new SdkUsageError('json_body is not JSON-serialisable: ' . json_last_error_msg());
        }
        return $encoded;
    }

    /** An unrecognised value raises before any I/O rather than falling back to `"map"`. */
    private function resolveResponseFormat(?string $responseFormat): string
    {
        if ($responseFormat === null) {
            return $this->config->responseFormat;
        }
        $chosen = strtolower(trim($responseFormat));
        if (!in_array($chosen, SdkConfig::VALID_RESPONSE_FORMATS, true)) {
            throw new SdkUsageError(
                'response_format: expected one of ' . implode(', ', SdkConfig::VALID_RESPONSE_FORMATS)
                . ", got '{$responseFormat}'"
            );
        }
        return $chosen;
    }

    /** @param array<string,mixed> $params */
    private function rejectDuplicatedQueryParams(string $url, array $params): void
    {
        if ($params === []) {
            return;
        }
        $query = parse_url($url, PHP_URL_QUERY);
        if (!is_string($query) || $query === '') {
            return;
        }
        $existing = [];
        foreach (explode('&', $query) as $chunk) {
            $existing[urldecode(explode('=', $chunk, 2)[0])] = true;
        }
        $clash = array_values(array_intersect(array_keys($existing), array_keys($params)));
        if ($clash !== []) {
            sort($clash);
            throw new SdkUsageError(
                'query_params ' . implode(', ', $clash) . " already appear in the path's own query "
                . 'string, so each would be sent twice with two values - pass them once, in one place'
            );
        }
    }

    private function warnAboutPlaintextTransport(): void
    {
        $parts = parse_url($this->config->baseUrl());
        $scheme = $parts['scheme'] ?? '';
        $host = $parts['host'] ?? '';
        if ($scheme !== 'http' || self::isLoopbackHost($host)) {
            return;
        }
        // The host is named: a cleartext warning is not actionable without it.
        InsecureTransportWarning::emit(
            "base_url uses http://, so every request to {$host} crosses the network in cleartext - "
            . 'the bearer token, and the credentials in the token request itself. Use https:// unless '
            . 'this is a local development instance',
            $this->logger
        );
    }

    private static function isLoopbackHost(string $host): bool
    {
        if ($host === '') {
            return false;
        }
        if (in_array(strtolower($host), self::LOOPBACK_HOSTNAMES, true)) {
            return true;
        }
        $address = trim($host, '[]');
        if (filter_var($address, FILTER_VALIDATE_IP) !== false) {
            return str_starts_with($address, '127.') || $address === '::1';
        }
        return false;
    }

    /** @var array<string,int> PSR-3 levels ranked, so config.logLevel can gate them. */
    private const LOG_SEVERITY = [
        'debug' => 0, 'info' => 1, 'notice' => 1, 'warning' => 2,
        'error' => 3, 'critical' => 4, 'alert' => 5, 'emergency' => 6,
    ];

    /** Gated here because an injected PSR-3 logger knows nothing about config.logLevel. */
    private function log(string $level, string $message): void
    {
        $emitted = self::LOG_SEVERITY[strtolower($level)] ?? 1;
        $threshold = self::LOG_SEVERITY[strtolower($this->config->logLevel)] ?? 2;
        if ($emitted < $threshold) {
            return;
        }
        $this->logger->log($level, $message);
    }

    private function reportProgress(string $message): void
    {
        if ($this->config->printApiInfo && !$this->config->printOnlyOnError) {
            echo "| {$message}\n";
        }
        $this->log(LogLevel::INFO, $message);
    }

    private function reportExchange(object $response, mixed $body, #[\SensitiveParameter] mixed $files, string $level = LogLevel::INFO, bool $formEncoded = false): void
    {
        $config = $this->config;
        $wantsPrint = $config->printApiInfo || $config->printRequestPayload || $config->printResponseBody
            || $config->printHeaders || $config->printCurl;
        if ($wantsPrint && !($config->printOnlyOnError && $response->succeeded())) {
            echo Console::renderExchange($response, $body, $files, $config, $formEncoded) . "\n";
        }
        $info = $response->requestInfo;
        // A structural allow-list. Never the resolved URL or the query string, which carry
        // the record id and what was searched for.
        $category = $response->errorType ?? null;
        $this->log(
            $level,
            "{$info->httpMethod} " . self::loggedEndpoint($info) . " -> {$response->statusCode}"
            . ($category instanceof ErrorType && $category !== ErrorType::None ? " {$category->value}" : '')
            . " in {$info->elapsedSeconds}s (attempt {$info->attemptCount}/{$info->maxAttempts})"
        );
        // logBodies is the opt-in for the withheld half, resolved URL included.
        if ($config->logBodies) {
            $this->log(
                LogLevel::DEBUG,
                'url=' . $info->url
                . ' payload=' . Console::renderJsonValue(Redaction::redactValue($body), true)
                . ' response=' . Console::renderJsonValue(Redaction::redactValue($response->map ?? null), true)
            );
        }
    }

    /** The declared path template, never the resolved URL. */
    private static function loggedEndpoint(RequestInfo $info): string
    {
        $template = $info->endpointTemplate;
        return $template !== null && $template !== '' ? $template : '(endpoint not declared)';
    }

    private static function meansExpiredToken(ApiResponse $response, string $httpMethod): bool
    {
        if ($response->statusCode !== 401) {
            return false;
        }
        // `map`, never `data`: read off the API's own body, not the caller's chosen form.
        $data = $response->map;
        if (!is_array($data)) {
            // No reason to read: a safe method changed nothing, so replaying it is free.
            return RetryPolicy::isSafeMethod($httpMethod);
        }
        foreach (self::TOKEN_FAILURE_KEYS as $key) {
            if (self::namesATokenFailure($data[$key] ?? null)) {
                return true;
            }
        }
        return false;
    }

    /** The whole value or any whitespace-separated word of it, never a substring. */
    private static function namesATokenFailure(mixed $value): bool
    {
        $text = self::normalisedReason($value);
        if ($text === '') {
            return false;
        }
        if (in_array($text, self::TOKEN_FAILURE_MARKERS, true)) {
            return true;
        }
        foreach (preg_split('/\s+/', $text) ?: [] as $word) {
            if (in_array($word, self::TOKEN_FAILURE_MARKERS, true)) {
                return true;
            }
        }
        return false;
    }

    /** An array or a non-stringable object carries no marker, so it reduces to empty. */
    private static function normalisedReason(mixed $value): string
    {
        if (is_array($value) || (is_object($value) && !method_exists($value, '__toString'))) {
            return '';
        }
        return strtolower(trim((string) ($value ?? '')));
    }

    /** An RFC 9110 `token`; an unfamiliar one is accepted and treated as a write. */
    private static function normalizeMethod(string $httpMethod): string
    {
        $method = strtoupper(trim($httpMethod));
        if ($method === '') {
            throw new SdkUsageError("http_method must name a verb, got '{$httpMethod}'");
        }
        if (!RetryPolicy::isMethodToken($method)) {
            throw new SdkUsageError(
                'http_method: that value is not a method - RFC 9110 allows only the token '
                . 'character set, so a space, a colon, a control byte and every non-ASCII byte '
                . 'are all outside it'
            );
        }
        return $method;
    }

    private static function validatePath(string $path): void
    {
        if (trim($path) === '') {
            throw new SdkUsageError(
                "path must name an endpoint, got '{$path}' - an empty path requests the API root, "
                . 'which is no endpoint'
            );
        }
    }
}
