<?php

declare(strict_types=1);

namespace Exsited\Sdk\Resources\Reconciliations;

final class ReconciliationsUrls
{
    public const RECONCILIATION_SALE_PAYMENTS = '/api/{api_version}/reconciliations/{reconciliation_id}/sale_payments';
    public const RECONCILIATION_SALE_REFUNDS = '/api/{api_version}/reconciliations/{reconciliation_id}/sale_refunds';

    /** The key the `RECONCILIATION_SALE_PAYMENTS` listing's records sit under. */
    public const RECONCILIATION_SALE_PAYMENTS_KEY = 'data';

    /** The key the `RECONCILIATION_SALE_REFUNDS` listing's records sit under. */
    public const RECONCILIATION_SALE_REFUNDS_KEY = 'data';
}
