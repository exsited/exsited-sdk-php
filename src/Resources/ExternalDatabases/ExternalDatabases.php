<?php

declare(strict_types=1);

namespace Exsited\Resources\ExternalDatabases;

use Exsited\Client\ApiResponse;
use Exsited\Client\Dto;
use Exsited\Client\ExsitedClient;
use Exsited\Errors\SdkUsageError;
use Exsited\Resources\ExternalDatabases\ExternalDatabasesDto\ExternalDatabaseInsertRecord;
use Exsited\Resources\ExternalDatabases\ExternalDatabasesDto\ExternalDatabaseSearch;
use Exsited\Resources\ExternalDatabases\ExternalDatabasesDto\ExternalDatabaseUpdateRecordsUpdated;
use Exsited\Resources\ExternalDatabases\ExternalDatabasesDto\ExternalDatabasesView;

/** External database endpoints, under `/api/{api_version}/external_databases`. */
final class ExternalDatabases
{
    /** List databases - `GET /external_databases`.
     *  @param array<string,mixed>|null $queryParams */
    public static function getExternalDatabases(ExsitedClient $client, ?array $queryParams = null, ?bool $raiseOnError = null, ?string $responseFormat = null): ApiResponse
    {
        return $client->sendGetRequest(ExternalDatabasesUrls::EXTERNAL_DATABASES, queryParams: $queryParams, raiseOnError: $raiseOnError, responseFormat: $responseFormat, dtoType: ExternalDatabasesView::class);
    }

    /** Create a database and its tables - `POST /external_databases`.
     *  @param array<string,mixed>|string|Dto $payload */
    public static function createExternalDatabase(ExsitedClient $client, array|string|Dto $payload, ?bool $raiseOnError = null, ?string $responseFormat = null): ApiResponse
    {
        self::requirePayload($payload);
        return $client->sendPostRequest(ExternalDatabasesUrls::EXTERNAL_DATABASES, jsonBody: $payload, raiseOnError: $raiseOnError, responseFormat: $responseFormat, dtoType: ExternalDatabasesView::class);
    }

    /** Get single database - `GET /external_databases/{db_name}`.
     *  @param array<string,mixed>|null $queryParams */
    public static function getExternalDatabase(ExsitedClient $client, int|string $dbName, ?array $queryParams = null, ?bool $raiseOnError = null, ?string $responseFormat = null): ApiResponse
    {
        return $client->sendGetRequest(ExternalDatabasesUrls::EXTERNAL_DATABASE, pathParams: ['db_name' => $dbName], queryParams: $queryParams, raiseOnError: $raiseOnError, responseFormat: $responseFormat, dtoType: ExternalDatabasesView::class);
    }

    /** Insert records - `POST /external_databases/{db_name}/insert_records`.
     *  @param array<string,mixed>|string|Dto $payload */
    public static function createExternalDatabaseInsertRecord(ExsitedClient $client, int|string $dbName, array|string|Dto $payload, ?bool $raiseOnError = null, ?string $responseFormat = null): ApiResponse
    {
        self::requirePayload($payload);
        return $client->sendPostRequest(ExternalDatabasesUrls::EXTERNAL_DATABASE_INSERT_RECORDS, pathParams: ['db_name' => $dbName], jsonBody: $payload, raiseOnError: $raiseOnError, responseFormat: $responseFormat, dtoType: ExternalDatabaseInsertRecord::class);
    }

    /** Search records - `POST /external_databases/{db_name}/search`.
     *  @param array<string,mixed>|string|Dto $payload */
    public static function createExternalDatabaseSearch(ExsitedClient $client, int|string $dbName, array|string|Dto $payload, ?bool $raiseOnError = null, ?string $responseFormat = null): ApiResponse
    {
        self::requirePayload($payload);
        return $client->sendPostRequest(ExternalDatabasesUrls::EXTERNAL_DATABASE_SEARCH, pathParams: ['db_name' => $dbName], jsonBody: $payload, raiseOnError: $raiseOnError, responseFormat: $responseFormat, dtoType: ExternalDatabaseSearch::class);
    }

    /** Update records - `PATCH /external_databases/{db_name}/update_records`.
     *  @param array<string,mixed>|string|Dto $payload */
    public static function updateExternalDatabaseUpdateRecords(ExsitedClient $client, int|string $dbName, array|string|Dto $payload, ?bool $raiseOnError = null, ?string $responseFormat = null): ApiResponse
    {
        self::requirePayload($payload);
        return $client->sendPatchRequest(ExternalDatabasesUrls::EXTERNAL_DATABASE_UPDATE_RECORDS, pathParams: ['db_name' => $dbName], jsonBody: $payload, raiseOnError: $raiseOnError, responseFormat: $responseFormat, dtoType: ExternalDatabaseUpdateRecordsUpdated::class);
    }

    /** Get table columns - `GET /external_databases/{db_name}/tables/{table_name}`.
     *  @param array<string,mixed>|null $queryParams */
    public static function getExternalDatabaseTable(ExsitedClient $client, int|string $dbName, int|string $tableName, ?array $queryParams = null, ?bool $raiseOnError = null, ?string $responseFormat = null): ApiResponse
    {
        return $client->sendGetRequest(ExternalDatabasesUrls::EXTERNAL_DATABASE_TABLE, pathParams: ['db_name' => $dbName, 'table_name' => $tableName], queryParams: $queryParams, raiseOnError: $raiseOnError, responseFormat: $responseFormat, dtoType: ExternalDatabasesView::class);
    }

    private static function requirePayload(array|string|Dto $payload): void
    {
        if ($payload === [] || (is_string($payload) && trim($payload) === '')) {
            throw new SdkUsageError(
                'payload is required: this endpoint takes a body, and an empty one '
                . 'sends the request with nothing in it'
            );
        }
    }
}
