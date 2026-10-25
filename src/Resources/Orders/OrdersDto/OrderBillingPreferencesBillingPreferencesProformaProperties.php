<?php

declare(strict_types=1);

namespace Exsited\Resources\Orders\OrdersDto;

use Exsited\Client\Dto;

/** The `proforma_properties` object of OrderBillingPreferencesBillingPreferences. */
final class OrderBillingPreferencesBillingPreferencesProformaProperties extends Dto
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
