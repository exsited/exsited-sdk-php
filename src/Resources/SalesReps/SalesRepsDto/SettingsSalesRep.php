<?php

declare(strict_types=1);

namespace Exsited\Sdk\Resources\SalesReps\SalesRepsDto;

use Exsited\Sdk\Client\Dto;

/** The settings sales rep body, under `sales_rep`. */
final class SettingsSalesRep extends Dto
{
    public const ENVELOPE_KEY = 'sales_rep';

    /** The endpoints this view was measured from. */
    public const MEASURED_FROM = [
        'GET /api/{api_version}/settings/sales_reps',
        'GET /api/{api_version}/settings/sales_reps/{sales_rep_id}',
    ];

    public function __construct(
        /** Null in every record measured, so untyped. */
        public readonly mixed $createdBy = null,
        public readonly ?string $createdOn = null,
        public readonly ?string $emailAddress = null,
        public readonly ?string $firstName = null,
        public readonly ?string $href = null,
        public readonly ?string $id = null,
        public readonly ?string $lastName = null,
        /** Null in every record measured, so untyped. */
        public readonly mixed $lastUpdatedBy = null,
        public readonly ?string $lastUpdatedOn = null,
        public readonly ?string $name = null,
        public readonly ?string $object = null,
        public readonly ?string $status = null,
        public readonly ?int $version = null,
    ) {
    }
}
