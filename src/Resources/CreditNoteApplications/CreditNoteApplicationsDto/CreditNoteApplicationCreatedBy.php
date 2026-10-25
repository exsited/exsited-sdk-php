<?php

declare(strict_types=1);

namespace Exsited\Resources\CreditNoteApplications\CreditNoteApplicationsDto;

use Exsited\Client\Dto;

/** The `created_by` object of CreditNoteApplication. */
final class CreditNoteApplicationCreatedBy extends Dto
{
    public function __construct(
        public readonly ?string $id = null,
        public readonly ?string $name = null,
        public readonly ?string $object = null,
    ) {
    }
}
