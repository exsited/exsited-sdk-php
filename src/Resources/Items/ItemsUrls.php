<?php

declare(strict_types=1);

namespace Exsited\Sdk\Resources\Items;

final class ItemsUrls
{
    public const ITEMS = '/api/{api_version}/items';
    public const ITEM = '/api/{api_version}/items/{item_id}';
    public const ITEM_BUNDLE_DETAILS = '/api/{api_version}/items/{item_id}/bundle_details';
    public const ITEM_DEACTIVATE = '/api/{api_version}/items/{item_id}/deactivate';
    public const ITEM_FAMILY_DETAILS = '/api/{api_version}/items/{item_id}/family_details';
    public const ITEM_IMAGE = '/api/{api_version}/items/{item_id}/image';
    public const ITEM_INFORMATION = '/api/{api_version}/items/{item_id}/information';
    public const ITEM_INVENTORIES = '/api/{api_version}/items/{item_id}/inventories';
    public const ITEM_INVENTORY_ADJUSTMENTS = '/api/{api_version}/items/{item_id}/inventory_adjustments';
    public const ITEM_NOTES = '/api/{api_version}/items/{item_id}/notes';
    public const ITEM_PACKAGE_DETAILS = '/api/{api_version}/items/{item_id}/package_details';
    public const ITEM_PURCHASE = '/api/{api_version}/items/{item_id}/purchase';
    public const ITEM_REACTIVATE = '/api/{api_version}/items/{item_id}/reactivate';
    public const ITEM_SALE = '/api/{api_version}/items/{item_id}/sale';
    public const ITEM_VARIATIONS = '/api/{api_version}/items/{item_id}/variations';
    public const ITEM_INVENTORY_ADD = '/api/{api_version}/items/{item_id}/inventory/add';
    public const ITEM_NOTE = '/api/{api_version}/items/{item_id}/notes/{item_note_id}';
    public const ITEM_PACKAGE_DETAIL = '/api/{api_version}/items/{item_id}/package_details/{package_detail_id}';
    public const ITEM_NOTE_FILES = '/api/{api_version}/items/{item_id}/notes/{item_note_id}/files';
    public const ITEM_WAREHOUSE_INVENTORIES = '/api/{api_version}/items/{item_id}/warehouses/{warehouse_name}/inventories';
    public const ITEM_NOTE_FILE = '/api/{api_version}/items/{item_id}/notes/{item_note_id}/files/{item_file_id}';
    public const ITEM_INVENTORIES_ADD = '/api/{api_version}/items/{item_id}/inventories/add';
    public const ITEM_INVENTORY = '/api/{api_version}/items/{item_id}/inventory';
    public const ITEM_KPIS = '/api/{api_version}/items/{item_id}/kpis';

    /** The key the `ITEMS` listing's records sit under. */
    public const ITEMS_KEY = 'data';

    /** The key the `ITEM_INVENTORY_ADJUSTMENTS` listing's records sit under. */
    public const ITEM_INVENTORY_ADJUSTMENTS_KEY = 'data';

    /** The key the `ITEM_NOTES` listing's records sit under. */
    public const ITEM_NOTES_KEY = 'data';

    /** The key the `ITEM_NOTE` listing's records sit under. */
    public const ITEM_NOTE_KEY = 'data';

    /** The envelope one `item` record arrives under. */
    public const ITEM_KEY = 'item';

    /** The envelope one `note` record arrives under. */
    public const NOTE_KEY = 'note';

    /** The key the `ITEM_KPIS` listing's records sit under. */
    public const ITEM_KPIS_KEY = 'item_kpis';

    /** The names that shape the listing, which pages by cursor; every other name is a
     *  `filter_<field>`. `order_by` and `direction` are accepted and ignored, and a bare `filter`
     *  expression is `400`.
     *  @var list<string> */
    public const ITEMS_QUERY_PARAMS = ['limit', 'cursor', 'sort'];
}
