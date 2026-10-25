<?php

declare(strict_types=1);

namespace Exsited\Sdk\Resources\Accounts\AccountsDto;

use Exsited\Sdk\Client\Dto;
use Exsited\Sdk\Client\ListOf;

/** One entry of the `data` list of AccountOrders. */
final class AccountOrdersData extends Dto
{
    /** @param list<AccountOrdersDataCommunicationPreference|null>|null $communicationPreferences
     *  @param list<AccountOrdersDataCreditApplied|null>|null $creditApplied
     *  @param list<AccountOrdersDataCreditNoteApplication|null>|null $creditNoteApplications
     *  @param list<AccountOrdersDataCustomAttribute|null>|null $customAttributes
     *  @param list<AccountOrdersDataInvoice|null>|null $invoices
     *  @param list<AccountOrdersDataPaymentApplied|null>|null $paymentApplied
     *  @param list<AccountOrdersDataPaymentMethodApplication|null>|null $paymentMethodApplications
     *  @param list<AccountOrdersDataPurchaseInvoiceApplication|null>|null $purchaseInvoiceApplications */
    public function __construct(
        public readonly ?AccountOrdersDataAccount $account = null,
        public readonly ?bool $allowContract = null,
        public readonly ?string $alternateBillingEndDate = null,
        public readonly ?string $alternateBillingStartDate = null,
        public readonly ?string $alternateDueDate = null,
        public readonly ?string $alternateIssueDate = null,
        public readonly ?string $amount = null,
        public readonly ?string $billTotal = null,
        public readonly ?AccountOrdersDataBillingAddress $billingAddress = null,
        public readonly ?string $billingEndDate = null,
        public readonly ?AccountOrdersDataBillingPreferences $billingPreferences = null,
        public readonly ?string $billingStartDate = null,
        public readonly ?string $billingStartDayOfMonth = null,
        public readonly ?string $code = null,
        #[ListOf(AccountOrdersDataCommunicationPreference::class)]
        public readonly ?array $communicationPreferences = null,
        public readonly ?AccountOrdersDataContractProperties $contractProperties = null,
        public readonly mixed $createdBy = null,
        public readonly ?string $createdOn = null,
        #[ListOf(AccountOrdersDataCreditApplied::class)]
        public readonly ?array $creditApplied = null,
        public readonly ?AccountOrdersDataCreditNote $creditNote = null,
        #[ListOf(AccountOrdersDataCreditNoteApplication::class)]
        public readonly ?array $creditNoteApplications = null,
        public readonly ?string $creditNoteTotal = null,
        public readonly ?AccountOrdersDataCurrency $currency = null,
        #[ListOf(AccountOrdersDataCustomAttribute::class)]
        public readonly ?array $customAttributes = null,
        public readonly ?AccountOrdersDataCustomForm $customForm = null,
        public readonly ?string $customerPurchaseOrderId = null,
        public readonly ?string $description = null,
        public readonly ?float $discountAmount = null,
        public readonly ?AccountOrdersDataDiscountProfile $discountProfile = null,
        public readonly ?string $displayName = null,
        public readonly ?string $due = null,
        public readonly ?string $dueDate = null,
        public readonly ?string $dueTotal = null,
        public readonly ?string $expectedCompletionDate = null,
        public readonly mixed $gatewayResponse = null,
        public readonly ?array $giftCertificateApplied = null,
        public readonly ?string $href = null,
        public readonly ?string $id = null,
        public readonly ?string $initialAmount = null,
        public readonly ?string $invoiceNote = null,
        #[ListOf(AccountOrdersDataInvoice::class)]
        public readonly ?array $invoices = null,
        public readonly ?bool $isPriceTaxInclusive = null,
        public readonly ?string $issueDate = null,
        public readonly ?AccountOrdersDataLastPayment $lastPayment = null,
        public readonly ?AccountOrdersDataLastUpdatedBy $lastUpdatedBy = null,
        public readonly ?string $lastUpdatedOn = null,
        public readonly ?AccountOrdersDataManager $manager = null,
        public readonly ?string $name = null,
        public readonly ?string $nextBillingFromDate = null,
        public readonly ?string $nextBillingFromDateUtc = null,
        public readonly mixed $note = null,
        public readonly ?string $object = null,
        public readonly ?string $operationalStatus = null,
        public readonly ?AccountOrdersDataOrder $order = null,
        public readonly ?string $orderStartDate = null,
        public readonly ?string $orderType = null,
        public readonly ?string $origin = null,
        public readonly ?string $originalTotal = null,
        public readonly ?string $paid = null,
        public readonly ?string $paidAmount = null,
        public readonly ?string $paidTotal = null,
        public readonly ?AccountOrdersDataPayment $payment = null,
        #[ListOf(AccountOrdersDataPaymentApplied::class)]
        public readonly ?array $paymentApplied = null,
        public readonly ?string $paymentDate = null,
        public readonly ?string $paymentMethod = null,
        #[ListOf(AccountOrdersDataPaymentMethodApplication::class)]
        public readonly ?array $paymentMethodApplications = null,
        public readonly ?string $paymentNote = null,
        public readonly ?string $paymentProcessor = null,
        public readonly mixed $paymentReference = null,
        public readonly ?string $paymentStatus = null,
        public readonly ?bool $preOrder = null,
        public readonly ?bool $priceTaxInclusive = null,
        #[ListOf(AccountOrdersDataPurchaseInvoiceApplication::class)]
        public readonly ?array $purchaseInvoiceApplications = null,
        public readonly ?AccountOrdersDataPurchaseOrder $purchaseOrder = null,
        public readonly ?string $purchaseOrderNote = null,
        public readonly ?bool $quoteConverted = null,
        public readonly ?bool $quoteOrder = null,
        public readonly ?string $reconcileStatus = null,
        public readonly ?string $reference = null,
        public readonly mixed $referralAccount = null,
        public readonly ?string $refundAmount = null,
        public readonly ?bool $refundable = null,
        public readonly ?string $remainingAmount = null,
        public readonly mixed $saleOrder = null,
        public readonly mixed $salesRep = null,
        public readonly ?AccountOrdersDataShippingAddress $shippingAddress = null,
        public readonly ?float $shippingCost = null,
        public readonly mixed $shippingProfile = null,
        public readonly ?string $status = null,
        public readonly ?string $subtotal = null,
        public readonly ?string $supplierInvoiceId = null,
        public readonly ?string $tax = null,
        public readonly ?string $taxTotal = null,
        public readonly ?AccountOrdersDataTimeZone $timeZone = null,
        public readonly ?string $total = null,
        public readonly ?string $type = null,
        public readonly ?string $uuid = null,
        public readonly ?int $version = null,
        public readonly mixed $warehouse = null,
    ) {
    }
}
