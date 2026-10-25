<?php

declare(strict_types=1);

namespace Exsited\Resources\Invoices\InvoicesDto;

use Exsited\Client\Dto;

/** One entry of the `activity_logs` list of InvoicesView. */
final class InvoicesViewActivityLog extends Dto
{
    public function __construct(
        public readonly ?string $activity = null,
    ) {
    }
}
