<?php

declare(strict_types=1);

namespace Exsited\Sdk\Resources\Accounts\AccountsDto;

use Exsited\Sdk\Client\Dto;

/** The `contract_properties` object of AccountOrdersData. */
final class AccountOrdersDataContractProperties extends Dto
{
    public function __construct(
        public readonly ?bool $allowDowngrade = null,
        public readonly ?bool $allowDowngradeCharge = null,
        public readonly ?bool $allowEarlyTermination = null,
        public readonly ?bool $allowPostponement = null,
        public readonly ?bool $allowTrial = null,
        public readonly ?bool $allowUpgrade = null,
        public readonly ?string $autoRenewalEndsOn = null,
        public readonly ?bool $autoRenewalRequireCustomerAcceptance = null,
        public readonly ?string $autoRenewalTerm = null,
        public readonly ?string $downgradeChargeFixed = null,
        public readonly ?string $downgradeChargeType = null,
        public readonly ?string $initialContractTerm = null,
        public readonly ?string $periodBeforeDowngrade = null,
        public readonly ?string $renewAutomatically = null,
        public readonly ?bool $requireCustomerAcceptance = null,
        public readonly ?bool $requiresPaymentMethod = null,
        public readonly ?string $terminationAccountingCode = null,
        public readonly ?string $terminationNoticePeriod = null,
    ) {
    }
}
