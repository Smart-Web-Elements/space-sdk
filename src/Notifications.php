<?php

namespace Swe\SpaceSDK;

use GuzzleHttp\Exception\GuzzleException;
use Swe\SpaceSDK\Notifications\ChannelSubscriptions;
use Swe\SpaceSDK\Notifications\PersonalCustomSubscriptions;
use Swe\SpaceSDK\Notifications\PersonalSubscriptions;
use Swe\SpaceSDK\Notifications\PrivateFeeds;

/**
 * Class Notifications
 *
 * @package Swe\SpaceSDK
 * @author Luca Braun <l.braun@s-w-e.com>
 */
class Notifications extends AbstractApi
{
    /**
     * List all subscription subjects.
     *
     * @param array $response
     * @return array
     * @throws GuzzleException
     */
    public function getAllNotifications(array $response = []): array
    {
        $uri = 'notifications';

        return $this->client->get($this->buildUrl($uri), $response);
    }

    /**
     * @return ChannelSubscriptions
     */
    public function channelSubscriptions(): ChannelSubscriptions
    {
        return new ChannelSubscriptions($this->client);
    }

    /**
     * @return PersonalCustomSubscriptions
     */
    public function personalCustomSubscriptions(): PersonalCustomSubscriptions
    {
        return new PersonalCustomSubscriptions($this->client);
    }

    /**
     * @return PersonalSubscriptions
     */
    public function personalSubscriptions(): PersonalSubscriptions
    {
        return new PersonalSubscriptions($this->client);
    }

    /**
     * @return PrivateFeeds
     */
    public function privateFeeds(): PrivateFeeds
    {
        return new PrivateFeeds($this->client);
    }
}