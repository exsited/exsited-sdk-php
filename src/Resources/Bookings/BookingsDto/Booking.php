<?php

declare(strict_types=1);

namespace Exsited\Sdk\Resources\Bookings\BookingsDto;

use Exsited\Sdk\Client\Dto;
use Exsited\Sdk\Client\ListOf;

/** The Booking body, as measured from the endpoints in MEASURED_FROM. */
final class Booking extends Dto
{
    /** The endpoints this view was measured from. */
    public const MEASURED_FROM = [
        'GET /api/{api_version}/booking',
    ];

    /** @param list<BookingCommunicationPreference|null>|null $communicationPreferences */
    public function __construct(
        public readonly ?BookingAccount $account = null,
        public readonly ?bool $allowContract = null,
        public readonly ?BookingBillingAddress $billingAddress = null,
        public readonly ?BookingBillingPreferences $billingPreferences = null,
        public readonly ?string $billingStartDate = null,
        public readonly ?string $billingStartDayOfMonth = null,
        #[ListOf(BookingCommunicationPreference::class)]
        public readonly ?array $communicationPreferences = null,
        public readonly ?BookingContractProperties $contractProperties = null,
        public readonly mixed $createdBy = null,
        public readonly ?string $createdOn = null,
        public readonly ?BookingCurrency $currency = null,
        public readonly ?BookingCustomForm $customForm = null,
        public readonly ?string $customerPurchaseOrderId = null,
        public readonly ?string $description = null,
        public readonly ?BookingDiscountProfile $discountProfile = null,
        public readonly ?string $displayName = null,
        public readonly ?string $id = null,
        public readonly ?string $invoiceNote = null,
        public readonly mixed $lastUpdatedBy = null,
        public readonly ?string $lastUpdatedOn = null,
        public readonly ?BookingManager $manager = null,
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
        public readonly ?BookingReferralAccount $referralAccount = null,
        public readonly ?BookingSalesRep $salesRep = null,
        public readonly ?BookingShippingAddress $shippingAddress = null,
        public readonly ?float $shippingCost = null,
        public readonly ?BookingShippingProfile $shippingProfile = null,
        public readonly ?string $status = null,
        public readonly ?BookingTimeZone $timeZone = null,
        public readonly ?int $version = null,
    ) {
    }
}
