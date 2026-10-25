<?php

declare(strict_types=1);

namespace Exsited\Resources\CreditNoteApplications\CreditNoteApplicationsDto;

use Exsited\Client\Dto;
use Exsited\Client\ListOf;

/** A page of CreditNoteApplication records under `data`; an unreadable entry is null and keeps its
 *  place. */
final class CreditNoteApplicationList extends Dto
{
    /** The endpoints this page view was measured from. */
    public const MEASURED_FROM = [
        'GET /api/{api_version}/credit_note_applications',
    ];

    /** @param list<CreditNoteApplication|null>|null $data */
    public function __construct(
        #[ListOf(CreditNoteApplication::class)]
        public readonly ?array $data = null,
        public readonly ?string $object = null,
        public readonly ?Pagination $pagination = null,
        public readonly ?string $url = null,
    ) {
    }
}
