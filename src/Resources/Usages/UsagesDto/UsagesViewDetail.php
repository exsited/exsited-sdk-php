<?php

declare(strict_types=1);

namespace Exsited\Sdk\Resources\Usages\UsagesDto;

use Exsited\Sdk\Client\Dto;
use Exsited\Sdk\Client\ListOf;

/** The `usages` object of UsagesView. */
final class UsagesViewDetail extends Dto
{
    /** @param list<UsagesViewDetailFailed|null>|null $failed
     *  @param list<UsagesViewDetailSuccess|null>|null $success */
    public function __construct(
        public readonly ?array $activityLogs = null,
        #[ListOf(UsagesViewDetailFailed::class)]
        public readonly ?array $failed = null,
        #[ListOf(UsagesViewDetailSuccess::class)]
        public readonly ?array $success = null,
    ) {
    }
}
