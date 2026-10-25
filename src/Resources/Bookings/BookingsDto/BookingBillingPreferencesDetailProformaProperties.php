<?php

declare(strict_types=1);

namespace Exsited\Resources\Bookings\BookingsDto;

use Exsited\Client\Dto;

/** A `BookingBillingPreferencesDetail`'s `proforma_properties`. */
final class BookingBillingPreferencesDetailProformaProperties extends Dto
{
    public function __construct(
        /** Null in every record measured, so untyped. */
        public readonly mixed $acceptanceDate = null,
        public readonly ?bool $acceptanceRequired = null,
        /** Null in every record measured, so untyped. */
        public readonly mixed $acceptanceTerm = null,
        public readonly ?bool $paymentRequired = null,
        /** Null in every record measured, so untyped. */
        public readonly mixed $termsAndConditions = null,
    ) {
    }
}
