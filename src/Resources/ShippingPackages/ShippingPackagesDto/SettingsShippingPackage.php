<?php

declare(strict_types=1);

namespace Exsited\Resources\ShippingPackages\ShippingPackagesDto;

use Exsited\Client\Dto;

/** The settings shipping package body, under `shipping_package`. */
final class SettingsShippingPackage extends Dto
{
    public const ENVELOPE_KEY = 'shipping_package';

    /** The endpoints this view was measured from. */
    public const MEASURED_FROM = [
        'GET /api/{api_version}/settings/shipping_packages',
        'GET /api/{api_version}/settings/shipping_packages/{shipping_package_id}',
        'POST /api/{api_version}/settings/shipping_packages',
        'PATCH /api/{api_version}/settings/shipping_packages/{shipping_package_id}',
    ];

    public function __construct(
        /** Null in every record measured, so untyped. */
        public readonly mixed $createdBy = null,
        public readonly ?string $createdOn = null,
        /** Null in every record measured, so untyped. */
        public readonly mixed $cubic = null,
        /** Null in every record measured, so untyped. */
        public readonly mixed $cubicUom = null,
        public readonly ?string $description = null,
        public readonly ?string $displayName = null,
        public readonly ?float $height = null,
        /** Null in every record measured, so untyped. */
        public readonly mixed $heightUom = null,
        public readonly ?string $href = null,
        public readonly ?string $id = null,
        /** Null in every record measured, so untyped. */
        public readonly mixed $lastUpdatedBy = null,
        public readonly ?string $lastUpdatedOn = null,
        public readonly ?float $length = null,
        /** Null in every record measured, so untyped. */
        public readonly mixed $lengthUom = null,
        public readonly ?string $name = null,
        public readonly ?string $object = null,
        public readonly ?string $status = null,
        public readonly ?float $weight = null,
        /** Null in every record measured, so untyped. */
        public readonly mixed $weightUom = null,
        public readonly ?float $width = null,
        /** Null in every record measured, so untyped. */
        public readonly mixed $widthUom = null,
    ) {
    }
}
