<?php

declare(strict_types=1);

namespace Exsited\Sdk\Resources\DocumentTemplates\DocumentTemplatesDto;

use Exsited\Sdk\Client\Dto;

/** The settings document template body, under `document_template`. */
final class SettingsDocumentTemplate extends Dto
{
    public const ENVELOPE_KEY = 'document_template';

    /** The endpoints this view was measured from. */
    public const MEASURED_FROM = [
        'GET /api/{api_version}/settings/document_templates',
        'GET /api/{api_version}/settings/document_templates/{document_template_id}',
        'POST /api/{api_version}/settings/document_templates',
        'PATCH /api/{api_version}/settings/document_templates/{document_template_id}',
    ];

    public function __construct(
        /** Null in every record measured, so untyped. */
        public readonly mixed $createdBy = null,
        public readonly ?string $createdOn = null,
        public readonly ?string $description = null,
        public readonly ?string $displayName = null,
        public readonly ?string $href = null,
        public readonly ?string $id = null,
        public readonly ?bool $isCustomTemplate = null,
        public readonly ?bool $isDefault = null,
        public readonly ?bool $isEdited = null,
        public readonly ?bool $isSystemTemplate = null,
        /** Null in every record measured, so untyped. */
        public readonly mixed $lastUpdatedBy = null,
        public readonly ?string $lastUpdatedOn = null,
        public readonly ?string $name = null,
        public readonly ?string $object = null,
        public readonly ?string $status = null,
        public readonly ?string $type = null,
        public readonly ?int $version = null,
    ) {
    }
}
