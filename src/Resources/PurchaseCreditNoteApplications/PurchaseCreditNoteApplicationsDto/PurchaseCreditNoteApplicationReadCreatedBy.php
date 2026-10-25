<?php

declare(strict_types=1);

namespace Exsited\Sdk\Resources\PurchaseCreditNoteApplications\PurchaseCreditNoteApplicationsDto;

use Exsited\Sdk\Client\Dto;

/** The `created_by` object of PurchaseCreditNoteApplicationRead. */
final class PurchaseCreditNoteApplicationReadCreatedBy extends Dto
{
    public function __construct(
        public readonly ?string $name = null,
        public readonly ?string $object = null,
    ) {
    }
}
