<?php

declare(strict_types=1);

namespace Exsited\Resources\CustomForms\CustomFormsDto;

use Exsited\Client\Dto;
use Exsited\Client\ListOf;

/** One page of `SettingsCustomForm` records, under `data`. */
final class SettingsCustomFormList extends Dto
{
    /** The endpoints this view was measured from. */
    public const MEASURED_FROM = [
        'GET /api/{api_version}/settings/custom_forms',
    ];

    /** @param list<SettingsCustomForm|null>|null $data */
    public function __construct(
        #[ListOf(SettingsCustomForm::class)]
        public readonly ?array $data = null,
        public readonly ?string $object = null,
        public readonly ?Pagination $pagination = null,
        public readonly ?string $url = null,
    ) {
    }
}
