<?php

namespace Swe\SpaceSDK\Notifications;

use GuzzleHttp\Exception\GuzzleException;
use Swe\SpaceSDK\AbstractApi;
use Swe\SpaceSDK\Exception\MissingArgumentException;
use Swe\SpaceSDK\Type;

/**
 * Class PrivateFeeds
 * Generated at 2022-12-15 11:10
 *
 * @package Swe\SpaceSDK\Notifications
 * @author Luca Braun <l.braun@s-w-e.com>
 */
final class PrivateFeeds extends AbstractApi
{
    /**
     * Create personal feed for member
     *
     * Permissions that may be checked: Profile.NotificationSettings.Edit
     *
     * @param array $data
     * @param array $response
     * @return array
     * @throws GuzzleException
     * @throws MissingArgumentException
     */
    final public function createPrivateFeed(array $data, array $response = []): array
    {
        $uri = 'notifications/private-feeds';
        $required = [
            'profile' => Type::String,
            'name' => Type::String,
            'icon' => Type::String,
            'color' => Type::String,
        ];
        $this->throwIfInvalid($required, $data);

        return $this->client->post($this->buildUrl($uri), $data, [], $response);
    }

    /**
     * List personal feeds for a member
     *
     * Permissions that may be checked: Profile.NotificationSettings.View
     *
     * @param array $request
     * @param array $response
     * @return array
     * @throws GuzzleException
     * @throws MissingArgumentException
     */
    final public function getAllPrivateFeeds(array $request, array $response = []): array
    {
        $uri = 'notifications/private-feeds';
        $required = [
            'profile' => Type::String,
        ];
        $this->throwIfInvalid($required, $request);

        return $this->client->get($this->buildUrl($uri), $request, $response);
    }

    /**
     * Update personal feed for a member
     *
     * Permissions that may be checked: Profile.NotificationSettings.Edit
     *
     * @param string $id
     * @param array $data
     * @param array $response
     * @return array
     * @throws GuzzleException
     */
    final public function updatePrivateFeed(string $id, array $data = [], array $response = []): array
    {
        $uri = 'notifications/private-feeds/{id}';
        $uriArguments = [
            'id' => $id,
        ];

        return $this->client->patch($this->buildUrl($uri, $uriArguments), $data, [], $response);
    }

    /**
     * Delete personal feed for member
     *
     * Permissions that may be checked: Profile.NotificationSettings.Edit
     *
     * @param string $id
     * @return void
     * @throws GuzzleException
     */
    final public function deletePrivateFeed(string $id): void
    {
        $uri = 'notifications/private-feeds/{id}';
        $uriArguments = [
            'id' => $id,
        ];

        $this->client->delete($this->buildUrl($uri, $uriArguments));
    }
}
