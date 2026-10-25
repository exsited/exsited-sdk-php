<?php

declare(strict_types=1);

namespace Exsited\Sdk\Resources\Usages\UsagesDto;

use Exsited\Sdk\Client\Dto;

/** The UsageUpdated body, as measured from the endpoints in MEASURED_FROM. */
final class UsageUpdated extends Dto
{
    /** The endpoints this view was measured from. */
    public const MEASURED_FROM = [
        'PATCH /api/{api_version}/usages/{usage_id}',
        'PUT /api/{api_version}/usages/{usage_id}',
    ];

    public function __construct(
        public readonly ?string $note = null,
        public readonly ?string $status = null,
        public readonly ?UsageUpdatedDetail $usage = null,
    ) {
    }
}
