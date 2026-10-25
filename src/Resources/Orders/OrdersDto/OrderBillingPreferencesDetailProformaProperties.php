<?php

declare(strict_types=1);

namespace Exsited\Sdk\Resources\Orders\OrdersDto;

use Exsited\Sdk\Client\Dto;

/** The `proforma_properties` object of OrderBillingPreferencesDetail. */
final class OrderBillingPreferencesDetailProformaProperties extends Dto
{
    public function __construct(
        public readonly mixed $acceptanceDate = null,
        public readonly ?bool $acceptanceRequired = null,
        public readonly ?string $acceptanceTerm = null,
        public readonly ?bool $paymentRequired = null,
        public readonly mixed $termsAndConditions = null,
    ) {
    }
}
