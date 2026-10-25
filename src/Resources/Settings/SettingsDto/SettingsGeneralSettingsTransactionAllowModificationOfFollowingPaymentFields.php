<?php

declare(strict_types=1);

namespace Exsited\Resources\Settings\SettingsDto;

use Exsited\Client\Dto;

/** A `SettingsGeneralSettingsTransaction`'s `allow_modification_of_following_payment_fields`. */
final class SettingsGeneralSettingsTransactionAllowModificationOfFollowingPaymentFields extends Dto
{
    public function __construct(
        public readonly ?string $paymentDate = null,
        public readonly ?string $paymentProcessor = null,
        public readonly ?string $paymentReference = null,
    ) {
    }
}
