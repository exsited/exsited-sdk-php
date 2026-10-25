<?php

declare(strict_types=1);

namespace Exsited\Resources\PurchaseInvoices\PurchaseInvoicesDto;

use Exsited\Client\Dto;
use Exsited\Client\ListOf;

/** The PurchaseInvoicesNote body, as measured from the endpoints in MEASURED_FROM. */
final class PurchaseInvoicesNote extends Dto
{
    /** The endpoints this view was measured from. */
    public const MEASURED_FROM = [
        'GET /api/{api_version}/purchase_invoices/notes',
    ];

    /** @param list<PurchaseInvoicesNoteWatcher|null>|null $watchers */
    public function __construct(
        public readonly ?array $attachments = null,
        public readonly ?string $content = null,
        public readonly ?PurchaseInvoicesNoteCreatedBy $createdBy = null,
        public readonly ?string $createdOn = null,
        public readonly mixed $group = null,
        public readonly ?string $href = null,
        public readonly ?string $id = null,
        public readonly ?PurchaseInvoicesNoteLastUpdatedBy $lastUpdatedBy = null,
        public readonly ?string $lastUpdatedOn = null,
        public readonly ?string $object = null,
        public readonly mixed $user = null,
        public readonly ?int $version = null,
        #[ListOf(PurchaseInvoicesNoteWatcher::class)]
        public readonly ?array $watchers = null,
    ) {
    }
}
