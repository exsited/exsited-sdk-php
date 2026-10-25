<?php

declare(strict_types=1);

namespace Exsited\Resources\Accounts\AccountsDto;

use Exsited\Client\Dto;
use Exsited\Client\ListOf;

/** The AccountPaymentMethods body, as measured from the endpoints in MEASURED_FROM. */
final class AccountPaymentMethods extends Dto
{
    public const ENVELOPE_KEY = 'account';

    /** The endpoints this view was measured from. */
    public const MEASURED_FROM = [
        'GET /api/{api_version}/accounts/{account_id}/payment_methods',
    ];

    /** @param list<AccountPaymentMethodsPaymentMethod|null>|null $paymentMethods */
    public function __construct(
        public readonly ?array $communicationPreferences = null,
        public readonly mixed $customForm = null,
        public readonly mixed $emailAddress = null,
        public readonly ?string $id = null,
        public readonly mixed $imageUrl = null,
        public readonly ?string $object = null,
        public readonly mixed $parentAccountId = null,
        #[ListOf(AccountPaymentMethodsPaymentMethod::class)]
        public readonly ?array $paymentMethods = null,
        public readonly ?AccountPaymentMethodsSocialLinks $socialLinks = null,
        public readonly ?string $workflowStatus = null,
    ) {
    }
}
