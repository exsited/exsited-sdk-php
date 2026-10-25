<?php

declare(strict_types=1);

namespace Exsited\Resources\PurchaseCreditNoteApplications\PurchaseCreditNoteApplicationsDto;

use Exsited\Client\Dto;

/** The `created_by` object of PurchaseCreditNoteApplication. */
final class PurchaseCreditNoteApplicationCreatedBy extends Dto
{
    public function __construct(
        public readonly ?string $name = null,
        public readonly ?string $object = null,
    ) {
    }
}
