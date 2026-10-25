# Exsited PHP SDK, v4

PHP client for the Exsited **v4** REST API. Handles OAuth2 with a cross-process token cache,
retry with backoff, connection reuse, corporate TLS and proxies, content-type decoding, a
typed error hierarchy, secret redaction and terminal diagnostics.

The wire is untouched: the SDK sends what you give it and hands back the body as it arrived.
The API owns its shapes. A typed view sits **beside** that raw path for callers who want one,
never instead of it, and never dropping a field.

```php
use Exsited\Client\ClientRegistry;
use Exsited\Config\AuthConfig;
use Exsited\Resources\Accounts\AccountsUrls;

ClientRegistry::registerInstances([
    new AuthConfig(
        clientName: 'default',
        baseUrl: getenv('EXSITED_BASE_URL'),
        clientId: getenv('EXSITED_CLIENT_ID'),
        clientSecret: getenv('EXSITED_CLIENT_SECRET'),
        redirectUri: getenv('EXSITED_REDIRECT_URI'),
    ),
]);

$accounts = ClientRegistry::withClient(fn ($client) =>
    $client->accounts->getAccounts(['limit' => 50])->map[AccountsUrls::ACCOUNTS_KEY]);

foreach ($accounts as $account) {
    echo $account['id'], ' ', $account['name'], PHP_EOL;
}
```

