<?php

declare(strict_types=1);

namespace Exsited\Resources\CustomFeatures\CustomFeaturesDto;

use Exsited\Client\Dto;
use Exsited\Client\ListOf;

/** The `column_1` object of CustomFeatureDetailCustomFormConfiguration. */
final class CustomFeatureDetailCustomFormConfigurationColumn1 extends Dto
{
    /** @param list<CustomFeatureDetailCustomFormConfigurationColumn1Attribute|null>|null $attributes */
    public function __construct(
        #[ListOf(CustomFeatureDetailCustomFormConfigurationColumn1Attribute::class)]
        public readonly ?array $attributes = null,
    ) {
    }
}
