<?php

declare(strict_types=1);

namespace Exsited\Sdk\Resources\ReturnMerchandiseAuthorisations\ReturnMerchandiseAuthorisationsDto;

use Exsited\Sdk\Client\Dto;
use Exsited\Sdk\Client\ListOf;

/** The ReturnMerchandiseAuthorisationRead body, as measured from the endpoints in MEASURED_FROM. */
final class ReturnMerchandiseAuthorisationRead extends Dto
{
    public const ENVELOPE_KEY = 'return_merchandise_authorisation';

    /** The endpoints this view was measured from. */
    public const MEASURED_FROM = [
        'GET /api/{api_version}/invoices/{invoice_id}/return_merchandise_authorisations/{rma_id}',
        'GET /api/{api_version}/return_merchandise_authorisations/{rma_id}',
    ];

    /** @param list<ReturnMerchandiseAuthorisationReadReceiveRma|null>|null $receiveRmas */
    public function __construct(
        public readonly ?ReturnMerchandiseAuthorisationReadAccount $account = null,
        public readonly ?string $code = null,
        public readonly ?ReturnMerchandiseAuthorisationReadCreatedBy $createdBy = null,
        public readonly ?string $createdOn = null,
        public readonly ?string $href = null,
        public readonly ?string $id = null,
        public readonly ?int $itemCount = null,
        public readonly mixed $lastUpdatedBy = null,
        public readonly mixed $lastUpdatedOn = null,
        public readonly ?array $lines = null,
        public readonly ?string $note = null,
        public readonly ?string $object = null,
        #[ListOf(ReturnMerchandiseAuthorisationReadReceiveRma::class)]
        public readonly ?array $receiveRmas = null,
        public readonly ?string $returnStatus = null,
        public readonly ?string $rmaDate = null,
        public readonly ?ReturnMerchandiseAuthorisationReadSaleInvoice $saleInvoice = null,
        public readonly mixed $saleOrder = null,
        public readonly ?string $status = null,
        public readonly ?int $version = null,
        public readonly mixed $warehouse = null,
    ) {
    }
}
