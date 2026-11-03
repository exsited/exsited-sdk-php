<?php

declare(strict_types=1);

namespace Exsited\Resources\Operators\OperatorsDto;

use Exsited\Client\Dto;

/** The operator body, under `operator`. */
final class SettingsOperator extends Dto
{
    public const ENVELOPE_KEY = 'operator';

    /** The endpoints this view covers. */
    public const MEASURED_FROM = [
        'GET /api/{api_version}/settings/operators',
        'GET /api/{api_version}/settings/operators/{operator_id}',
        'POST /api/{api_version}/settings/operators',
        'PATCH /api/{api_version}/settings/operators/{operator_id}',
    ];

    public function __construct(
        /** Untyped. */
        public readonly mixed $createdBy = null,
        public readonly ?string $createdOn = null,
        /** Untyped. */
        public readonly mixed $description = null,
        public readonly ?string $displayName = null,
        public readonly ?string $email = null,
        public readonly ?string $href = null,
        public readonly ?string $id = null,
        /** Untyped. */
        public readonly mixed $lastUpdatedBy = null,
        public readonly ?string $lastUpdatedOn = null,
        public readonly ?string $name = null,
        public readonly ?string $object = null,
    ) {
    }
}
