<?php

declare(strict_types=1);

namespace Exsited\Sdk\Resources\ReturnVendorAuthorizations\ReturnVendorAuthorizationsDto;

use Exsited\Sdk\Client\Dto;

/** What `getReturnVendorAuthorization` answers, under `return_vendor_authorization`: the listing's
 *  record with its `lines` and `receive_rvas`. */
final class ReturnVendorAuthorizationView extends Dto
{
    public const ENVELOPE_KEY = 'return_vendor_authorization';

    /** The endpoints this view was measured from. */
    public const MEASURED_FROM = [
        'GET /api/{api_version}/return_vendor_authorizations/{rva_id}',
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
        /** Empty in every record measured, so the entries are untyped. */
        public readonly ?array $lines = null,
        /** Empty in every record measured, so the entries are untyped. */
        public readonly ?array $receiveRvas = null,
    ) {
    }
}
