<?php

declare(strict_types=1);

namespace Exsited\Sdk\Resources\Accounts\AccountsDto;

use Exsited\Sdk\Client\Dto;

/** What `getAccountKpis` answers, under `account_kpis`. */
final class AccountKpis extends Dto
{
    public const ENVELOPE_KEY = 'account_kpis';

    /** The endpoints this view was measured from. */
    public const MEASURED_FROM = [
        'GET /api/{api_version}/accounts/{account_id}/kpis',
    ];

    public function __construct(
        public readonly ?string $object = null,
        public readonly ?string $totalRevenue = null,
        public readonly ?string $monthlyRecurringRevenue = null,
        public readonly ?string $totalCollected = null,
        public readonly ?string $totalRefunded = null,
        public readonly ?string $totalOutstanding = null,
        public readonly ?string $totalOverdue = null,
        public readonly ?string $totalBalance = null,
        public readonly ?string $totalCreditBalance = null,
        public readonly ?int $totalOrders = null,
        public readonly ?int $activeOrders = null,
        /** Null in every record measured, so untyped. */
        public readonly mixed $lastReactivatedAt = null,
        /** Null in every record measured, so untyped. */
        public readonly mixed $lastCancelledAt = null,
        /** Null in every record measured, so untyped. */
        public readonly mixed $deletedAt = null,
        public readonly ?string $computedAt = null,
    ) {
    }
}
