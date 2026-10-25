<?php

declare(strict_types=1);

namespace Exsited\Resources\ExternalDatabases;

final class ExternalDatabasesUrls
{
    public const EXTERNAL_DATABASES = '/api/{api_version}/external_databases';
    public const EXTERNAL_DATABASE = '/api/{api_version}/external_databases/{db_name}';
    public const EXTERNAL_DATABASE_INSERT_RECORDS = '/api/{api_version}/external_databases/{db_name}/insert_records';
    public const EXTERNAL_DATABASE_SEARCH = '/api/{api_version}/external_databases/{db_name}/search';
    public const EXTERNAL_DATABASE_UPDATE_RECORDS = '/api/{api_version}/external_databases/{db_name}/update_records';
    public const EXTERNAL_DATABASE_TABLE = '/api/{api_version}/external_databases/{db_name}/tables/{table_name}';

    /** The key the `EXTERNAL_DATABASES` listing's records sit under. */
    public const EXTERNAL_DATABASES_KEY = 'data';

    /** The key the `EXTERNAL_DATABASE` listing's records sit under. */
    public const EXTERNAL_DATABASE_KEY = 'data';
}
