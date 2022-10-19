<?php

namespace Swe\SpaceSDK\Notifications;

use GuzzleHttp\Exception\GuzzleException;
use Swe\SpaceSDK\AbstractApi;
use Swe\SpaceSDK\Exception\MissingArgumentException;

/**
 * Class PrivateFeeds
 *
 * @package Swe\SpaceSDK\Notifications
 * @author Luca Braun <l.braun@s-w-e.com>
 */
class PrivateFeeds extends AbstractApi
{
    /**
     * Create personal feed for member.
     *
     * Permissions that may be checked: Profile.NotificationSettings.Edit
     *
     * @param array $data
     * @param array $response
     * @return array
     * @throws GuzzleException
     * @throws MissingArgumentException
     */
    public function createPrivateFeed(array $data, array $response = []): array
    {
        $uri = 'notifications/private-feeds';
        $required = [
            'profile' => self::TYPE_STRING,
            'name' => self::TYPE_STRING,
            'icon' => self::TYPE_STRING,
            'color' => self::TYPE_STRING,
        ];
        $this->throwIfInvalid($required, $data);

        return $this->client->post($this->buildUrl($uri), $data, $response);
    }

    /**
     * List personal feeds for a member.
     *
     * Permissions that may be checked: Profile.NotificationSettings.View
     *
     * @param array $request
     * @param array $response
     * @return array
     * @throws GuzzleException
     * @throws MissingArgumentException
     */
    public function getAllPrivateFeeds(array $request, array $response = []): array
    {
        $uri = 'notifications/private-feeds';
        $required = [
            'profile' => self::TYPE_STRING,
        ];
        $this->throwIfInvalid($required, $request);

        return $this->client->get($this->buildUrl($uri), $response, $request);
    }

    /**
     * Update personal feed for a member.
     *
     * Permissions that may be checked: Profile.NotificationSettings.Edit
     *
     * @param string $id
     * @param array $data
     * @param array $response
     * @return array
     * @throws GuzzleException
     */
    public function updatePrivateFeed(string $id, array $data = [], array $response = []): array
    {
        $uri = 'notifications/private-feeds/{id}';
        $uriArguments = [
            'id' => $id,
        ];

        return $this->client->patch($this->buildUrl($uri, $uriArguments), $data, $response);
    }

    /**
     * Delete personal feed for member.
     *
     * Permissions that may be checked: Profile.NotificationSettings.Edit
     *
     * @param string $id
     * @return void
     * @throws GuzzleException
     */
    public function deletePrivateFeed(string $id): void
    {
        $uri = 'notifications/private-feeds/{id}';
        $uriArguments = [
            'id' => $id,
        ];

        $this->client->delete($this->buildUrl($uri, $uriArguments));
    }
}