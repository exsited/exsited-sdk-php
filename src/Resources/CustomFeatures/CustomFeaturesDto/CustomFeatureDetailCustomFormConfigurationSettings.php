<?php

declare(strict_types=1);

namespace Exsited\Resources\CustomFeatures\CustomFeaturesDto;

use Exsited\Client\Dto;

/** The `settings` object of CustomFeatureDetailCustomFormConfiguration. */
final class CustomFeatureDetailCustomFormConfigurationSettings extends Dto
{
    public function __construct(
        public readonly ?string $customForm = null,
        public readonly ?string $formLayout = null,
    ) {
    }
}
