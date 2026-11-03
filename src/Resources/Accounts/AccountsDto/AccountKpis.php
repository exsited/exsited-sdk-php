<?php

declare(strict_types=1);

namespace Exsited\Resources\Accounts\AccountsDto;

use Exsited\Client\Dto;

/** What `getAccountKpis` answers, under `account_kpis`. */
final class AccountKpis extends Dto
{
    public const ENVELOPE_KEY = 'account_kpis';

    /** The endpoints this view covers. */
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
        /** Untyped. */
        public readonly mixed $lastReactivatedAt = null,
        /** Untyped. */
        public readonly mixed $lastCancelledAt = null,
        /** Untyped. */
        public readonly mixed $deletedAt = null,
        public readonly ?string $computedAt = null,
    ) {
    }
}
