<?php

declare(strict_types=1);

namespace Exsited\Sdk\Resources\CustomAttributes\CustomAttributesDto;

use Exsited\Sdk\Client\Dto;
use Exsited\Sdk\Client\ListOf;

/** The CustomAttributesView body, as measured from the endpoints in MEASURED_FROM. */
final class CustomAttributesView extends Dto
{
    public const ENVELOPE_KEY = 'custom_attribute';

    /** The endpoints this view was measured from. */
    public const MEASURED_FROM = [
        'POST /api/{api_version}/custom_attributes',
    ];

    /** @param list<CustomAttributesViewUseIn|null>|null $useIn
     *  @param list<CustomAttributesViewActivityLog|null>|null $activityLogs */
    public function __construct(
        #[ListOf(CustomAttributesViewActivityLog::class)]
        public readonly ?array $activityLogs = null,
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
        public readonly ?string $metaData = null,
        public readonly mixed $minValue = null,
        public readonly ?string $name = null,
        public readonly ?string $object = null,
        public readonly ?CustomAttributesViewOptions $options = null,
        public readonly ?string $status = null,
        public readonly mixed $timeFormat = null,
        public readonly ?string $type = null,
        public readonly mixed $unit = null,
        public readonly mixed $uom = null,
        #[ListOf(CustomAttributesViewUseIn::class)]
        public readonly ?array $useIn = null,
        public readonly ?string $uuid = null,
        public readonly ?int $version = null,
    ) {
    }
}
