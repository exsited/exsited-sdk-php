<?php

declare(strict_types=1);

namespace Exsited\Sdk\Resources\DocumentTemplates\DocumentTemplatesDto;

use Exsited\Sdk\Client\Dto;
use Exsited\Sdk\Client\ListOf;

/** One page of `SettingsDocumentTemplate` records, under `data`. */
final class SettingsDocumentTemplateList extends Dto
{
    /** The endpoints this view was measured from. */
    public const MEASURED_FROM = [
        'GET /api/{api_version}/settings/document_templates',
    ];

    /** @param list<SettingsDocumentTemplate|null>|null $data */
    public function __construct(
        #[ListOf(SettingsDocumentTemplate::class)]
        public readonly ?array $data = null,
        public readonly ?string $object = null,
        public readonly ?Pagination $pagination = null,
        public readonly ?string $url = null,
    ) {
    }
}
