<?php

declare(strict_types=1);

namespace Exsited\Sdk\Resources\CustomFeatures\CustomFeaturesDto;

use Exsited\Sdk\Client\Dto;

/** One entry of the `attributes` list of CustomFeatureDetailCustomFormConfigurationColumn1. */
final class CustomFeatureDetailCustomFormConfigurationColumn1Attribute extends Dto
{
    public function __construct(
        public readonly ?string $dataType = null,
        public readonly ?string $displayName = null,
        public readonly ?string $name = null,
        public readonly ?bool $showInListView = null,
        public readonly ?string $type = null,
    ) {
    }
}
