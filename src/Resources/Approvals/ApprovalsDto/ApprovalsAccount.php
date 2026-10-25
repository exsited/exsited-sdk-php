<?php

declare(strict_types=1);

namespace Exsited\Resources\Approvals\ApprovalsDto;

use Exsited\Client\Dto;

/** The ApprovalsAccount body, as measured from the endpoints in MEASURED_FROM. */
final class ApprovalsAccount extends Dto
{
    /** The endpoints this view was measured from. */
    public const MEASURED_FROM = [
        'GET /api/{api_version}/approvals/account',
    ];

    public function __construct(
        public readonly ?string $createdOn = null,
        public readonly mixed $description = null,
        public readonly ?string $displayName = null,
        public readonly ?string $entity = null,
        public readonly ?string $event = null,
        public readonly ?string $href = null,
        public readonly ?string $id = null,
        public readonly ?string $lastUpdatedOn = null,
        public readonly ?string $name = null,
        public readonly ?string $object = null,
        public readonly ?string $status = null,
    ) {
    }
}
