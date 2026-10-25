<?php

declare(strict_types=1);

namespace Exsited\Sdk\Resources\CustomComponents\CustomComponentsDto;

use Exsited\Sdk\Client\Dto;
use Exsited\Sdk\Client\ListOf;
use Exsited\Sdk\Client\WireName;

/** One entry of the `firstColumnAttribute` list of ComponentCustomFormData. */
final class ComponentCustomFormDataFirstColumnAttribute extends Dto
{
    /** @param list<ComponentCustomFormDataFirstColumnAttributeOption|null>|null $options */
    public function __construct(
        #[WireName('canEncrypt')]
        public readonly ?bool $canEncrypt = null,
        public readonly ?string $description = null,
        #[WireName('displayName')]
        public readonly ?string $displayName = null,
        public readonly ?bool $enabled = null,
        #[WireName('encryptData')]
        public readonly ?bool $encryptData = null,
        public readonly mixed $entity = null,
        #[WireName('fieldRequired')]
        public readonly ?bool $fieldRequired = null,
        #[WireName('formMaxLengthInputed')]
        public readonly ?bool $formMaxLengthInputed = null,
        #[WireName('formMinLengthInputed')]
        public readonly ?bool $formMinLengthInputed = null,
        public readonly ?int $id = null,
        public readonly ?int $ids = null,
        #[WireName('isRequired')]
        public readonly ?bool $isRequired = null,
        #[WireName('isUnique')]
        public readonly ?bool $isUnique = null,
        #[WireName('maxLength')]
        public readonly mixed $maxLength = null,
        #[WireName('metaData')]
        public readonly ?string $metaData = null,
        #[WireName('minLength')]
        public readonly mixed $minLength = null,
        public readonly ?string $name = null,
        #[ListOf(ComponentCustomFormDataFirstColumnAttributeOption::class)]
        public readonly ?array $options = null,
        public readonly ?string $position = null,
        #[WireName('showInListView')]
        public readonly ?bool $showInListView = null,
        #[WireName('timeFormat')]
        public readonly mixed $timeFormat = null,
        public readonly ?string $type = null,
        #[WireName('typeValue')]
        public readonly ?string $typeValue = null,
        #[WireName('validationMessage')]
        public readonly ?string $validationMessage = null,
        #[WireName('validationMessageRequired')]
        public readonly ?bool $validationMessageRequired = null,
        public readonly ?string $value = null,
    ) {
    }
}
