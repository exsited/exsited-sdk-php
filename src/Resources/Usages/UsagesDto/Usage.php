<?php

declare(strict_types=1);

namespace Exsited\Resources\Usages\UsagesDto;

use Exsited\Client\Dto;
use Exsited\Client\ListOf;

/** The Usage body, as measured from the endpoints in MEASURED_FROM. */
final class Usage extends Dto
{
    public const ENVELOPE_KEY = 'usage';

    /** The endpoints this view was measured from. */
    public const MEASURED_FROM = [
        'GET /api/{api_version}/usages',
        'GET /api/{api_version}/usages/{usage_id}',
    ];

    /** @param list<UsageCustomAttribute|null>|null $customAttributes */
    public function __construct(
        public readonly ?UsageChargeItem $chargeItem = null,
        public readonly ?string $chargingEndDate = null,
        public readonly ?string $chargingPeriod = null,
        public readonly ?string $chargingStartDate = null,
        public readonly ?UsageCreatedBy $createdBy = null,
        public readonly ?string $createdOn = null,
        #[ListOf(UsageCustomAttribute::class)]
        public readonly ?array $customAttributes = null,
        public readonly ?string $endTime = null,
        public readonly ?string $href = null,
        public readonly ?string $id = null,
        public readonly ?UsageLastUpdatedBy $lastUpdatedBy = null,
        public readonly ?string $lastUpdatedOn = null,
        public readonly ?string $object = null,
        public readonly ?float $quantity = null,
        public readonly mixed $source = null,
        public readonly ?string $startTime = null,
        public readonly ?string $status = null,
        public readonly ?string $type = null,
        public readonly mixed $uom = null,
        public readonly ?int $version = null,
    ) {
    }
}
