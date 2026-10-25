<?php

declare(strict_types=1);

namespace Exsited\Resources\GiftCertificates;

final class GiftCertificatesUrls
{
    public const GIFT_CERTIFICATES = '/api/{api_version}/gift_certificates';
    public const GIFT_CERTIFICATE = '/api/{api_version}/gift_certificates/{gc_id}';
    public const GIFT_CERTIFICATE_ALLOCATIONS = '/api/{api_version}/gift_certificates/{gc_id}/allocations';
    public const GIFT_CERTIFICATE_TRANSACTIONS = '/api/{api_version}/gift_certificates/{gc_id}/transactions';
    public const GIFT_CERTIFICATE_AMEND = '/api/{api_version}/gift_certificates/{gc_id}/amend';
    public const GIFT_CERTIFICATE_DEALLOCATIONS = '/api/{api_version}/gift_certificates/{gc_id}/deallocations';
    public const GIFT_CERTIFICATE_ALLOCATION = '/api/{api_version}/gift_certificates/{gc_id}/allocations/{allocation_id}';
    public const GIFT_CERTIFICATE_TRANSACTION = '/api/{api_version}/gift_certificates/{gc_id}/transactions/{transaction_id}';

    /** The key the `GIFT_CERTIFICATES` listing's records sit under. */
    public const GIFT_CERTIFICATES_KEY = 'data';

    /** The key the `GIFT_CERTIFICATE_ALLOCATIONS` listing's records sit under. */
    public const GIFT_CERTIFICATE_ALLOCATIONS_KEY = 'data';

    /** The key the `GIFT_CERTIFICATE_TRANSACTIONS` listing's records sit under. */
    public const GIFT_CERTIFICATE_TRANSACTIONS_KEY = 'data';

    /** The envelope one `gift_certificate` record arrives under. */
    public const GIFT_CERTIFICATE_KEY = 'gift_certificate';

    /** The key the `GIFT_CERTIFICATE_ALLOCATION` listing's records sit under. */
    public const GIFT_CERTIFICATE_ALLOCATION_KEY = 'gift_certificate_allocation';

    /** The key the `GIFT_CERTIFICATE_TRANSACTION` listing's records sit under. */
    public const GIFT_CERTIFICATE_TRANSACTION_KEY = 'gift_certificate_transaction';
}
