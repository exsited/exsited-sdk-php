<?php

declare(strict_types=1);

namespace Exsited\Sdk\Resources\InventoryAdjustments;

final class InventoryAdjustmentsUrls
{
    public const INVENTORY_ADJUSTMENTS = '/api/{api_version}/inventory_adjustments';
    public const INVENTORY_ADJUSTMENT = '/api/{api_version}/inventory_adjustments/{inventory_adjustment_id}';

    /** The key the `INVENTORY_ADJUSTMENTS` listing's records sit under. */
    public const INVENTORY_ADJUSTMENTS_KEY = 'data';

    /** The envelope one `inventory_adjustment` record arrives under. */
    public const INVENTORY_ADJUSTMENT_KEY = 'inventory_adjustment';
}
