<?php

declare(strict_types=1);

namespace Exsited\Resources\ShippingPackages;

final class ShippingPackagesUrls
{
    public const SETTINGS_SHIPPING_PACKAGES = '/api/{api_version}/settings/shipping_packages';
    public const SETTINGS_SHIPPING_PACKAGE = '/api/{api_version}/settings/shipping_packages/{shipping_package_id}';

    /** The key the `SETTINGS_SHIPPING_PACKAGES` listing's records sit under. */
    public const SETTINGS_SHIPPING_PACKAGES_KEY = 'data';

    /** The envelope one `shipping_package` record arrives under. */
    public const SHIPPING_PACKAGE_KEY = 'shipping_package';
}
