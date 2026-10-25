<?php

declare(strict_types=1);

namespace Exsited\Resources\FulfillmentProfiles\FulfillmentProfilesDto;

use Exsited\Client\Dto;

/** The settings fulfillment profile body, under `fulfillment_profile`. */
final class SettingsFulfillmentProfile extends Dto
{
    public const ENVELOPE_KEY = 'fulfillment_profile';

    /** The endpoints this view was measured from. */
    public const MEASURED_FROM = [
        'GET /api/{api_version}/settings/fulfillment_profiles',
        'GET /api/{api_version}/settings/fulfillment_profiles/{fulfillment_profile_id}',
        'POST /api/{api_version}/settings/fulfillment_profiles',
        'PATCH /api/{api_version}/settings/fulfillment_profiles/{fulfillment_profile_id}',
    ];

    public function __construct(
        /** Null in every record measured, so untyped. */
        public readonly mixed $createdBy = null,
        public readonly ?string $createdOn = null,
        public readonly ?string $description = null,
        public readonly ?string $displayName = null,
        public readonly ?string $href = null,
        public readonly ?string $id = null,
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
