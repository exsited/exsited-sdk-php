<?php

declare(strict_types=1);

namespace Exsited\Sdk\Client;

use Exsited\Sdk\Config\SdkConfig;
use Exsited\Sdk\Errors\SdkError;
use Exsited\Sdk\Errors\SdkUsageError;

/** A collection of clients, one per instance, built on first use; each gets its own config, token
 *  provider and store. */
final class ClientRegistry
{
    private const DEFAULT_CLIENT_NAME = 'default';

    /** @var list<mixed> */
    private array $credentials;
    /** @var array<string,int> */
    private array $names;
    /** @var list<string> */
    private array $labels;
    /** @var array<int,ExsitedClient> */
    private array $clients = [];
    /** @var array<int,bool> */
    private array $supplied = [];

    /** @param array<int|string,mixed> $credentials */
    public function __construct(array $credentials)
    {
        $blocks = self::readInstanceBlocks($credentials, 'ClientRegistry');
        $this->credentials = $blocks;
        $this->names = self::indexDeclaredNames($blocks);
        $this->labels = [];
        foreach ($blocks as $index => $block) {
            $this->labels[] = SdkConfig::readClientName($block) ?? "<index {$index}>";
        }
    }

    public function resolveIndex(int|string|null $name = null): int
    {
        if ($name === null) {
            return 0;
        }
        if (is_int($name)) {
            $count = count($this->credentials);
            if ($name >= -$count && $name < $count) {
                return ($name % $count + $count) % $count;
            }
            throw new SdkUsageError("no instance at index {$name}; {$count} registered (0-" . ($count - 1) . ')');
        }
        if (array_key_exists($name, $this->names)) {
            return $this->names[$name];
        }
        throw new SdkUsageError("unknown instance '{$name}'; registered: " . implode(', ', $this->labels));
    }

    public function getClient(int|string|null $name = null): ExsitedClient
    {
        $index = $this->resolveIndex($name);
        if (!isset($this->clients[$index])) {
            $config = SdkConfig::fromCredentials($this->credentials, $index);
            $this->clients[$index] = new ExsitedClient($config);
        }
        return $this->clients[$index];
    }

    public function addClient(string $name, ExsitedClient $client): void
    {
        if (trim($name) === '') {
            throw new SdkUsageError("add_client needs a non-blank name; got '{$name}'");
        }
        if (preg_match('/^<index \d+>$/', $name)) {
            throw new SdkUsageError("'{$name}' is a position label; pick a name that cannot collide");
        }
        if (array_key_exists($name, $this->names) || in_array($name, $this->labels, true)) {
            throw new SdkUsageError("instance '{$name}' is already registered");
        }
        $this->credentials[] = $client->config();
        $index = count($this->credentials) - 1;
        $this->names[$name] = $index;
        $this->labels[] = $name;
        $this->clients[$index] = $client;
        $this->supplied[$index] = true;
    }

    /** @return list<string> */
    public function listClientNames(): array
    {
        return $this->labels;
    }

    public function closeAllClients(): void
    {
        $built = [];
        foreach (array_keys($this->clients) as $index) {
            if (!isset($this->supplied[$index])) {
                $built[] = $index;
            }
        }
        sort($built);

        $failures = [];
        $first = null;
        try {
            foreach ($built as $index) {
                try {
                    $this->clients[$index]->closeClient();
                } catch (\Throwable $failure) {
                    $failures[] = $this->labels[$index] . ': ' . $failure->getMessage();
                    $first ??= $failure;
                }
            }
        } finally {
            foreach ($built as $index) {
                unset($this->clients[$index]);
            }
        }

        if ($first !== null) {
            throw new SdkError(
                count($failures) . ' of ' . count($built) . ' clients failed to close ('
                . implode('; ', $failures) . '); all were attempted and dropped',
                previous: $first
            );
        }
    }

    /** @var list<mixed> */
    private static array $registeredInstances = [];

    /** @param array<int|string,mixed> $credentials */
    public static function registerInstances(array $credentials): void
    {
        $blocks = self::readInstanceBlocks($credentials, 'registerInstances');
        self::indexDeclaredNames($blocks);
        self::$registeredInstances = $blocks;
    }

    /** @return list<mixed> */
    public static function getRegisteredInstances(): array
    {
        if (self::$registeredInstances === []) {
            throw new SdkUsageError(
                'no instances registered - call ClientRegistry::registerInstances([...]) first, '
                . 'or pass credentials to buildClient()'
            );
        }
        return self::$registeredInstances;
    }

    /** Drop the process-global registration, for a persistent worker's per-request teardown. It does
     *  not make the static entry points safe under concurrent requests; per-request instances do. */
    public static function clearRegisteredInstances(): void
    {
        self::$registeredInstances = [];
    }

    /** @return list<string> */
    public static function listInstanceNames(): array
    {
        $labels = [];
        foreach (self::getRegisteredInstances() as $index => $block) {
            $labels[] = SdkConfig::readClientName($block) ?? "<index {$index}>";
        }
        return $labels;
    }

    /** @param array<int|string,mixed>|null $credentials @param array<string,mixed> $overrides */
    public static function buildClient(int|string|null $instance = null, ?array $credentials = null, array $overrides = []): ExsitedClient
    {
        $blocks = $credentials ?? self::getRegisteredInstances();
        return new ExsitedClient(SdkConfig::fromCredentials($blocks, $instance, $overrides));
    }

    /** @param callable(ExsitedClient): mixed $callback
     *  @param array<string,mixed> $overrides */
    public static function withClient(callable $callback, int|string|null $instance = null, array $overrides = []): mixed
    {
        $client = self::buildClient($instance, null, $overrides);
        try {
            return $callback($client);
        } finally {
            $client->closeClient();
        }
    }

    /** @param array<int|string,mixed> $credentials @return list<mixed> */
    private static function readInstanceBlocks(array $credentials, string $entryPoint): array
    {
        if (!array_is_list($credentials)) {
            throw new SdkUsageError(
                "{$entryPoint} takes a list of instances, not a single block; wrap it in a list: "
                . "{$entryPoint}([block])"
            );
        }
        if ($credentials === []) {
            throw new SdkUsageError("{$entryPoint} needs at least one credentials block");
        }
        return $credentials;
    }

    /** @param list<mixed> $blocks @return array<string,int> */
    private static function indexDeclaredNames(array $blocks): array
    {
        $declared = [];
        $unnamed = null;
        foreach ($blocks as $index => $block) {
            $name = SdkConfig::readClientName($block);
            if ($name === null) {
                $unnamed ??= $index;
                continue;
            }
            if (array_key_exists($name, $declared)) {
                throw new SdkUsageError("two instances share client_name '{$name}' (positions {$declared[$name]} and {$index}); names must be unique");
            }
            $declared[$name] = $index;
        }
        if ($unnamed !== null && array_key_exists(self::DEFAULT_CLIENT_NAME, $declared)) {
            throw new SdkUsageError(
                "an entry that omits client_name is named 'default', which collides with the "
                . 'spelled-out default entry; names must be unique'
            );
        }
        return $declared;
    }
}
