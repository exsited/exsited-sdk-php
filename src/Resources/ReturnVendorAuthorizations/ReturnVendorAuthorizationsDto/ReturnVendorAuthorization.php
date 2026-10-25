<?php

declare(strict_types=1);

namespace Exsited\Sdk\Resources\ReturnVendorAuthorizations\ReturnVendorAuthorizationsDto;

use Exsited\Sdk\Client\Dto;

/** One return vendor authorization, as the listing returns it. */
final class ReturnVendorAuthorization extends Dto
{
    /** The endpoints this view was measured from. */
    public const MEASURED_FROM = [
        'GET /api/{api_version}/return_vendor_authorizations',
    ];

    public function __construct(
        public readonly ?ReturnVendorAuthorizationAccount $account = null,
        public readonly ?string $code = null,
        public readonly ?ReturnVendorAuthorizationCreatedBy $createdBy = null,
        public readonly ?string $createdOn = null,
        public readonly ?string $href = null,
        public readonly ?string $id = null,
        public readonly ?int $itemCount = null,
        /** Null in every record measured, so untyped. */
        public readonly mixed $lastUpdatedBy = null,
        /** Null in every record measured, so untyped. */
        public readonly mixed $lastUpdatedOn = null,
        public readonly ?string $note = null,
        public readonly ?string $object = null,
        public readonly ?ReturnVendorAuthorizationPurchaseOrder $purchaseOrder = null,
        public readonly ?string $returnStatus = null,
        public readonly ?string $rvaDate = null,
        public readonly ?string $status = null,
        public readonly ?int $version = null,
    ) {
    }
}
