<?php

declare(strict_types=1);

namespace Exsited\Sdk\Resources\CustomFeatures\CustomFeaturesDto;

use Exsited\Sdk\Client\Dto;
use Exsited\Sdk\Client\ListOf;

/** The `custom_feature` object of CustomFeature. */
final class CustomFeatureDetail extends Dto
{
    /** @param list<CustomFeatureDetailCustomForm|null>|null $customForms */
    public function __construct(
        public readonly ?array $activityLogs = null,
        public readonly ?array $childCustomComponents = null,
        public readonly mixed $createdBy = null,
        public readonly ?string $createdOn = null,
        public readonly mixed $customComponent = null,
        #[ListOf(CustomFeatureDetailCustomForm::class)]
        public readonly ?array $customForms = null,
        public readonly ?array $customObjects = null,
        public readonly ?string $description = null,
        public readonly ?string $displayName = null,
        public readonly ?string $href = null,
        public readonly ?string $id = null,
        public readonly mixed $lastUpdatedBy = null,
        public readonly ?string $lastUpdatedOn = null,
        public readonly ?string $name = null,
        public readonly ?string $object = null,
        public readonly ?string $relation = null,
        public readonly ?string $status = null,
        public readonly ?string $useIn = null,
        public readonly ?int $version = null,
    ) {
    }
}
