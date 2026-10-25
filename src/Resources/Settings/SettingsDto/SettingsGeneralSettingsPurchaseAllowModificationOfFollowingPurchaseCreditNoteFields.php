<?php

declare(strict_types=1);

namespace Exsited\Resources\Settings\SettingsDto;

use Exsited\Client\Dto;

/** A `SettingsGeneralSettingsPurchase`'s
 *  `allow_modification_of_following_purchase_credit_note_fields`. */
final class SettingsGeneralSettingsPurchaseAllowModificationOfFollowingPurchaseCreditNoteFields extends Dto
{
    public function __construct(
        public readonly ?string $refundable = null,
    ) {
    }
}
