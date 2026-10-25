<?php

declare(strict_types=1);

namespace Exsited\Resources\Bookings\BookingsDto;

use Exsited\Client\Dto;

/** The `proforma_properties` object of BookingByIdBillingPreferences. */
final class BookingByIdBillingPreferencesProformaProperties extends Dto
{
    public function __construct(
        public readonly mixed $acceptanceDate = null,
        public readonly ?bool $acceptanceRequired = null,
        public readonly mixed $acceptanceTerm = null,
        public readonly ?bool $paymentRequired = null,
        public readonly mixed $termsAndConditions = null,
    ) {
    }
}
