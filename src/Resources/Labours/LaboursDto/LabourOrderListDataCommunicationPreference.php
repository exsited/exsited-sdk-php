<?php

declare(strict_types=1);

namespace Exsited\Resources\Labours\LaboursDto;

use Exsited\Client\Dto;

/** One entry of the `communication_preferences` list of LabourOrderListData. */
final class LabourOrderListDataCommunicationPreference extends Dto
{
    public function __construct(
        public readonly ?string $channel = null,
        public readonly ?bool $enabled = null,
    ) {
    }
}
