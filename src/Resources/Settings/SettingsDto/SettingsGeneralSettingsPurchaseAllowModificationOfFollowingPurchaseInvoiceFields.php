<?php

declare(strict_types=1);

namespace Exsited\Resources\Settings\SettingsDto;

use Exsited\Client\Dto;

/** A `SettingsGeneralSettingsPurchase`'s
 *  `allow_modification_of_following_purchase_invoice_fields`. */
final class SettingsGeneralSettingsPurchaseAllowModificationOfFollowingPurchaseInvoiceFields extends Dto
{
    public function __construct(
        public readonly ?string $dueDate = null,
        public readonly ?string $issueDate = null,
    ) {
    }
}
