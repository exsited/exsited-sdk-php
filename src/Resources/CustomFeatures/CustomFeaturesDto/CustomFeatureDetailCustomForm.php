<?php

declare(strict_types=1);

namespace Exsited\Resources\CustomFeatures\CustomFeaturesDto;

use Exsited\Client\Dto;

/** One entry of the `custom_forms` list of CustomFeatureDetail. */
final class CustomFeatureDetailCustomForm extends Dto
{
    public function __construct(
        public readonly ?CustomFeatureDetailCustomFormConfiguration $configuration = null,
    ) {
    }
}
