<?php

declare(strict_types=1);

namespace Exsited\Sdk\Resources\CustomFeatures\CustomFeaturesDto;

use Exsited\Sdk\Client\Dto;

/** The CustomFeature body, as measured from the endpoints in MEASURED_FROM. */
final class CustomFeature extends Dto
{
    /** The endpoints this view was measured from. */
    public const MEASURED_FROM = [
        'POST /api/{api_version}/custom_feature',
        'PATCH /api/{api_version}/custom_feature/{custom_feature_id}',
        'POST /api/{api_version}/custom_feature/{custom_feature_id}',
        'GET /api/{api_version}/custom_feature/{custom_feature_id}',
    ];

    public function __construct(
        public readonly ?CustomFeatureDetail $customFeature = null,
        public readonly ?string $message = null,
    ) {
    }
}
