<?php

declare(strict_types=1);

namespace Exsited\Resources\ReturnVendorAuthorizations;

final class ReturnVendorAuthorizationsUrls
{
    public const RETURN_VENDOR_AUTHORIZATIONS = '/api/{api_version}/return_vendor_authorizations';
    public const RETURN_VENDOR_AUTHORIZATION = '/api/{api_version}/return_vendor_authorizations/{rva_id}';
    public const RETURN_VENDOR_AUTHORIZATION_NOTE = '/api/{api_version}/return_vendor_authorizations/{rva_id}/notes/{note_id}';
    public const RETURN_VENDOR_AUTHORIZATION_NOTE_FILE = '/api/{api_version}/return_vendor_authorizations/{rva_id}/notes/{note_id}/files/{file_id}';

    /** The key the `RETURN_VENDOR_AUTHORIZATIONS` listing's records sit under. */
    public const RETURN_VENDOR_AUTHORIZATIONS_KEY = 'data';

    /** The key the `RETURN_VENDOR_AUTHORIZATION` listing's records sit under. */
    public const RETURN_VENDOR_AUTHORIZATION_KEY = 'return_vendor_authorization';
}
