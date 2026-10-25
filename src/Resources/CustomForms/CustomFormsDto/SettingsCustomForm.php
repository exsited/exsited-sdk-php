<?php

declare(strict_types=1);

namespace Exsited\Sdk\Resources\CustomForms\CustomFormsDto;

use Exsited\Sdk\Client\Dto;

/** The settings custom form body, under `custom_form`. */
final class SettingsCustomForm extends Dto
{
    public const ENVELOPE_KEY = 'custom_form';

    /** The endpoints this view was measured from. */
    public const MEASURED_FROM = [
        'GET /api/{api_version}/settings/custom_forms',
        'GET /api/{api_version}/settings/custom_forms/{custom_form_id}',
        'POST /api/{api_version}/settings/custom_forms',
        'PATCH /api/{api_version}/settings/custom_forms/{custom_form_id}',
    ];

    public function __construct(
        /** Null in every record measured, so untyped. */
        public readonly mixed $createdBy = null,
        public readonly ?string $createdOn = null,
        public readonly ?string $description = null,
        public readonly ?string $displayName = null,
        public readonly ?bool $forDefaultTemplate = null,
        public readonly ?string $href = null,
        public readonly ?string $id = null,
        public readonly ?bool $isSystemTemplate = null,
        /** Null in every record measured, so untyped. */
        public readonly mixed $lastUpdatedBy = null,
        public readonly ?string $lastUpdatedOn = null,
        public readonly ?string $name = null,
        public readonly ?string $object = null,
        public readonly ?string $status = null,
    ) {
    }
}
