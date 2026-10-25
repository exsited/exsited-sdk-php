<?php

declare(strict_types=1);

namespace Exsited\Sdk\Resources\PurchaseRefunds;

final class PurchaseRefundsUrls
{
    public const PURCHASE_REFUNDS = '/api/{api_version}/purchase_refunds';
    public const PURCHASE_REFUND = '/api/{api_version}/purchase_refunds/{purchase_refund_id}';
    public const PURCHASE_CREDIT_NOTE_PURCHASE_REFUNDS = '/api/{api_version}/purchase_credit_notes/{purchase_credit_note_id}/purchase_refunds';

    /** The key the `PURCHASE_REFUNDS` listing's records sit under. */
    public const PURCHASE_REFUNDS_KEY = 'data';

    /** The envelope one `purchase_refund` record arrives under. */
    public const PURCHASE_REFUND_KEY = 'purchase_refund';
}
