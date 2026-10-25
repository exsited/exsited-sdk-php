<?php

declare(strict_types=1);

namespace Exsited\Resources\Accounts\AccountsDto;

use Exsited\Client\Dto;

/** One entry of the `attachments` list of AccountCommunicationsEmail. */
final class AccountCommunicationsEmailAttachment extends Dto
{
    public function __construct(
        public readonly ?string $filePath = null,
        public readonly ?string $name = null,
        public readonly ?string $path = null,
        public readonly ?int $size = null,
        public readonly ?string $type = null,
    ) {
    }
}
