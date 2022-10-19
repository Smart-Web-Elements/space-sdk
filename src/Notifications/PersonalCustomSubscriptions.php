<?php

namespace Swe\SpaceSDK\Notifications;

use GuzzleHttp\Exception\GuzzleException;
use Swe\SpaceSDK\AbstractApi;
use Swe\SpaceSDK\Exception\MissingArgumentException;

/**
 * Class PersonalCustomSubscriptions
 *
 * @package Swe\SpaceSDK\Notifications
 * @author Luca Braun <l.braun@s-w-e.com>
 */
class PersonalCustomSubscriptions extends AbstractApi
{
    /**
     * Create personal custom subscription.
     *
     * Permissions that may be checked: Profile.NotificationSettings.Edit
     *
     * @param array $data
     * @param array $response
     * @return array
     * @throws GuzzleException
     * @throws MissingArgumentException
     */
    public function createPersonalCustomSubscription(array $data, array $response = []): array
    {
        $uri = 'notifications/personal-custom-subscriptions';
        $required = [
            'profile' => self::TYPE_STRING,
            'name' => self::TYPE_STRING,
            'feed' => self::TYPE_STRING,
            'subscription' => [
                'subjectCode' => self::TYPE_STRING,
                'filters' => self::TYPE_ARRAY,
                'eventTypeCodes' => self::TYPE_ARRAY,
            ],
        ];
        $this->throwIfInvalid($required, $data);

        return $this->client->post($this->buildUrl($uri), $data, $response);
    }

    /**
     * List personal custom subscriptions.
     *
     * Permissions that may be checked: Profile.NotificationSettings.View
     *
     * @param array $request
     * @param array $response
     * @return array
     * @throws GuzzleException
     * @throws MissingArgumentException
     */
    public function getAllPersonalCustomSubscriptions(array $request, array $response = []): array
    {
        $uri = 'notifications/personal-custom-subscriptions';
        $required = [
            'profile' => self::TYPE_STRING,
        ];
        $this->throwIfInvalid($required, $request);

        return $this->client->get($this->buildUrl($uri), $response, $request);
    }

    /**
     * Create personal custom subscription.
     *
     * Permissions that may be checked: Profile.NotificationSettings.Edit
     *
     * @param string $id
     * @param array $data
     * @param array $response
     * @return array
     * @throws GuzzleException
     */
    public function updatePersonalCustomSubscription(string $id, array $data = [], array $response = []): array
    {
        $uri = 'notifications/personal-custom-subscriptions/{id}';
        $uriArguments = [
            'id' => $id,
        ];

        return $this->client->patch($this->buildUrl($uri, $uriArguments), $data, $response);
    }

    /**
     * Delete personal custom subscription.
     *
     * Permissions that may be checked: Profile.NotificationSettings.Edit
     *
     * @param string $id
     * @return void
     * @throws GuzzleException
     */
    public function deletePersonalCustomSubscription(string $id): void
    {
        $uri = 'notifications/personal-custom-subscriptions/{id}';
        $uriArguments = [
            'id' => $id,
        ];

        $this->client->delete($this->buildUrl($uri, $uriArguments));
    }
}