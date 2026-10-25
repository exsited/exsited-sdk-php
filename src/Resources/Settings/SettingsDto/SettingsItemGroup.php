<?php

declare(strict_types=1);

namespace Exsited\Resources\Settings\SettingsDto;

use Exsited\Client\Dto;

/** The SettingsItemGroup body, as measured from the endpoints in MEASURED_FROM. */
final class SettingsItemGroup extends Dto
{
    /** The endpoints this view was measured from. */
    public const MEASURED_FROM = [
        'GET /api/{api_version}/settings/item_groups',
    ];

    public function __construct(
        public readonly ?SettingsItemGroupAccountingCode $accountingCode = null,
        public readonly ?string $code = null,
        public readonly mixed $createdBy = null,
        public readonly ?string $createdOn = null,
        public readonly ?string $description = null,
        public readonly ?string $displayName = null,
        public readonly ?string $href = null,
        public readonly ?string $id = null,
        public readonly mixed $lastUpdatedBy = null,
        public readonly ?string $lastUpdatedOn = null,
        public readonly ?string $name = null,
        public readonly ?string $object = null,
        public readonly ?string $status = null,
        public readonly ?int $version = null,
    ) {
    }
}
