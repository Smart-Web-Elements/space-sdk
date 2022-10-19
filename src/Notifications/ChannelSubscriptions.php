<?php

namespace Swe\SpaceSDK\Notifications;

use GuzzleHttp\Exception\GuzzleException;
use Swe\SpaceSDK\AbstractApi;
use Swe\SpaceSDK\Exception\MissingArgumentException;

/**
 * Class ChannelSubscriptions
 *
 * @package Swe\SpaceSDK\Notifications
 * @author Luca Braun <l.braun@s-w-e.com>
 */
class ChannelSubscriptions extends AbstractApi
{
    /**
     * Add subscription for a channel.
     *
     * Permissions that may be checked: Channel.UpdateChannelSubscriptions
     *
     * @param array $data
     * @param array $response
     * @return array
     * @throws GuzzleException
     * @throws MissingArgumentException
     */
    public function createChannelSubscription(array $data, array $response = []): array
    {
        $uri = 'notifications/channel-subscriptions';
        $required = [
            'channel' => self::TYPE_STRING,
            'name' => self::TYPE_STRING,
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
     * Ensures that all permissions required for this subscription are requested in the corresponding permission role.
     *
     * Permissions that may be checked: Channel.UpdateChannelSubscriptions
     *
     * @param string $id
     * @return void
     * @throws GuzzleException
     */
    public function requestMissingRights(string $id): void
    {
        $uri = 'notifications/channel-subscriptions/{id}/request-missing-rights';
        $uriArguments = [
            'id' => $id,
        ];

        $this->client->post($this->buildUrl($uri, $uriArguments));
    }

    /**
     * List subscriptions for a channel.
     *
     * Permissions that may be checked: Channel.ViewChannel
     *
     * @param array $request
     * @param array $response
     * @return array
     * @throws GuzzleException
     * @throws MissingArgumentException
     */
    public function getAllChannelSubscriptions(array $request, array $response = []): array
    {
        $uri = 'notifications/channel-subscriptions';
        $required = [
            'channel' => self::TYPE_STRING,
        ];
        $this->throwIfInvalid($required, $request);

        return $this->client->get($this->buildUrl($uri), $response, $request);
    }

    /**
     * Update subscription for a channel.
     *
     * Permissions that may be checked: Channel.UpdateChannelSubscriptions
     *
     * @param string $id
     * @param array $data
     * @param array $response
     * @return array
     * @throws GuzzleException
     */
    public function updateChannelSubscription(string $id, array $data = [], array $response = []): array
    {
        $uri = 'notifications/channel-subscriptions/{id}';
        $uriArguments = [
            'id' => $id,
        ];

        return $this->client->post($this->buildUrl($uri, $uriArguments), $data, $response);
    }

    /**
     * Delete channel subscription.
     *
     * Permissions that may be checked: Channel.UpdateChannelSubscriptions
     *
     * @param string $id
     * @return void
     * @throws GuzzleException
     */
    public function deleteChannelSubscription(string $id): void
    {
        $uri = 'notifications/channel-subscriptions/{id}';
        $uriArguments = [
            'id' => $id,
        ];

        $this->client->delete($this->buildUrl($uri, $uriArguments));
    }
}