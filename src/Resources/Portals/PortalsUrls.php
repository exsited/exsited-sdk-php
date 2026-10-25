<?php

declare(strict_types=1);

namespace Exsited\Sdk\Resources\Portals;

final class PortalsUrls
{
    public const PORTAL_ACTIVATE = '/api/{api_version}/portal/activate';
    public const PORTAL_CHANGE_PASSWORD = '/api/{api_version}/portal/change_password';
    public const PORTAL_LOGIN = '/api/{api_version}/portal/login';
    public const PORTAL_RESET = '/api/{api_version}/portal/reset';
    public const PORTAL_RESET_LINK = '/api/{api_version}/portal/reset_link';
    public const PORTAL_VALIDATE = '/api/{api_version}/portal/validate';
    public const PORTAL_CHANGE = '/api/{api_version}/portal/change';

    /** The envelope one `portal` record arrives under. */
    public const PORTAL_KEY = 'portal';
}
