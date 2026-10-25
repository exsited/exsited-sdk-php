<?php

declare(strict_types=1);

namespace Exsited\Sdk\Client;

use Exsited\Sdk\Errors\SdkAttributeError;
use Exsited\Sdk\Errors\SdkUsageError;

/** Registry of resource name to class - an explicit map, not a directory scan, so a typo raises. */
final class ResourceRegistry
{
    /** @var array<string,class-string> */
    private static array $modules = ResourceBindings::MODULES;

    /** @param class-string $fqcn */
    public static function registerResourceModule(string $resourceName, string $fqcn): void
    {
        if (!preg_match('/^[a-zA-Z][a-zA-Z0-9_]*$/', $resourceName)) {
            throw new SdkUsageError(
                "cannot register resource '{$resourceName}': a resource name must be an identifier "
                . 'that does not start with an underscore - no lookup could ever reach it'
            );
        }
        if (method_exists(ExsitedClient::class, $resourceName)
            || property_exists(ExsitedClient::class, $resourceName)) {
            throw new SdkUsageError(
                "cannot register resource '{$resourceName}': ExsitedClient already has an "
                . 'attribute of that name, and it would win every lookup - pick another name'
            );
        }
        $registered = self::$modules[$resourceName] ?? null;
        if ($registered !== null && $registered !== $fqcn) {
            throw new SdkUsageError(
                "cannot register resource '{$resourceName}' against {$fqcn}: it is already registered "
                . "against {$registered}, and clients built before the change would keep the old one"
            );
        }
        if (!class_exists($fqcn)) {
            throw new SdkUsageError(
                "cannot register resource '{$resourceName}': nothing loadable at {$fqcn} - check the class name"
            );
        }
        self::$modules[$resourceName] = $fqcn;
    }

    /** @return list<string> */
    public static function registeredResourceNames(): array
    {
        $names = array_keys(self::$modules);
        sort($names);
        return $names;
    }

    /** @return class-string */
    public static function resolveResourceModule(string $resourceName): string
    {
        $fqcn = self::$modules[$resourceName] ?? null;
        if ($fqcn === null) {
            $available = implode(', ', self::registeredResourceNames()) ?: 'none registered yet';
            throw new SdkAttributeError("no resource '{$resourceName}'; available: {$available}");
        }
        return $fqcn;
    }
}
