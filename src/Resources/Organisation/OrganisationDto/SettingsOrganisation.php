<?php

declare(strict_types=1);

namespace Exsited\Sdk\Resources\Organisation\OrganisationDto;

use Exsited\Sdk\Client\Dto;
use Exsited\Sdk\Client\WireName;

/** The root organisation body, under `organization`. */
final class SettingsOrganisation extends Dto
{
    public const ENVELOPE_KEY = 'organization';

    /** The endpoints this view was measured from. */
    public const MEASURED_FROM = [
        'GET /api/{api_version}/settings/organisation',
    ];

    public function __construct(
        /** Null in every record measured, so untyped. */
        #[WireName('address_line1')]
        public readonly mixed $addressLine1 = null,
        /** Null in every record measured, so untyped. */
        #[WireName('address_line2')]
        public readonly mixed $addressLine2 = null,
        /** Null in every record measured, so untyped. */
        #[WireName('address_line3')]
        public readonly mixed $addressLine3 = null,
        /** Null in every record measured, so untyped. */
        #[WireName('address_line4')]
        public readonly mixed $addressLine4 = null,
        /** Null in every record measured, so untyped. */
        #[WireName('address_line5')]
        public readonly mixed $addressLine5 = null,
        /** Null in every record measured, so untyped. */
        public readonly mixed $city = null,
        /** Null in every record measured, so untyped. */
        public readonly mixed $createdBy = null,
        public readonly ?string $createdOn = null,
        /** Null in every record measured, so untyped. */
        public readonly mixed $description = null,
        /** Null in every record measured, so untyped. */
        public readonly mixed $details = null,
        public readonly ?string $displayName = null,
        /** Null in every record measured, so untyped. */
        public readonly mixed $email = null,
        /** Null in every record measured, so untyped. */
        public readonly mixed $fax = null,
        /** Null in every record measured, so untyped. */
        public readonly mixed $faxAreaCode = null,
        /** Null in every record measured, so untyped. */
        public readonly mixed $faxCountryCode = null,
        public readonly ?string $href = null,
        public readonly ?string $id = null,
        /** Null in every record measured, so untyped. */
        public readonly mixed $lastUpdatedBy = null,
        public readonly ?string $lastUpdatedOn = null,
        /** Null in every record measured, so untyped. */
        public readonly mixed $mobile = null,
        /** Null in every record measured, so untyped. */
        public readonly mixed $mobileAreaCode = null,
        /** Null in every record measured, so untyped. */
        public readonly mixed $mobileCountryCode = null,
        public readonly ?string $name = null,
        /** Empty in every record measured, so untyped. */
        public readonly ?array $nodes = null,
        public readonly ?string $object = null,
        public readonly ?SettingsOrganisationParentOrganization $parentOrganization = null,
        /** Null in every record measured, so untyped. */
        public readonly mixed $phone = null,
        /** Null in every record measured, so untyped. */
        public readonly mixed $phoneAreaCode = null,
        /** Null in every record measured, so untyped. */
        public readonly mixed $phoneCountryCode = null,
        /** Null in every record measured, so untyped. */
        public readonly mixed $postCode = null,
        /** Null in every record measured, so untyped. */
        public readonly mixed $state = null,
        public readonly ?string $status = null,
        public readonly ?string $type = null,
        /** Null in every record measured, so untyped. */
        public readonly mixed $website = null,
    ) {
    }
}
