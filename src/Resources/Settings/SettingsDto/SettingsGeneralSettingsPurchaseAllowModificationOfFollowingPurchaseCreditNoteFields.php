<?php

declare(strict_types=1);

namespace Exsited\Sdk\Resources\Settings\SettingsDto;

use Exsited\Sdk\Client\Dto;

/** A `SettingsGeneralSettingsPurchase`'s
 *  `allow_modification_of_following_purchase_credit_note_fields`. */
final class SettingsGeneralSettingsPurchaseAllowModificationOfFollowingPurchaseCreditNoteFields extends Dto
{
    public function __construct(
        public readonly ?string $refundable = null,
    ) {
    }
}
