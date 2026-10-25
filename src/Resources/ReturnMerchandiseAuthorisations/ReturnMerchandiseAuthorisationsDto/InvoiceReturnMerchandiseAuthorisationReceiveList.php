<?php

declare(strict_types=1);

namespace Exsited\Resources\ReturnMerchandiseAuthorisations\ReturnMerchandiseAuthorisationsDto;

use Exsited\Client\Dto;
use Exsited\Client\ListOf;

/** A page of InvoiceReturnMerchandiseAuthorisationReceive records under
 *  `receive_return_merchandise_authorisations`, the key the API documents for this listing. */
final class InvoiceReturnMerchandiseAuthorisationReceiveList extends Dto
{
    /** The endpoints this page view was measured from. */
    public const MEASURED_FROM = [
        'GET /api/{api_version}/invoices/{invoice_id}/return_merchandise_authorisations/{rma_code}/receive',
        'GET /api/{api_version}/return_merchandise_authorisations/{rma_code}/receive',
    ];

    /** @param list<InvoiceReturnMerchandiseAuthorisationReceive|null>|null $receiveReturnMerchandiseAuthorisations
     *  @param list<InvoiceReturnMerchandiseAuthorisationReceiveListData|null>|null $data */
    public function __construct(
        #[ListOf(InvoiceReturnMerchandiseAuthorisationReceive::class)]
        public readonly ?array $receiveReturnMerchandiseAuthorisations = null,
        public readonly ?Pagination $pagination = null,
        public readonly ?string $object = null,
        public readonly ?string $url = null,
        #[ListOf(InvoiceReturnMerchandiseAuthorisationReceiveListData::class)]
        public readonly ?array $data = null,
    ) {
    }
}
