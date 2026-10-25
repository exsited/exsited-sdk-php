<?php

declare(strict_types=1);

namespace Exsited\Resources\CustomFields\CustomFieldsDto;

use Exsited\Client\Dto;
use Exsited\Client\ListOf;

/** One page of `SettingsCustomField` records, under `data`. */
final class SettingsCustomFieldList extends Dto
{
    /** The endpoints this view was measured from. */
    public const MEASURED_FROM = [
        'GET /api/{api_version}/settings/custom_fields',
    ];

    /** @param list<SettingsCustomField|null>|null $data */
    public function __construct(
        #[ListOf(SettingsCustomField::class)]
        public readonly ?array $data = null,
        public readonly ?string $object = null,
        public readonly ?Pagination $pagination = null,
        public readonly ?string $url = null,
    ) {
    }
}
