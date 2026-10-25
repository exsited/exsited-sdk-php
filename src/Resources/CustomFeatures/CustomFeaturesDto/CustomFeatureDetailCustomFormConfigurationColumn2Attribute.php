<?php

declare(strict_types=1);

namespace Exsited\Sdk\Resources\CustomFeatures\CustomFeaturesDto;

use Exsited\Sdk\Client\Dto;

/** One entry of the `attributes` list of CustomFeatureDetailCustomFormConfigurationColumn2. */
final class CustomFeatureDetailCustomFormConfigurationColumn2Attribute extends Dto
{
    public function __construct(
        public readonly ?string $name = null,
        public readonly ?string $type = null,
    ) {
    }
}