| | |
|---|---|
| Package | [`exsited/exsited`](https://packagist.org/packages/exsited/exsited) on Packagist |
| Namespace | `Exsited` |
| PHP | 8.2 or newer |
| Dependencies | `guzzlehttp/guzzle`, PSR-18/17/7/3 interfaces |
| Endpoints | 865 in 91 resource families, documented at [exsited.mintlify.app](https://exsited.mintlify.app/introduction) |

## Contents

- [Install](#install)
- [Credentials](#credentials)
- [Building a client](#building-a-client)
- [Configuration](#configuration) - all 35 settings
- [Authentication](#authentication)
- [Requests](#requests)
- [Bodies](#bodies-a-map-raw-json-or-a-dto)
- [Query parameters](#query-parameters)
- [Responses](#responses)
- [Errors](#errors)
- [Pagination](#pagination)
- [Diagnostics](#diagnostics)
- [Retries](#retries)
- [Transport, TLS and proxies](#transport-tls-and-proxies)
- [Multiple instances](#multiple-instances)
- [Endpoints](#endpoints)
- [Troubleshooting](#troubleshooting)
- [Implementation notes](#implementation-notes)

## Install

```bash
composer require exsited/exsited:^4.0
```

**Prerequisites.** PHP 8.2 or newer and Composer 2. The `curl`, `ctype`, `filter`, `json` and
`mbstring` extensions are declared requirements, so Composer refuses an install on a PHP build
missing one and `composer check-platform-reqs` names it. The default HTTP factory builds a
Guzzle `CurlMultiHandler` directly, so `curl` stays a requirement even if you
[inject your own PSR-18 client](#injecting-a-psr-18-client).

Confirm the install:

```bash
php -r 'require "vendor/autoload.php"; exit(class_exists(Exsited\Client\ExsitedClient::class) ? 0 : 1);' && echo wired
```

## Credentials

**The SDK never reads a credential from the environment.** Build an `AuthConfig` from
wherever your credentials live and hand it over; `getenv()` above is only that example's
choice. One non-secret setting is read from the environment when no code names it,
`responseFormat`, which decides how a body is presented and never what is sent.

```php
use Exsited\Config\AuthConfig;

$auth = new AuthConfig(
    baseUrl: 'https://dev-api.exsited.com',
    clientId: '...',
    clientSecret: '...',
    redirectUri: 'https://dev.exsited.com/',
    clientName: 'production',
);
```

| Field | Required | Default | Notes |
|---|---|---|---|
| `baseUrl` | yes | | Needs scheme and host; trailing `/` stripped |
| `clientId` | yes | | |
| `clientSecret` | yes | | Redacted in `__toString`; `var_dump()` and `print_r()` of an `AuthConfig` print it |
| `redirectUri` | yes | | Sent in the token request body |
| `clientName` | yes | | Label in logs; selects the instance by name |
| `grantType` | | `"client_credentials"` | What this API expects |
| `tokenCachePath` | | platform cache dir | A path moves it, `null` keeps the token in memory, `AuthConfig::USE_DEFAULT_TOKEN_CACHE` restores the default |

There is no `authString`: this API has no such credential. Validation runs at construction
and reports every problem at once. `withOverrides()` returns a new validated instance; the
original is untouched.

## Building a client

Three ways, all equivalent.

**One instance, explicit:**

```php
use Exsited\Client\ExsitedClient;
use Exsited\Config\SdkConfig;

$client = new ExsitedClient(new SdkConfig($auth, raiseOnError: true));
$response = $client->accounts->getAccounts(['limit' => 50]);
$client->closeClient();
```

**Registered once, built anywhere:**

```php
ClientRegistry::registerInstances([$auth, $stagingAuth]);

$client = ClientRegistry::buildClient();                              // first entry
$client = ClientRegistry::buildClient('staging');                     // by clientName
$client = ClientRegistry::buildClient(overrides: ['maxRetries' => 3]);
```

**Auto-closing.** `withClient()` closes the client whether the callback returns or throws:

```php
$count = ClientRegistry::withClient(fn ($client) => count($client->accounts->getAccounts()->map['data']));
$count = ExsitedClient::withClient($config, fn ($client) => count($client->accounts->getAccounts()->map['data']));
```

Closing is a latch: a closed client refuses every later request with `SdkUsageError` rather
than opening a new connection. Closing twice is a no-op.

## Configuration

`AuthConfig` is credentials; `SdkConfig` is behaviour. Every setting has a default, so pass only
what you are changing. Configs are frozen: `withOverrides()` returns a new one.

```php
$config = new SdkConfig($auth, maxRetries: 3, printApiInfo: true, logLevel: 'DEBUG');
$noisy  = $config->withOverrides(['printCurl' => true]);
```

| Setting | Default | Notes |
|---|---|---|
| `apiVersion` | `"v4"` | Fills `{api_version}` in resource paths. Accepts `4` or `v4`. Not the token endpoint, see [Authentication](#authentication) |
| `timeoutSeconds` | `30.0` | A hard ceiling on the whole of one attempt, connection included ([Timeouts](#timeouts)) |
| `connectTimeoutSeconds` | `10.0` | The connect phase alone, inside that ceiling |
| `maxRetries` | `1` | Total attempts **including the first**, so `1` disables retry |
| `retryableHttpCodes` | `[429,500,502,503,504]` | Inert while `maxRetries` is `1` |
| `unsafeRetryableHttpCodes` | `[]` | The second gate every method that is not safe must also pass |
| `retryBackoffSeconds` | `0.5` | Base for exponential backoff with full jitter |
| `retryBackoffMaxSeconds` | `20.0` | Ceiling for one sleep; caps `Retry-After` too |
| `verifySsl` | `true` | `false` warns on every client built |
| `caBundle` | `null` | PEM path. Contradicts `verifySsl: false`; a missing file fails at construction |
| `proxyUrl` | `null` | Applied to `http` and `https` |
| `poolMaxsize` | `10` | Idle connections kept for reuse |
| `maxResponseBytes` | `67108864` (64 MiB) | The most of one response body the SDK buffers |
| `maxRequestBytes` | `67108864` (64 MiB) | The most one finished request body may be, framing included |
| `maxRequestSourceBytes` | `67108864` (64 MiB) | The most of your bytes one body may carry, across every multipart part |
| `maxMultipartOverheadBytes` | `1048576` (1 MiB) | The most multipart framing one body may carry |
| `maxSpoolBytes` | `67108864` (64 MiB) | The most this SDK copies out of one borrowed resource or stream |
| `maxTokenCacheBytes` | `1048576` (1 MiB) | Only the default is accepted; the file token store keeps its own 1 MiB ceiling, so any other value raises `SdkConfigError` |
| `maxCaBundleBytes` | `8388608` (8 MiB) | The largest `caBundle` accepted, checked when the config is built |
| `defaultHeaders` | `[]` | Merged into every request |
| `raiseOnError` | `false` | `true` throws `SdkError` instead of returning a failed response |
| `userAgent` | `exsited-php-sdk/<version>` | |
| `logLevel` | `"WARNING"` | `DEBUG`/`INFO`/`WARNING`/`ERROR`/`CRITICAL` |
| `logBodies` | `false` | Resolved URL, payload and response in DEBUG records, redacted |
| `logFile` | `null` | Write records to this path |
| `printApiInfo` | `false` | Client, method, endpoint, params, status, attempt, elapsed |
| `printRequestPayload` | `false` | The body sent, redacted |
| `printResponseBody` | `false` | The body received; bytes summarised, never dumped |
| `printHeaders` | `false` | Request and response headers, redacted |
| `printCurl` | `false` | A curl reproduction of the call, token redacted |
| `printOnlyOnError` | `false` | Suppress the block on 2xx |
| `printFormat` | `"pretty"` | Or `"compact"`, one line per call |
| `printColor` | `false` | ANSI colour, forced off when stdout is not a TTY |
| `printMaxChars` | `0` | Truncate a rendered block; `0` is unlimited |
| `responseFormat` | `"map"` | What `$response->data` holds: `"map"`, `"json"` or `"dto"`. Falls back to `EXSITED_RESPONSE_FORMAT` when not named here |

`responseFormat` resolves in four tiers, highest first: the call, the client,
`EXSITED_RESPONSE_FORMAT` in the environment, then the built-in `"map"`. The environment sits
below code on purpose, so a stray variable cannot change behaviour spelled out in source. An
unrecognised value is refused when the client is built, naming the three it accepts.
`$client->config()->responseFormat` says which one is in force.

## Authentication

Automatic. OAuth2 `client_credentials` against `POST /api/v4/oauth2/token` on first use,
cached, and renewed 60 seconds before expiry. The token endpoint is
`TokenProvider::TOKEN_PATH`, and the refresh grant uses the same path. A renewal tries the
refresh grant first and falls back to a full `client_credentials` request.

**A new grant on these credentials invalidates the previous token.** One process granting puts
every other process holding the old token into `401`, and this API says so with
`{"object": "error", "code": "unauthorized", ...}` and no `error` key. The client reads the
`code`, `error` and `message` tiers independently, and a `401` that names a dead token refreshes
once and replays the request. The refreshed token replaces the dead one in the cache whether or
not the request can be replayed, and a refresh that fails evicts the dead token with a
compare-and-clear, so a token another process minted meanwhile survives. A `401` that means
anything else is returned as it is.

Token cache location:

| Platform | Path |
|---|---|
| Windows | `%LOCALAPPDATA%\exsited\exsited_php_token.json` |
| macOS | `~/Library/Caches/exsited/exsited_php_token.json` |
| Linux | `$XDG_CACHE_HOME/exsited/exsited_php_token.json`, else `~/.cache/exsited/exsited_php_token.json` |

Never the working tree: the file holds a **refresh token**. It is rewritten through a temp file
and a rename under a sidecar `flock()`, and entries are keyed by a fingerprint of `baseUrl`,
`clientId`, `clientSecret` and `grantType`, so one file serves many instances.

```php
new AuthConfig(..., tokenCachePath: '/path/of/your/choosing/token.json');
new AuthConfig(..., tokenCachePath: null);                                 // memory only
new AuthConfig(..., tokenCachePath: AuthConfig::USE_DEFAULT_TOKEN_CACHE);  // back to the table
```

**The lock fails closed.** A sidecar that cannot be opened, and a wait longer than 30 seconds,
raise `SdkTokenLockError` rather than falling back to a guard local to this process. A cache
file that is absent or empty means "no token yet"; one that exists and cannot be read or
parsed raises `SdkTokenCacheError` rather than buying a fresh token on every call.

## Requests

Resource methods for covered endpoints; generic senders for everything else.

```php
$client->sendGetRequest($path, queryParams: [...]);
$client->sendPostRequest($path, jsonBody: [...]);
$client->sendPutRequest($path, pathParams: ['id' => 1], jsonBody: [...]);
$client->sendPatchRequest($path, jsonBody: [...]);
$client->sendDeleteRequest($path, pathParams: ['id' => 1]);
$client->sendApiRequest('HEAD', $path);
```

| Argument | Notes |
|---|---|
| `pathParams` | One per `{name}` in the path. `{api_version}` is filled from config |
| `queryParams` | Spelled exactly as the API spells them, snake_case in v4 |
| `jsonBody` | A PHP array, a raw JSON string **or** a DTO. Mutually exclusive with `formData` and `files` |
| `formData` | Form-encoded body |
| `files` | Multipart upload: `['file' => ['report.csv', $handle, 'text/csv']]`, the type optional. A handle you opened stays yours and is never closed |
| `headers` | Beat `defaultHeaders`; cannot override `Authorization` |
| `authenticated` | `false` skips the token entirely |
| `raiseOnError` | Overrides the config for this one call |
| `responseFormat` | What `$response->data` holds for this one call |

An absolute `http(s)://` path **on the configured origin** is used as it is. One on any other
scheme, host or port is refused, and so is one carrying credentials or a fragment: every
request leaves with `Authorization: Bearer` attached, so a foreign host would be handed your
token. Path parameters are percent-encoded with an empty safe set, so `"a/b"` becomes `a%2Fb`;
missing, blank, dot-only or unknown ones raise `SdkUsageError` listing every problem, before any
I/O and before a token is asked for. Caller headers and multipart labels are checked the same
way, before the grant.

Every `POST` carries an `X-Idempotency-Key` (`ExsitedClient::IDEMPOTENCY_HEADER`), because v4
refuses one without it. The client generates a fresh uuid once per call, before the first send,
so a retry and the `401` replay carry the same key and the API collapses them into one create.
A key you pass in `headers`, in any spelling, is sent instead. No other verb carries one.

## Bodies: a map, raw JSON, or a DTO

A body may be written three ways on every resource method that takes one, and all three reach
the API as the same request:

```php
use Exsited\Resources\NoteGroups\NoteGroups;
use Exsited\Resources\NoteGroups\NoteGroupsDto\NoteGroup;

// a map
NoteGroups::createNoteGroup($client, ['note_group' => ['name' => 'Onboarding', 'description' => 'New accounts']]);

// the same payload pasted as JSON, e.g. straight out of an API client
NoteGroups::createNoteGroup($client, <<<JSON
    {"note_group": {"name": "Onboarding", "description": "New accounts"}}
    JSON);

// the same payload as a view: toMap() wraps it in the view's ENVELOPE_KEY
NoteGroups::createNoteGroup($client, new NoteGroup(name: 'Onboarding', description: 'New accounts'));
```

- **All three forms are accepted.** The resource methods say so in their signature,
  `array|string|Dto $payload`; the senders take `mixed $jsonBody` and decide at runtime.
- **A DTO is asked for its map** before the request is built, so the serialisation, the
  printed block, the curl reproduction and a `401` replay see exactly what the equivalent
  array would have produced. A field left null is left out.
- **A string is sent byte for byte.** It is parsed once to check it is well formed, never to
  rewrite it.
- **A string that is not valid JSON, or that holds a bare scalar, is refused locally** with
  `SdkUsageError` before the URL is built, with a different message for each.

A resource method also refuses an empty array or a blank string with `SdkUsageError`, before
any I/O: a write that accepts nothing may be writing nothing while reporting that it wrote.

## Query parameters

Values are normalised, names never:

| PHP | On the wire |
|---|---|
| `null` | dropped |
| `true` / `false` | `"true"` / `"false"` |
| `BackedEnum` | its `->value` |
| `DateTimeInterface` | ISO 8601 |
| list array | key repeats, one per item |
| keyed array, or a list inside a list | `SdkUsageError` |

The v4 filter and sort grammar has helpers on `QueryParams`:

```php
use Exsited\Http\QueryParams;
use Exsited\Http\SortDirection;

$client->accounts->getAccounts([
    QueryParams::filterParam('status') => 'ACTIVE',                                  // filter_status
    QueryParams::filterParam('name', 'starts_with') => 'Jane',                       // filter_name_starts_with
    QueryParams::filterParam('id', 'in') => QueryParams::filterValues([1, 2, 3]),    // "1,2,3"
    'sort' => QueryParams::sortParam('created_on', SortDirection::Desc),             // "-created_on"
]);
```

`FILTER_OPERATORS` lists the thirteen comparisons the live API serves; an unknown one is
refused rather than becoming part of the field name. `sortParams()` spells the `order_by` and
`direction` form some families use instead. The wrong sort spelling for a family is ignored by
the API, not refused, so check the rows.

The account, invoice and item urls classes name the parameters that shape their listing, as
`AccountsUrls::ACCOUNTS_QUERY_PARAMS` (`limit`, `cursor`, `sort`); every other name is a
`filter_<field>`.

## Responses

```php
$response->statusCode;          // 200
$response->data;                // the body in the resolved responseFormat, the map by default
$response->map;                 // ALWAYS the decoded body
$response->json;                // ALWAYS the API's own body text
$response->dto;                 // ALWAYS the typed view, where the endpoint names one
$response->headers;
$response->contentType;
$response->succeeded();         // 2xx AND a body that does not name itself an error
$response->errorType;           // ErrorType::NotFound, ::Validation, ::Timeout, ...
$response->getErrorMessages();  // the problems the body reports
$response->requestInfo;         // method, redacted url, params, body and headers, timing
$response->raiseForStatus();
```

**Four ways to read one body, and only `data` follows configuration.** `json` is the body text
as the API sent it, null for bytes or an empty body. `dto` is null for an endpoint that names no
view, for a body that is not an object and for any failed call, so an error envelope never reads
as a record.

**A DTO converts nothing.** A field whose declared type does not match what the API sends reads
null rather than throwing, and null is also what a key sent as null looks like, and a key never
sent at all. Only `map` can tell those apart, so when a typed field is unexpectedly null, look
there. Every field on every view was **measured** from a read-only sweep of the live instance,
with the Postman collection used only where the sweep reached nothing; ENDPOINTS.md records
which, per view, and each view lists the endpoints it was measured from in `MEASURED_FROM`.
Where neither has a success response there is no view, and `dto` is null.

**`succeeded()` is not the status alone.** A v4 error envelope is
`{"object": "error", "code": ..., "message": ..., "request_id": ..., "doc_url": ...}`, and one
can arrive under a 2xx, so a body naming itself `"object": "error"` is a failure whatever the
status. `getErrorMessages()` reads the envelope most specific first: `errors[]` with its field,
then `message`, then the machine code in `code`, `error` or `errorCode`, then RFC 7807's
`detail` and `title`, which is what a gateway answers with.

Decoding follows the content type: JSON, `+json` types included, to an array, `text/*` to a
string, anything else stays bytes in a string, empty or `204` to null.

| Status | `ErrorType` |
|---|---|
| 2xx | `None`, or `Unknown` when the body denies success |
| 3xx | `Redirect`, not followed; read `Location` off `->headers` |
| 400, 422 | `Validation` |
| 401 / 403 | `Authentication` / `Authorization` |
| 404 / 405 / 409 / 429 | `NotFound` / `MethodNotAllowed` / `Conflict` / `RateLimit` |
| 5xx | `Server` |
| timeout / connection failure | `Timeout` / `Network` |
| other | `Unknown` |

## Errors

A failed call does **not** throw by default. It comes back as an `ApiResponse` with
`succeeded()` false:

```php
$response = $client->accounts->getAccount('no-such-account');
if (!$response->succeeded()) {
    echo $response->statusCode, ' ', implode('; ', $response->getErrorMessages());
}
```

Opt into throwing where an unhandled failure should stop the program:

```php
use Exsited\Errors\SdkError;

try {
    $client->accounts->getAccount('no-such-account', raiseOnError: true);
} catch (SdkError $error) {
    echo $error->statusCode;             // 404
    echo $error->errorType->value;       // not_found
    print_r($error->getErrorMessages()); // the API's own wording
    echo $error->explain();              // the structural block, safe to retain
    echo $error->explain(true);          // the same plus params, URL, messages, body
    echo $error;                         // one line: class, status, category, method,
                                         // path template, attempts
}
```

**What an error says by default is structural**: the exception class, the status, the error
category, the method, the **declared path template**, the attempt counts and the shape of the
response. Never the body, the query values, the resolved URL or a record id, because that is
the output an uncaught exception leaves in a log nobody chose. The rest is one explicit call
away: `getErrorMessages()`, `$error->rawResponse` and `explain(true)`.

| Exception | Raised when |
|---|---|
| `SdkConfigError` | Credentials or settings missing or invalid |
| `SdkUsageError` | Caller error caught before I/O: bad path params, unserialisable payload |
| `SdkAttributeError` | An unknown resource or endpoint name |
| `SdkAuthError` | Credentials rejected, a `401` surviving one refresh, or a `403` |
| `SdkTokenCacheError` | The token cache file is present but unusable |
| `SdkTokenLockError` | The token cache lock could not be taken |
| `SdkError` | Any other non-2xx, plus timeouts and connection failures |

All are `SdkError` or a subclass, so one `catch (SdkError)` sees everything the SDK throws.
**Always throws, whatever `raiseOnError` says:** a call that produced no response at all, and a
token-endpoint credential rejection.

## Pagination

```php
use Exsited\Client\Pagination;
use Exsited\Resources\Accounts\AccountsUrls;

foreach (Pagination::iterPages($client, AccountsUrls::ACCOUNTS, queryParams: ['limit' => 100]) as $page) { }

foreach (Pagination::iterRecords($client, AccountsUrls::ACCOUNTS, AccountsUrls::ACCOUNTS_KEY) as $account) {
    echo $account['id'], PHP_EOL;
}
```

Lazy generators: nothing is fetched until iteration starts, and abandoning the loop fetches no
further pages. `maxPages` caps the walk, and a failed page throws by default.

**v4 serves two paging shapes and the pager reads which one per page.** A cursor page names its
next cursor; an offset page names limit, offset and a `next_page`. `next_page` ends as the
literal string `"NULL"`, not null, and a real one can point at another path, so the pager
computes the next offset rather than following the link. A cursor handed back twice, or an
offset that does not advance, is raised as the API bug it is rather than followed forever.
`cursor` and `offset` belong to the pager and are refused in `queryParams`.

**Pass the listing's key.** Each family's urls class names the key a listing's records sit
under beside its path, as `AccountsUrls::ACCOUNTS_KEY`, and the envelope one record arrives
under, as `AccountsUrls::ACCOUNT_KEY`. A pager pointed at the wrong key finds nothing and
reports the end.

## Diagnostics

```php
$client = ClientRegistry::buildClient(overrides: [
    'printApiInfo' => true,
    'printRequestPayload' => true,
    'printResponseBody' => true,
    'printHeaders' => true,
    'printCurl' => true,
    'printOnlyOnError' => true,   // only when a call fails
    'printFormat' => 'pretty',    // or 'compact'
]);
```

```
┌─ Exsited ─────────────────────────────────────────────────────
│ client       : default
│ api version  : v4
│ method       : GET
│ endpoint     : https://dev-api.exsited.com/api/v4/accounts
│ params       : {"limit":1}
│ status       : 200
│ attempt      : 1 / 1
│ elapsed      : 0.2313s
└───────────────────────────────────────────────────────────────
```

A console that has not declared itself UTF-8 gets an ASCII frame, and every value that came
from outside the SDK has its control characters escaped first, a control at or below U+00FF as
`\xNN` and a line separator as `\u2028` or `\u2029`, because a terminal acts on what it is
handed. The block is for reading, not for a JSON parser.

Redaction covers secret-named keys, by eighteen markers such as `secret`, `password`, `token`,
`authorization` and `signature`, matched ignoring case and separators. It does not know which
fields are personal, so `printRequestPayload` and `printResponseBody` print names and email
addresses as the API sent them. `printCurl` emits a POSIX-quoted command with the token
redacted; it is not claimed safe in `cmd.exe` or PowerShell.

Logging is separate, single-line and PSR-3, and a record is **structural**: method, declared
endpoint template, status, error category, elapsed time and attempt counts, never the resolved
URL or a query value:

```text
GET /api/{api_version}/accounts/{account_id} -> 500 server in 0.41s (attempt 2/3)
```

`logBodies` is the opt-in that adds the resolved URL and the redacted bodies, at `DEBUG`. Bring
your own PSR-3 logger with `new ExsitedClient($config, logger: $monolog)`, or set `logFile` and
let the SDK write one line at a time under an exclusive lock.

## Retries

Off by default: `maxRetries` counts the first attempt.

```php
$client = ClientRegistry::buildClient(overrides: ['maxRetries' => 3]);
```

Exponential backoff with full jitter, capped by `retryBackoffMaxSeconds`. A `Retry-After`
header beats the computed jitter but is clamped by that ceiling, and a negative one is zero.

### Which HTTP statuses are retried

| The method | Retried on |
|---|---|
| Safe: `GET` `HEAD` `OPTIONS` `TRACE` | `retryableHttpCodes`, default `[429,500,502,503,504]` |
| Every other method, an unrecognised one included | a status on `retryableHttpCodes` **and** on `unsafeRetryableHttpCodes`, which defaults to `[]` |

So out of the box no status alone replays a write. A status is the server describing what it
did, and none of those five says whether a write committed. `unsafeRetryableHttpCodes` is the
opt-in for a deployment where a duplicate is harmless. `400` and `401` are never retried here:
a `401` is refresh-and-replayed one layer up.

### Which transport failures are retried

| What failed | Retried for |
|---|---|
| The connection was never established: DNS, connect timeout, refusal, TLS handshake | any method |
| A failure after the request was sent, or while reading the body | `GET` `HEAD` `OPTIONS` `TRACE` `PUT` `DELETE` |
| Anything else | nothing |

A `POST` or `PATCH` that timed out awaiting the response is not retried, because the SDK cannot
know whether the write happened. A timeout is recognised by curl error 28, not by the exception
class, since Guzzle reports a read timeout as a `ConnectException` too.

A safe method answered `400` naming only query fields it did not send is taken for another
request's answer on a reused connection, and is sent once more outside `maxRetries`; the
progress line and `RequestInfo->maxAttempts` count that send.

## Transport, TLS and proxies

```php
$client = ClientRegistry::buildClient(overrides: [
    'caBundle' => '/path/to/corporate-ca.pem',
    'proxyUrl' => 'http://proxy.internal:8080',
    'poolMaxsize' => 25,
    'maxResponseBytes' => 64 * 1024 * 1024,
]);
```

**Response bodies are bounded.** A body over `maxResponseBytes` throws an `SdkError` naming the
cap and is never retried. On the client this SDK builds, the transfer is stopped as it arrives;
an injected PSR-18 client has usually finished receiving before the SDK sees the response.

**Request bodies are bounded in three places.** `maxRequestSourceBytes` counts your bytes
across every multipart part, `maxMultipartOverheadBytes` counts the framing alone, and
`maxRequestBytes` the finished body. Over any of them the call is refused with `SdkUsageError`
and nothing is sent. A borrowed stream or handle in `files` is **copied** into a spool this SDK
owns before the request is authenticated, bounded by `maxSpoolBytes`, so a retry and a `401`
replay re-send the same bytes.

Prefer `caBundle` over `verifySsl: false`; setting both is rejected. `verifySsl: false` warns on
every client built, and so does an `http://` base URL to a host that is not loopback.
**Redirects are not followed**: a `3xx` comes back with its `Location` intact.

### Timeouts

| | Setting | Bounds |
|---|---|---|
| Connect | `connectTimeoutSeconds` (`10.0`) | Name resolution, the TCP connect and the TLS handshake |
| The whole attempt | `timeoutSeconds` (`30.0`) | That connect phase, plus sending the request and receiving the whole body |

It is a total rather than an idle window, because an idle window bounds nothing against a
server dribbling one byte at a time. A retry starts a fresh ceiling, so `maxRetries: 3` bounds a
call at roughly three times the timeout plus backoff. Building a body is bounded by
`timeoutSeconds` too.

### Injecting a PSR-18 client

```php
use Exsited\Http\Transport;

$transport = new Transport($config, httpClient: $myPsr18Client);
$client = new ExsitedClient($config, transport: $transport);
```

PSR-18 exposes no per-request options, so the SDK cannot enforce timeouts, TLS verification,
proxy or redirect policy on an injected client; that configuration is yours. The same-origin
guard still runs on every URL the SDK builds. An injected client is not closed by the SDK.

## Multiple instances

The first registered is the default.

```php
ClientRegistry::registerInstances([
    new AuthConfig(clientName: 'production', ...),
    new AuthConfig(clientName: 'staging', ...),
]);

ClientRegistry::buildClient();            // production
ClientRegistry::buildClient(1);           // by position
ClientRegistry::buildClient('staging');   // by clientName
```

Each instance gets its own config, transport, token provider and store. Duplicate
`clientName`s are rejected at registration. Several alive at once, cached by position:

```php
$registry = new ClientRegistry([$production, $staging]);
$registry->getClient('staging');
$registry->closeAllClients();
```

The static entry points share one process-global registration, so a worker serving concurrent
requests from one process should build a `ClientRegistry` or `ExsitedClient` per request.
`ClientRegistry::clearRegisteredInstances()` empties it.

## Endpoints

91 resource families and 865 endpoint methods. The largest families are `settings` (86), `accounts` (65), `orders` (60), `items` (41),
`customComponents` (39), `bookings` (33) and `invoices` (30). Each endpoint has one method.

Every endpoint, with its request and response bodies, is documented at
[exsited.mintlify.app](https://exsited.mintlify.app/introduction).

```php
$client->listResourceNames();              // ['abaFiles', 'accountEmails', 'accountingCodes', 'accounts', ...]
get_class_methods(Accounts::class);        // every endpoint
```

Both call styles are the same function:

```php
use Exsited\Resources\Accounts\Accounts;

Accounts::getAccount($client, $id);        // explicit, fully IDE-completed
$client->accounts->getAccount($id);        // bound, shorter
```

Prefer the static form when you want editor completion: the bound form resolves through
`__get` and `__call`. `ExsitedClient` declares a `@property-read` line for each of the 91
bound names.

## Troubleshooting

| Symptom | Fix |
|---|---|
| `Class "Exsited\..." not found` | `composer install`, and require `vendor/autoload.php` |
| `SdkConfigError: ... missing required values` | Values arrived empty; check where your credentials come from |
| `SdkAuthError` on the first call | Run the credentials case alone; it isolates auth from everything else |
| Every process gets `401` after another one starts | Each grant invalidates the previous token; the client refreshes once and replays, but many processes on one set of credentials spend grants against each other |
| `cURL error 60: SSL certificate problem` | Set `caBundle`, not `verifySsl: false` |
| A typed field is null | Read `->map`: the key may be absent, null, or a type the view does not declare |
| A listing loop stops after one page | Pass the listing's `*_KEY` to `iterRecords()` |
| The token handshake answers `404` | Something changed the token path; it is `/api/v4/oauth2/token` |
| Editor does not complete `$client->accounts->...` | Call `Accounts::method($client, ...)` |

## Implementation notes

| Concern | How this SDK does it |
|---|---|
| HTTP client | PSR-18, Guzzle by default, swappable for any PSR-18 client |
| Logging | PSR-3; `NullLogger` unless you pass one, plus a built-in `FileLogger` for `logFile` |
| Warnings | `trigger_error(E_USER_WARNING)` and a PSR-3 warning |
| Cross-process token lock | a native `flock()` sidecar beside the cache file |
| Token endpoint | `/api/v4/oauth2/token`, fixed in `TokenProvider::TOKEN_PATH` |
| Resource endpoints | public static methods, resolved by reflection through an explicit registry |
| Request body | a PHP array, a raw JSON string or a DTO, interchangeably; one set of bytes on the wire |
| Response body | four members off one exchange, `data`, `map`, `json` and `dto`; only `data` follows `responseFormat` |
| Success | a 2xx and a body that does not name itself `"object": "error"` |
| Environment | one variable, `EXSITED_RESPONSE_FORMAT`, lowest of four tiers. Never a credential |
| Method and resource names | camelCase, per PSR-1/PSR-12 |

Wire-facing spelling is set by the API, not by those names: v4 body keys and query names are
snake_case, and the SDK converts neither.
