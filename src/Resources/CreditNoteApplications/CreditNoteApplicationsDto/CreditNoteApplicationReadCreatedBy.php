<?php

declare(strict_types=1);

namespace Exsited\Sdk\Resources\CreditNoteApplications\CreditNoteApplicationsDto;

use Exsited\Sdk\Client\Dto;

/** The `created_by` object of CreditNoteApplicationRead. */
final class CreditNoteApplicationReadCreatedBy extends Dto
{
    public function __construct(
        public readonly ?string $id = null,
        public readonly ?string $name = null,
        public readonly ?string $object = null,
    ) {
    }
}
