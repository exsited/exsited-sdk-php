<?php

declare(strict_types=1);

namespace Exsited\Resources\ReturnMerchandiseAuthorisations\ReturnMerchandiseAuthorisationsDto;

use Exsited\Client\Dto;

/** The ReturnMerchandiseAuthorisationsView body for the endpoints in
 *  MEASURED_FROM. */
final class ReturnMerchandiseAuthorisationsView extends Dto
{
    public const ENVELOPE_KEY = 'invoice';

    /** The endpoints this view covers. */
    public const MEASURED_FROM = [
        'POST /api/{api_version}/return_merchandise_authorisations',
    ];

    public function __construct(
        public readonly ?ReturnMerchandiseAuthorisationsViewReturnMerchandiseAuthorisation $returnMerchandiseAuthorisation = null,
    ) {
    }
}
