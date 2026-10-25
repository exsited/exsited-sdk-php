<?php

declare(strict_types=1);

namespace Exsited\Resources\Payments\PaymentsDto;

use Exsited\Client\Dto;
use Exsited\Client\ListOf;

/** A listing of one note's attachments - the same envelope, different records. */
final class NoteFileList extends Dto
{
    /** @param list<NoteAttachment|null>|null $data */
    public function __construct(
        public readonly ?string $object = null,
        public readonly ?string $url = null,
        #[ListOf(NoteAttachment::class)]
        public readonly ?array $data = null,
        public readonly ?Pagination $pagination = null,
    ) {
    }
}
