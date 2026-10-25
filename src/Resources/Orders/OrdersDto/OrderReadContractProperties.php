<?php

declare(strict_types=1);

namespace Exsited\Resources\Orders\OrdersDto;

use Exsited\Client\Dto;

/** The `contract_properties` object of OrderRead, sent for a contract order. */
final class OrderReadContractProperties extends Dto
{
    public function __construct(
        public readonly ?bool $allowDowngrade = null,
        public readonly ?bool $allowEarlyTermination = null,
        public readonly ?bool $allowPostponement = null,
        public readonly ?bool $allowTrial = null,
        public readonly ?bool $allowUpgrade = null,
        public readonly ?bool $applyEarlyTerminationCharge = null,
        public readonly ?string $autoRenewalEndsOn = null,
        public readonly ?bool $autoRenewalRequireCustomerAcceptance = null,
        public readonly ?string $autoRenewalTerm = null,
        public readonly ?string $earlyTerminationChargeType = null,
        public readonly ?string $earlyTerminationMinimumPeriod = null,
        public readonly ?string $initialContractTerm = null,
        public readonly ?string $renewAutomatically = null,
        public readonly ?bool $requireCustomerAcceptance = null,
        public readonly ?bool $requiresPaymentMethod = null,
        public readonly ?bool $startContractAfterTrialEnds = null,
        public readonly ?string $terminationAccountingCode = null,
        public readonly ?string $terminationFixedCharge = null,
        public readonly ?string $terminationNoticePeriod = null,
        public readonly ?string $trialEndDate = null,
        public readonly ?string $trialPeriod = null,
        public readonly ?bool $trialRequiresPaymentMethod = null,
    ) {
    }
}
