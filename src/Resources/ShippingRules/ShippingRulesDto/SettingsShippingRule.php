<?php

declare(strict_types=1);

namespace Exsited\Sdk\Resources\ShippingRules\ShippingRulesDto;

use Exsited\Sdk\Client\Dto;

/** The settings shipping rule body, under `shipping_rule`. */
final class SettingsShippingRule extends Dto
{
    public const ENVELOPE_KEY = 'shipping_rule';

    /** The endpoints this view was measured from. */
    public const MEASURED_FROM = [
        'GET /api/{api_version}/settings/shipping_rules',
        'GET /api/{api_version}/settings/shipping_rules/{shipping_rule_id}',
        'POST /api/{api_version}/settings/shipping_rules',
        'PATCH /api/{api_version}/settings/shipping_rules/{shipping_rule_id}',
    ];

    public function __construct(
        public readonly ?SettingsShippingRuleConfiguration $configuration = null,
        /** Null in every record measured, so untyped. */
        public readonly mixed $createdBy = null,
        public readonly ?string $createdOn = null,
        public readonly ?string $description = null,
        public readonly ?string $href = null,
        public readonly ?string $id = null,
        /** Null in every record measured, so untyped. */
        public readonly mixed $lastUpdatedBy = null,
        public readonly ?string $lastUpdatedOn = null,
        public readonly ?string $name = null,
        public readonly ?string $object = null,
        /** Null in every record measured, so untyped. */
        public readonly mixed $shippingClass = null,
        public readonly ?string $status = null,
        public readonly ?int $version = null,
    ) {
    }
}
