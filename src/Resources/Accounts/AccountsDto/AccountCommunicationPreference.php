<?php

declare(strict_types=1);

namespace Exsited\Resources\Accounts\AccountsDto;

use Exsited\Client\Dto;

/** One entry of the `communication_preferences` list of Account. */
final class AccountCommunicationPreference extends Dto
{
    public function __construct(
        public readonly ?string $channel = null,
        public readonly ?bool $enabled = null,
    ) {
    }
}
