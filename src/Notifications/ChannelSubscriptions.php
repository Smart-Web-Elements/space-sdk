<?php

namespace Swe\SpaceSDK\Notifications;

use GuzzleHttp\Exception\GuzzleException;
use Swe\SpaceSDK\AbstractApi;
use Swe\SpaceSDK\Exception\MissingArgumentException;
use Swe\SpaceSDK\Type;

/**
 * Class ChannelSubscriptions
 * Generated at 2023-09-20 02:00
 *
 * @package Swe\SpaceSDK\Notifications
 * @author Luca Braun <l.braun@s-w-e.com>
 */
final class ChannelSubscriptions extends AbstractApi
{
    /**
     * Add subscription for a channel
     *
     * Permissions that may be checked: Channel.UpdateChannelSubscriptions
     *
     * @param array $data
     * @param array $response
     * @return array
     * @throws GuzzleException
     * @throws MissingArgumentException
     */
    final public function createChannelSubscription(array $data, array $response = []): array
    {
        $uri = 'notifications/channel-subscriptions';
        $required = [
            'channel' => Type::String,
            'name' => Type::String,
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
     * Ensures that all permissions required for this subscription are requested in the corresponding permission role
     *
     * Permissions that may be checked: Channel.UpdateChannelSubscriptions
     *
     * @param string $id
     * @return void
     * @throws GuzzleException
     */
    final public function requestMissingRights(string $id): void
    {
        $uri = 'notifications/channel-subscriptions/{id}/request-missing-rights';
        $uriArguments = [
            'id' => $id,
        ];

        $this->client->post($this->buildUrl($uri, $uriArguments));
    }

    /**
     * List subscriptions for a channel
     *
     * Permissions that may be checked: Channel.ViewChannel
     *
     * @param array $request
     * @param array $response
     * @return array
     * @throws GuzzleException
     * @throws MissingArgumentException
     */
    final public function getAllChannelSubscriptions(array $request, array $response = []): array
    {
        $uri = 'notifications/channel-subscriptions';
        $required = [
            'channel' => Type::String,
        ];
        $this->throwIfInvalid($required, $request);

        return $this->client->get($this->buildUrl($uri), $request, $response);
    }

    /**
     * Update subscription for a channel
     *
     * Permissions that may be checked: Channel.UpdateChannelSubscriptions
     *
     * @param string $id
     * @param array $data
     * @param array $response
     * @return array
     * @throws GuzzleException
     */
    final public function updateChannelSubscription(string $id, array $data = [], array $response = []): array
    {
        $uri = 'notifications/channel-subscriptions/{id}';
        $uriArguments = [
            'id' => $id,
        ];

        return $this->client->patch($this->buildUrl($uri, $uriArguments), $data, [], $response);
    }

    /**
     * Delete channel subscription
     *
     * Permissions that may be checked: Channel.UpdateChannelSubscriptions
     *
     * @param string $id
     * @return void
     * @throws GuzzleException
     */
    final public function deleteChannelSubscription(string $id): void
    {
        $uri = 'notifications/channel-subscriptions/{id}';
        $uriArguments = [
            'id' => $id,
        ];

        $this->client->delete($this->buildUrl($uri, $uriArguments));
    }
}
