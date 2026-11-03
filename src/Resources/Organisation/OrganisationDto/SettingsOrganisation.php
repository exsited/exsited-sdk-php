<?php

declare(strict_types=1);

namespace Exsited\Resources\Organisation\OrganisationDto;

use Exsited\Client\Dto;
use Exsited\Client\WireName;

/** The root organisation body, under `organization`. */
final class SettingsOrganisation extends Dto
{
    public const ENVELOPE_KEY = 'organization';

    /** The endpoints this view covers. */
    public const MEASURED_FROM = [
        'GET /api/{api_version}/settings/organisation',
    ];

    public function __construct(
        /** Untyped. */
        #[WireName('address_line1')]
        public readonly mixed $addressLine1 = null,
        /** Untyped. */
        #[WireName('address_line2')]
        public readonly mixed $addressLine2 = null,
        /** Untyped. */
        #[WireName('address_line3')]
        public readonly mixed $addressLine3 = null,
        /** Untyped. */
        #[WireName('address_line4')]
        public readonly mixed $addressLine4 = null,
        /** Untyped. */
        #[WireName('address_line5')]
        public readonly mixed $addressLine5 = null,
        /** Untyped. */
        public readonly mixed $city = null,
        /** Untyped. */
        public readonly mixed $createdBy = null,
        public readonly ?string $createdOn = null,
        /** Untyped. */
        public readonly mixed $description = null,
        /** Untyped. */
        public readonly mixed $details = null,
        public readonly ?string $displayName = null,
        /** Untyped. */
        public readonly mixed $email = null,
        /** Untyped. */
        public readonly mixed $fax = null,
        /** Untyped. */
        public readonly mixed $faxAreaCode = null,
        /** Untyped. */
        public readonly mixed $faxCountryCode = null,
        public readonly ?string $href = null,
        public readonly ?string $id = null,
        /** Untyped. */
        public readonly mixed $lastUpdatedBy = null,
        public readonly ?string $lastUpdatedOn = null,
        /** Untyped. */
        public readonly mixed $mobile = null,
        /** Untyped. */
        public readonly mixed $mobileAreaCode = null,
        /** Untyped. */
        public readonly mixed $mobileCountryCode = null,
        public readonly ?string $name = null,
        /** Untyped. */
        public readonly ?array $nodes = null,
        public readonly ?string $object = null,
        public readonly ?SettingsOrganisationParentOrganization $parentOrganization = null,
        /** Untyped. */
        public readonly mixed $phone = null,
        /** Untyped. */
        public readonly mixed $phoneAreaCode = null,
        /** Untyped. */
        public readonly mixed $phoneCountryCode = null,
        /** Untyped. */
        public readonly mixed $postCode = null,
        /** Untyped. */
        public readonly mixed $state = null,
        public readonly ?string $status = null,
        public readonly ?string $type = null,
        /** Untyped. */
        public readonly mixed $website = null,
    ) {
    }
}
