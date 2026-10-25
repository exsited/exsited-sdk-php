<?php

declare(strict_types=1);

namespace Exsited\Sdk\Resources\ReturnMerchandiseAuthorisations\ReturnMerchandiseAuthorisationsDto;

use Exsited\Sdk\Client\Dto;

/** The ReturnMerchandiseAuthorisation body, as measured from the endpoints in MEASURED_FROM. */
final class ReturnMerchandiseAuthorisation extends Dto
{
    /** The endpoints this view was measured from. */
    public const MEASURED_FROM = [
        'GET /api/{api_version}/return_merchandise_authorisations',
    ];

    public function __construct(
        public readonly ?ReturnMerchandiseAuthorisationAccount $account = null,
        public readonly ?string $code = null,
        public readonly ?ReturnMerchandiseAuthorisationCreatedBy $createdBy = null,
        public readonly ?string $createdOn = null,
        public readonly ?string $href = null,
        public readonly ?string $id = null,
        public readonly ?int $itemCount = null,
        public readonly mixed $lastUpdatedBy = null,
        public readonly mixed $lastUpdatedOn = null,
        public readonly ?string $note = null,
        public readonly ?string $object = null,
        public readonly ?string $returnStatus = null,
        public readonly ?string $rmaDate = null,
        public readonly ?ReturnMerchandiseAuthorisationSaleInvoice $saleInvoice = null,
        public readonly mixed $saleOrder = null,
        public readonly ?string $status = null,
        public readonly ?int $version = null,
        public readonly mixed $warehouse = null,
    ) {
    }
}
