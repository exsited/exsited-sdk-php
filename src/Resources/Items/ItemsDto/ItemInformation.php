<?php

declare(strict_types=1);

namespace Exsited\Resources\Items\ItemsDto;

use Exsited\Client\Dto;
use Exsited\Client\ListOf;

/** The ItemInformation body, as measured from the endpoints in MEASURED_FROM. */
final class ItemInformation extends Dto
{
    public const ENVELOPE_KEY = 'item';

    /** The endpoints this view was measured from. */
    public const MEASURED_FROM = [
        'GET /api/{api_version}/items/{item_id}/information',
    ];

    /** @param list<ItemInformationCode|null>|null $codes
     *  @param list<ItemInformationCurrency|null>|null $currencies
     *  @param list<ItemInformationConfigureVariation|null>|null $configureVariations
     *  @param list<ItemInformationUseVariation|null>|null $useVariations */
    public function __construct(
        public readonly mixed $baseUom = null,
        public readonly ?bool $child = null,
        #[ListOf(ItemInformationCode::class)]
        public readonly ?array $codes = null,
        #[ListOf(ItemInformationConfigureVariation::class)]
        public readonly ?array $configureVariations = null,
        public readonly ?ItemInformationCreatedBy $createdBy = null,
        public readonly ?string $createdOn = null,
        #[ListOf(ItemInformationCurrency::class)]
        public readonly ?array $currencies = null,
        public readonly ?array $customAttributes = null,
        public readonly ?ItemInformationCustomForm $customForm = null,
        public readonly ?string $description = null,
        public readonly ?string $displayName = null,
        public readonly mixed $group = null,
        public readonly ?string $href = null,
        public readonly ?string $id = null,
        public readonly mixed $imageUrl = null,
        public readonly ?bool $inventoryEnabled = null,
        public readonly ?string $invoiceNote = null,
        public readonly ?ItemInformationLastUpdatedBy $lastUpdatedBy = null,
        public readonly ?string $lastUpdatedOn = null,
        public readonly ?ItemInformationManager $manager = null,
        public readonly ?string $name = null,
        public readonly ?string $object = null,
        public readonly ?string $origin = null,
        public readonly ?bool $parent = null,
        public readonly ?string $parentItemId = null,
        public readonly ?bool $purchaseEnabled = null,
        public readonly ?bool $saleEnabled = null,
        public readonly ?string $status = null,
        public readonly ?string $type = null,
        public readonly ?array $uoms = null,
        #[ListOf(ItemInformationUseVariation::class)]
        public readonly ?array $useVariations = null,
        public readonly ?bool $variationsEnabled = null,
        public readonly ?int $version = null,
    ) {
    }
}
