<?php

declare(strict_types=1);

namespace Exsited\Resources\Accounts\AccountsDto;

use Exsited\Client\Dto;

/** The `proforma_properties` object of AccountOrdersDataBillingPreferences. */
final class AccountOrdersDataBillingPreferencesProformaProperties extends Dto
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
