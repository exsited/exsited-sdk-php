<?php

declare(strict_types=1);

namespace Exsited\Sdk\Resources\Orders\OrdersDto;

use Exsited\Sdk\Client\Dto;
use Exsited\Sdk\Client\ListOf;

/** The OrderInformation body, as measured from the endpoints in MEASURED_FROM. */
final class OrderInformation extends Dto
{
    public const ENVELOPE_KEY = 'order';

    /** The endpoints this view was measured from. */
    public const MEASURED_FROM = [
        'GET /api/{api_version}/orders/{order_id}/information',
    ];

    /** @param list<OrderInformationCommunicationPreference|null>|null $communicationPreferences */
    public function __construct(
        public readonly ?OrderInformationAccount $account = null,
        public readonly ?bool $allowContract = null,
        public readonly ?OrderInformationBillingAddress $billingAddress = null,
        public readonly ?string $billingStartDate = null,
        public readonly ?string $billingStartDayOfMonth = null,
        #[ListOf(OrderInformationCommunicationPreference::class)]
        public readonly ?array $communicationPreferences = null,
        public readonly mixed $createdBy = null,
        public readonly ?string $createdOn = null,
        public readonly ?OrderInformationCurrency $currency = null,
        public readonly ?OrderInformationCustomForm $customForm = null,
        public readonly mixed $customerPurchaseOrderId = null,
        public readonly ?string $description = null,
        public readonly ?OrderInformationDiscountProfile $discountProfile = null,
        public readonly ?string $displayName = null,
        public readonly ?string $id = null,
        public readonly ?string $invoiceNote = null,
        public readonly mixed $lastUpdatedBy = null,
        public readonly ?string $lastUpdatedOn = null,
        public readonly ?OrderInformationManager $manager = null,
        public readonly ?string $name = null,
        public readonly ?string $nextBillingFromDate = null,
        public readonly ?string $nextBillingFromDateUtc = null,
        public readonly ?string $object = null,
        public readonly ?string $orderStartDate = null,
        public readonly ?string $orderType = null,
        public readonly ?string $origin = null,
        public readonly ?string $originalTotal = null,
        public readonly ?bool $preOrder = null,
        public readonly ?bool $priceTaxInclusive = null,
        public readonly ?bool $quoteConverted = null,
        public readonly ?bool $quoteOrder = null,
        public readonly mixed $referralAccount = null,
        public readonly mixed $salesRep = null,
        public readonly ?OrderInformationShippingAddress $shippingAddress = null,
        public readonly ?float $shippingCost = null,
        public readonly mixed $shippingProfile = null,
        public readonly ?string $status = null,
        public readonly ?OrderInformationTimeZone $timeZone = null,
        public readonly ?int $version = null,
    ) {
    }
}
