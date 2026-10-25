<?php

declare(strict_types=1);

namespace Exsited\Resources\ReturnMerchandiseAuthorisations\ReturnMerchandiseAuthorisationsDto;

use Exsited\Client\Dto;

/** The InvoiceReturnMerchandiseAuthorisationReceive body, as measured from the endpoints in
 *  MEASURED_FROM. */
final class InvoiceReturnMerchandiseAuthorisationReceive extends Dto
{
    public const ENVELOPE_KEY = 'receive_return_merchandise_authorisation';

    /** The endpoints this view was measured from. */
    public const MEASURED_FROM = [
        'GET /api/{api_version}/invoices/{invoice_id}/return_merchandise_authorisations/{rma_code}/receive',
        'GET /api/{api_version}/invoices/{invoice_id}/return_merchandise_authorisations/{rma_code}/receive/{receive_uuid}',
        'GET /api/{api_version}/return_merchandise_authorisations/{rma_code}/receive/{receive_uuid}',
    ];

    public function __construct(
        public readonly ?string $createdBy = null,
        public readonly ?string $createdOn = null,
        public readonly ?string $id = null,
        public readonly ?array $receiveReturns = null,
        public readonly ?InvoiceReturnMerchandiseAuthorisationReceiveDetail $receiveRma = null,
        public readonly ?string $uuid = null,
    ) {
    }
}
