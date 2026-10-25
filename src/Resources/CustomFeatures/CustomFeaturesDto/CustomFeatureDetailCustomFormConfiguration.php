<?php

declare(strict_types=1);

namespace Exsited\Resources\CustomFeatures\CustomFeaturesDto;

use Exsited\Client\Dto;

/** The `configuration` object of CustomFeatureDetailCustomForm. */
final class CustomFeatureDetailCustomFormConfiguration extends Dto
{
    public function __construct(
        public readonly ?CustomFeatureDetailCustomFormConfigurationColumn1 $column1 = null,
        public readonly ?CustomFeatureDetailCustomFormConfigurationColumn2 $column2 = null,
        public readonly ?CustomFeatureDetailCustomFormConfigurationSettings $settings = null,
    ) {
    }
}
