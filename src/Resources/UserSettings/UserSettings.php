<?php

declare(strict_types=1);

namespace Exsited\Resources\UserSettings;

use Exsited\Client\ApiResponse;
use Exsited\Client\ExsitedClient;
use Exsited\Resources\UserSettings\UserSettingsDto\UserSettings as UserSettingsView;
use Exsited\Resources\UserSettings\UserSettingsDto\UserSettingsProfileImage;

/** User settings endpoints, under `/api/{api_version}/user_settings`. */
final class UserSettings
{
    /** Read one user's settings - `GET /user_settings/{user_id}`, under `user_settings`; `user_id`
     *  is the `usr_` id, which carries the same hex as the user's `op_` id.
     *  @param array<string,mixed>|null $queryParams */
    public static function getUserSettings(ExsitedClient $client, int|string $userId, ?array $queryParams = null, ?bool $raiseOnError = null, ?string $responseFormat = null): ApiResponse
    {
        return $client->sendGetRequest(UserSettingsUrls::USER_SETTINGS, pathParams: ['user_id' => $userId], queryParams: $queryParams, raiseOnError: $raiseOnError, responseFormat: $responseFormat, dtoType: UserSettingsView::class);
    }

    /** Read a user's profile image - `GET /user_settings/{user_id}/profile_image`; `base64` is the
     *  image without a data URI prefix, and empty when the read has none to serve.
     *  @param array<string,mixed>|null $queryParams */
    public static function getUserSettingsProfileImage(ExsitedClient $client, int|string $userId, ?array $queryParams = null, ?bool $raiseOnError = null, ?string $responseFormat = null): ApiResponse
    {
        return $client->sendGetRequest(UserSettingsUrls::USER_SETTINGS_PROFILE_IMAGE, pathParams: ['user_id' => $userId], queryParams: $queryParams, raiseOnError: $raiseOnError, responseFormat: $responseFormat, dtoType: UserSettingsProfileImage::class);
    }
}
