<?php

declare(strict_types=1);

namespace Exsited\Sdk\Resources\CustomFeatures\CustomFeaturesDto;

use Exsited\Sdk\Client\Dto;
use Exsited\Sdk\Client\ListOf;

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
