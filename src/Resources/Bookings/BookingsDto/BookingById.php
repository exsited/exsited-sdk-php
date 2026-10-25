<?php

declare(strict_types=1);

namespace Exsited\Sdk\Resources\Bookings\BookingsDto;

use Exsited\Sdk\Client\Dto;
use Exsited\Sdk\Client\ListOf;

/** The BookingById body, as measured from the endpoints in MEASURED_FROM. */
final class BookingById extends Dto
{
    public const ENVELOPE_KEY = 'order';

    /** The endpoints this view was measured from. */
    public const MEASURED_FROM = [
        'GET /api/{api_version}/booking/{booking_id}',
        'GET /api/{api_version}/booking/{booking_id}/information',
        'GET /api/{api_version}/booking/{booking_id}/lines',
        'PATCH /api/{api_version}/booking/{booking_id}/information',
        'PATCH /api/{api_version}/booking/{booking_id}/billing_preferences',
        'PATCH /api/{api_version}/booking/{booking_id}/lines/{line_uuid}',
        'PATCH /api/{api_version}/booking/{booking_id}/lines/{line_uuid}/billing_preferences',
    ];

    /** @param list<BookingByIdCommunicationPreference|null>|null $communicationPreferences
     *  @param list<BookingByIdCustomAttribute|null>|null $customAttributes
     *  @param list<BookingByIdLine|null>|null $lines */
    public function __construct(
        public readonly ?BookingByIdAccount $account = null,
        public readonly ?bool $allowContract = null,
        public readonly ?BookingByIdBillingAddress $billingAddress = null,
        public readonly ?BookingByIdBillingPreferences $billingPreferences = null,
        public readonly ?string $billingStartDate = null,
        #[ListOf(BookingByIdCommunicationPreference::class)]
        public readonly ?array $communicationPreferences = null,
        public readonly mixed $createdBy = null,
        public readonly ?string $createdOn = null,
        public readonly ?BookingByIdCurrency $currency = null,
        #[ListOf(BookingByIdCustomAttribute::class)]
        public readonly ?array $customAttributes = null,
        public readonly ?BookingByIdCustomForm $customForm = null,
        public readonly ?string $customerPurchaseOrderId = null,
        public readonly ?string $description = null,
        public readonly mixed $discountProfile = null,
        public readonly ?string $displayName = null,
        public readonly ?string $id = null,
        public readonly ?string $invoiceNote = null,
        public readonly ?BookingByIdKpis $kpis = null,
        public readonly mixed $lastUpdatedBy = null,
        public readonly ?string $lastUpdatedOn = null,
        #[ListOf(BookingByIdLine::class)]
        public readonly ?array $lines = null,
        public readonly ?BookingByIdManager $manager = null,
        public readonly ?string $name = null,
        public readonly ?string $nextBillingFromDate = null,
        public readonly ?string $nextBillingFromDateUtc = null,
        public readonly ?string $object = null,
        public readonly ?string $orderStartDate = null,
        public readonly ?string $orderType = null,
        public readonly ?string $origin = null,
        public readonly mixed $originalTotal = null,
        public readonly ?bool $preOrder = null,
        public readonly ?bool $priceTaxInclusive = null,
        public readonly ?bool $quoteConverted = null,
        public readonly ?bool $quoteOrder = null,
        public readonly mixed $referralAccount = null,
        public readonly mixed $salesRep = null,
        public readonly mixed $shippingAddress = null,
        public readonly ?float $shippingCost = null,
        public readonly ?array $shippingLineItems = null,
        public readonly mixed $shippingProfile = null,
        public readonly ?string $status = null,
        public readonly ?string $subtotal = null,
        public readonly ?string $tax = null,
        public readonly ?BookingByIdTimeZone $timeZone = null,
        public readonly ?string $total = null,
        public readonly ?int $version = null,
        /** Empty in every record measured; sent by the writes, not by the reads. */
        public readonly ?array $activityLogs = null,
    ) {
    }
}
