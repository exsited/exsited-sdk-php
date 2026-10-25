<?php

declare(strict_types=1);

namespace Exsited\Resources\Settings\SettingsDto;

use Exsited\Client\Dto;

/** A `SettingsGeneralSettingsTransaction`'s `allow_modification_of_following_refund_fields`. */
final class SettingsGeneralSettingsTransactionAllowModificationOfFollowingRefundFields extends Dto
{
    public function __construct(
        public readonly ?string $refundDate = null,
        public readonly ?string $refundReference = null,
    ) {
    }
}
