# Exsited PHP SDK

PHP client for the Exsited v4 REST API. It handles OAuth2 with a token cache shared across
processes, retries with backoff, connection reuse, corporate TLS and proxies, response
decoding by content type, a typed error hierarchy and secret redaction. The SDK sends what you
give it and returns the body as it arrived, with optional typed views beside the raw data.

| | |
|---|---|
| Package | [`exsited/exsited`](https://packagist.org/packages/exsited/exsited) on Packagist |
| Namespace | `Exsited` |
| Documentation | [exsited.mintlify.app](https://exsited.mintlify.app) |

## Requirements

- PHP 8.2 or newer and Composer 2
- The `curl`, `ctype`, `filter`, `json` and `mbstring` extensions
- A client id and client secret for your Exsited instance

## Install

```bash
composer require exsited/exsited:^4.0
```

## Credentials

The SDK does not read credentials from the environment on its own. Build an `AuthConfig` from
wherever your credentials live, for example environment variables:

```bash
export EXSITED_BASE_URL="https://your-instance.example.com"
export EXSITED_CLIENT_ID="your-client-id"
export EXSITED_CLIENT_SECRET="your-client-secret"
export EXSITED_REDIRECT_URI="https://your-instance.example.com/"
```

```php
use Exsited\Config\AuthConfig;

$auth = new AuthConfig(
    baseUrl: getenv('EXSITED_BASE_URL'),
    clientId: getenv('EXSITED_CLIENT_ID'),
    clientSecret: getenv('EXSITED_CLIENT_SECRET'),
    redirectUri: getenv('EXSITED_REDIRECT_URI'),
    clientName: 'default',
);
```

Validation runs when the object is built and reports every problem at once. The client secret
is redacted when the object is converted to a string.

## First call

```php
require 'vendor/autoload.php';

use Exsited\Client\ClientRegistry;
use Exsited\Resources\Accounts\AccountsUrls;

ClientRegistry::registerInstances([$auth]);

$accounts = ClientRegistry::withClient(fn ($client) =>
    $client->accounts->getAccounts(['limit' => 50])->map[AccountsUrls::ACCOUNTS_KEY]);

foreach ($accounts as $account) {
    echo $account['id'], ' ', $account['name'], PHP_EOL;
}
```

`withClient()` closes the client when the callback returns or throws. To manage the client
yourself:

```php
use Exsited\Client\ExsitedClient;
use Exsited\Config\SdkConfig;

$client = new ExsitedClient(new SdkConfig($auth));
$response = $client->accounts->getAccounts(['limit' => 50]);
$client->closeClient();
```

## Errors

A failed call does not throw by default. It returns an `ApiResponse` whose `succeeded()` is
false:

```php
$response = $client->accounts->getAccount('your-account-id');
if (!$response->succeeded()) {
    echo $response->statusCode, ' ', implode('; ', $response->getErrorMessages());
}
```

To throw instead, pass `raiseOnError: true` to a call or to `SdkConfig`, and catch
`Exsited\Errors\SdkError`, the base class of everything the SDK throws.

## Pagination

```php
use Exsited\Client\Pagination;
use Exsited\Resources\Accounts\AccountsUrls;

foreach (Pagination::iterRecords($client, AccountsUrls::ACCOUNTS, AccountsUrls::ACCOUNTS_KEY) as $account) {
    echo $account['id'], PHP_EOL;
}
```

The pager is a lazy generator that follows both paging styles the API serves. Pass the key
that the listing's records sit under, which each resource's `Urls` class names beside its
path.

## Documentation

Endpoint reference and guides: [exsited.mintlify.app](https://exsited.mintlify.app)

## License

MIT
