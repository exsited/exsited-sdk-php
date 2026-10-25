<?php

declare(strict_types=1);

namespace Exsited\Sdk\Resources\Orders\OrdersDto;

use Exsited\Sdk\Client\Dto;
use Exsited\Sdk\Client\ListOf;

/** The AccountOrders body, as measured from the endpoints in MEASURED_FROM. */
final class AccountOrders extends Dto
{
    /** The endpoints this view was measured from. */
    public const MEASURED_FROM = [
        'GET /api/{api_version}/accounts/{account_id}/orders',
        'GET /api/{api_version}/orders/{order_id}/custom_objects',
        'GET /api/{api_version}/orders/{order_id}/custom_objects_instances',
        'GET /api/{api_version}/orders/{order_id}/item_fulfillments',
    ];

    /** @param list<AccountOrdersData|null>|null $data */
    public function __construct(
        #[ListOf(AccountOrdersData::class)]
        public readonly ?array $data = null,
        public readonly ?string $object = null,
        public readonly ?Pagination $pagination = null,
        public readonly ?string $url = null,
    ) {
    }
}
