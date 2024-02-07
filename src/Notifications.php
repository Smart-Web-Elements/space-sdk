<?php

namespace Swe\SpaceSDK;

use GuzzleHttp\Exception\GuzzleException;
use Swe\SpaceSDK\Notifications\ChannelSubscriptions;
use Swe\SpaceSDK\Notifications\PersonalCustomSubscriptions;
use Swe\SpaceSDK\Notifications\PersonalSubscriptions;
use Swe\SpaceSDK\Notifications\PrivateFeeds;

/**
 * Class Notifications
 * Generated at 2024-02-07 02:00
 *
 * @package Swe\SpaceSDK
 * @author Luca Braun <l.braun@s-w-e.com>
 */
final class Notifications extends AbstractApi
{
    /**
     * List all subscription subjects
     *
     * @param array $response
     * @return array
     * @throws GuzzleException
     */
    final public function getAllNotifications(array $response = []): array
    {
        $uri = 'notifications';

        return $this->client->get($this->buildUrl($uri), [], $response);
    }

    /**
     * @return ChannelSubscriptions
     */
    final public function channelSubscriptions(): ChannelSubscriptions
    {
        return new ChannelSubscriptions($this->client);
    }

    /**
     * @return PersonalCustomSubscriptions
     */
    final public function personalCustomSubscriptions(): PersonalCustomSubscriptions
    {
        return new PersonalCustomSubscriptions($this->client);
    }

    /**
     * @return PersonalSubscriptions
     */
    final public function personalSubscriptions(): PersonalSubscriptions
    {
        return new PersonalSubscriptions($this->client);
    }

    /**
     * @return PrivateFeeds
     */
    final public function privateFeeds(): PrivateFeeds
    {
        return new PrivateFeeds($this->client);
    }
}
