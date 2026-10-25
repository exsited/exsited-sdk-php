<?php

declare(strict_types=1);

namespace Exsited\Resources\CustomAttributes\CustomAttributesDto;

use Exsited\Client\Dto;

/** One entry of the `activity_logs` list of CustomAttributesView. */
final class CustomAttributesViewActivityLog extends Dto
{
    public function __construct(
        public readonly ?string $activity = null,
    ) {
    }
}
