<?php

declare(strict_types=1);

namespace Exsited\Sdk\Resources\Approvals;

final class ApprovalsUrls
{
    public const APPROVALS_ACCOUNT = '/api/{api_version}/approvals/account';
    public const APPROVALS_SALEORDER = '/api/{api_version}/approvals/saleOrder';
    public const APPROVALS_ACCOUNT_BY_UUID = '/api/{api_version}/approvals/account/{account_uuid}';
    public const APPROVALS_APPROVE = '/api/{api_version}/approvals/approve';
    public const APPROVALS_REJECT = '/api/{api_version}/approvals/reject';

    /** The key the `APPROVALS_ACCOUNT` listing's records sit under. */
    public const APPROVALS_ACCOUNT_KEY = 'data';

    /** The key the `APPROVALS_SALEORDER` listing's records sit under. */
    public const APPROVALS_SALEORDER_KEY = 'data';

    /** The envelope one `approval` record arrives under. */
    public const APPROVAL_KEY = 'approval';
}
