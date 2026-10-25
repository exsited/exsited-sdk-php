<?php

declare(strict_types=1);

namespace Exsited\Resources\CustomAttributes\CustomAttributesDto;

use Exsited\Client\Dto;
use Exsited\Client\ListOf;

/** The CustomAttribute body, as measured from the endpoints in MEASURED_FROM. */
final class CustomAttribute extends Dto
{
    public const ENVELOPE_KEY = 'custom_attribute';

    /** The endpoints this view was measured from. */
    public const MEASURED_FROM = [
        'GET /api/{api_version}/custom_attributes',
        'GET /api/{api_version}/custom_attributes/{custom_attribute_id}',
        'PATCH /api/{api_version}/custom_attributes/{custom_attribute_id}',
    ];

    /** @param list<CustomAttributeUseIn|null>|null $useIn */
    public function __construct(
        public readonly mixed $createdBy = null,
        public readonly ?string $createdOn = null,
        public readonly ?string $description = null,
        public readonly ?string $displayName = null,
        public readonly ?bool $encryptData = null,
        public readonly ?string $href = null,
        public readonly ?string $id = null,
        public readonly mixed $includeSeconds = null,
        public readonly ?bool $isMandatory = null,
        public readonly mixed $lastUpdatedBy = null,
        public readonly ?string $lastUpdatedOn = null,
        public readonly ?int $maxLength = null,
        public readonly mixed $maxSize = null,
        public readonly mixed $maxValue = null,
        public readonly mixed $metaData = null,
        public readonly mixed $minValue = null,
        public readonly ?string $name = null,
        public readonly ?string $object = null,
        public readonly ?CustomAttributeOptions $options = null,
        public readonly ?string $status = null,
        public readonly mixed $timeFormat = null,
        public readonly ?string $type = null,
        public readonly mixed $unit = null,
        public readonly mixed $uom = null,
        #[ListOf(CustomAttributeUseIn::class)]
        public readonly ?array $useIn = null,
        public readonly ?int $version = null,
    ) {
    }
}
