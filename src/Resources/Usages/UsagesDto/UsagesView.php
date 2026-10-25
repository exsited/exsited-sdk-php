<?php

declare(strict_types=1);

namespace Exsited\Resources\Usages\UsagesDto;

use Exsited\Client\Dto;

/** The UsagesView body, as measured from the endpoints in MEASURED_FROM. */
final class UsagesView extends Dto
{
    public const ENVELOPE_KEY = 'usage';

    /** The endpoints this view was measured from. */
    public const MEASURED_FROM = [
        'POST /api/{api_version}/usages',
    ];

    public function __construct(
        public readonly ?array $activityLogs = null,
        public readonly ?string $chargeItemName = null,
        public readonly ?string $chargeItemUuid = null,
        public readonly ?string $chargeStatus = null,
        public readonly ?string $chargingPeriod = null,
        public readonly ?string $createdBy = null,
        public readonly ?string $createdOn = null,
        public readonly ?array $customAttributes = null,
        public readonly ?string $endTime = null,
        public readonly ?string $eventId = null,
        public readonly ?array $failed = null,
        public readonly ?string $href = null,
        public readonly ?string $id = null,
        public readonly ?string $lastUpdatedBy = null,
        public readonly ?string $lastUpdatedOn = null,
        public readonly ?string $object = null,
        public readonly ?string $quantity = null,
        public readonly ?string $source = null,
        public readonly ?string $startTime = null,
        public readonly ?array $success = null,
        public readonly ?string $type = null,
        public readonly ?string $uom = null,
        public readonly ?UsagesViewDetail $usages = null,
        public readonly ?string $uuid = null,
        public readonly ?string $version = null,
    ) {
    }
}
