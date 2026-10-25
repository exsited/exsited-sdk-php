<?php

declare(strict_types=1);

namespace Exsited\Resources\GiftCertificates\GiftCertificatesDto;

use Exsited\Client\Dto;
use Exsited\Client\ListOf;

/** The GiftCertificate body, as measured from the endpoints in MEASURED_FROM. */
final class GiftCertificate extends Dto
{
    public const ENVELOPE_KEY = 'gift_certificate';

    /** The endpoints this view was measured from. */
    public const MEASURED_FROM = [
        'GET /api/{api_version}/gift_certificates',
        'POST /api/{api_version}/gift_certificates',
        'GET /api/{api_version}/gift_certificates/{gc_id}',
        'PATCH /api/{api_version}/gift_certificates/{gc_id}',
    ];

    /** @param list<GiftCertificateAllocation|null>|null $allocations
     *  @param list<GiftCertificateTransactionDetail|null>|null $transactions
     *  @param list<GiftCertificateActivityLog|null>|null $activityLogs */
    public function __construct(
        public readonly ?GiftCertificateAccountingCode $accountingCode = null,
        #[ListOf(GiftCertificateActivityLog::class)]
        public readonly ?array $activityLogs = null,
        #[ListOf(GiftCertificateAllocation::class)]
        public readonly ?array $allocations = null,
        public readonly ?string $amount = null,
        public readonly ?string $code = null,
        public readonly mixed $createdBy = null,
        public readonly ?string $createdOn = null,
        public readonly ?GiftCertificateCurrency $currency = null,
        public readonly ?string $expiryDate = null,
        public readonly ?string $href = null,
        public readonly ?string $id = null,
        public readonly ?string $issueDate = null,
        public readonly mixed $lastUpdatedBy = null,
        public readonly ?string $lastUpdatedOn = null,
        public readonly mixed $linkedItem = null,
        public readonly ?string $object = null,
        public readonly ?string $remainingBalance = null,
        public readonly ?string $status = null,
        #[ListOf(GiftCertificateTransactionDetail::class)]
        public readonly ?array $transactions = null,
        public readonly ?string $usedAmount = null,
        public readonly ?int $version = null,
    ) {
    }
}
