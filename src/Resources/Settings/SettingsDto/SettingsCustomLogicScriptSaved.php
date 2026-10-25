<?php

declare(strict_types=1);

namespace Exsited\Resources\Settings\SettingsDto;

use Exsited\Client\Dto;

/** What the custom logic script writes answer, under `custom_logic_script`: the read's fields and
 *  `code`, which the server does not store. */
final class SettingsCustomLogicScriptSaved extends Dto
{
    public const ENVELOPE_KEY = 'custom_logic_script';

    /** The endpoints this view was measured from. */
    public const MEASURED_FROM = [
        'POST /api/{api_version}/settings/custom_logic_scripts',
        'PATCH /api/{api_version}/settings/custom_logic_scripts/{custom_logic_script_id}',
    ];

    public function __construct(
        public readonly ?string $actionName = null,
        /** Null in every record measured, so untyped. */
        public readonly mixed $createdBy = null,
        public readonly ?string $createdOn = null,
        /** Null in every record measured, so untyped. */
        public readonly mixed $description = null,
        public readonly ?string $displayName = null,
        public readonly ?string $href = null,
        public readonly ?string $id = null,
        /** Null in every record measured, so untyped. */
        public readonly mixed $lastUpdatedBy = null,
        public readonly ?string $lastUpdatedOn = null,
        public readonly ?string $name = null,
        public readonly ?string $object = null,
        public readonly ?string $objectName = null,
        public readonly ?string $status = null,
        public readonly ?string $type = null,
        /** Null in every record measured, so untyped. */
        public readonly mixed $code = null,
    ) {
    }
}
