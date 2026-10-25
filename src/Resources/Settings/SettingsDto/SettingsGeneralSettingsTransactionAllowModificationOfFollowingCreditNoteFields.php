<?php

declare(strict_types=1);

namespace Exsited\Sdk\Resources\Settings\SettingsDto;

use Exsited\Sdk\Client\Dto;

/** A `SettingsGeneralSettingsTransaction`'s `allow_modification_of_following_credit_note_fields`. */
final class SettingsGeneralSettingsTransactionAllowModificationOfFollowingCreditNoteFields extends Dto
{
    public function __construct(
        public readonly ?string $creditNoteDate = null,
        public readonly ?string $refundable = null,
    ) {
    }
}
