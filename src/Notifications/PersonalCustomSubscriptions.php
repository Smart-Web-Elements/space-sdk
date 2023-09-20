<?php

namespace Swe\SpaceSDK\Notifications;

use GuzzleHttp\Exception\GuzzleException;
use Swe\SpaceSDK\AbstractApi;
use Swe\SpaceSDK\Exception\MissingArgumentException;
use Swe\SpaceSDK\Type;

/**
 * Class PersonalCustomSubscriptions
 * Generated at 2023-09-20 02:00
 *
 * @package Swe\SpaceSDK\Notifications
 * @author Luca Braun <l.braun@s-w-e.com>
 */
final class PersonalCustomSubscriptions extends AbstractApi
{
    /**
     * Create personal custom subscription
     *
     * Permissions that may be checked: Profile.NotificationSettings.Edit
     *
     * @param array $data
     * @param array $response
     * @return array
     * @throws GuzzleException
     * @throws MissingArgumentException
     */
    final public function createPersonalCustomSubscription(array $data, array $response = []): array
    {
        $uri = 'notifications/personal-custom-subscriptions';
        $required = [
            'profile' => Type::String,
            'name' => Type::String,
            'feed' => Type::String,
            'subscription' => [
                'subjectCode' => Type::String,
                'filters' => Type::Array,
                'eventTypeCodes' => Type::Array,
            ],
        ];
        $this->throwIfInvalid($required, $data);

        return $this->client->post($this->buildUrl($uri), $data, [], $response);
    }

    /**
     * List personal custom subscriptions
     *
     * Permissions that may be checked: Profile.NotificationSettings.View
     *
     * @param array $request
     * @param array $response
     * @return array
     * @throws GuzzleException
     * @throws MissingArgumentException
     */
    final public function getAllPersonalCustomSubscriptions(array $request, array $response = []): array
    {
        $uri = 'notifications/personal-custom-subscriptions';
        $required = [
            'profile' => Type::String,
        ];
        $this->throwIfInvalid($required, $request);

        return $this->client->get($this->buildUrl($uri), $request, $response);
    }

    /**
     * Create personal custom subscription
     *
     * Permissions that may be checked: Profile.NotificationSettings.Edit
     *
     * @param string $id
     * @param array $data
     * @param array $response
     * @return array
     * @throws GuzzleException
     */
    final public function updatePersonalCustomSubscription(string $id, array $data = [], array $response = []): array
    {
        $uri = 'notifications/personal-custom-subscriptions/{id}';
        $uriArguments = [
            'id' => $id,
        ];

        return $this->client->patch($this->buildUrl($uri, $uriArguments), $data, [], $response);
    }

    /**
     * Delete personal custom subscription
     *
     * Permissions that may be checked: Profile.NotificationSettings.Edit
     *
     * @param string $id
     * @return void
     * @throws GuzzleException
     */
    final public function deletePersonalCustomSubscription(string $id): void
    {
        $uri = 'notifications/personal-custom-subscriptions/{id}';
        $uriArguments = [
            'id' => $id,
        ];

        $this->client->delete($this->buildUrl($uri, $uriArguments));
    }
}
