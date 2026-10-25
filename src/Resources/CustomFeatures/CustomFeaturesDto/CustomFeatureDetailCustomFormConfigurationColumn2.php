<?php

declare(strict_types=1);

namespace Exsited\Resources\CustomFeatures\CustomFeaturesDto;

use Exsited\Client\Dto;
use Exsited\Client\ListOf;

/** The `column_2` object of CustomFeatureDetailCustomFormConfiguration. */
final class CustomFeatureDetailCustomFormConfigurationColumn2 extends Dto
{
    /** @param list<CustomFeatureDetailCustomFormConfigurationColumn2Attribute|null>|null $attributes */
    public function __construct(
        #[ListOf(CustomFeatureDetailCustomFormConfigurationColumn2Attribute::class)]
        public readonly ?array $attributes = null,
    ) {
    }
}
