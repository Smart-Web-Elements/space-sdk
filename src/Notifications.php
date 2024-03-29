<?php

namespace Swe\SpaceSDK;

use GuzzleHttp\Exception\GuzzleException;
use Swe\SpaceSDK\Notifications\ChannelSubscriptions;
use Swe\SpaceSDK\Notifications\PersonalCustomSubscriptions;
use Swe\SpaceSDK\Notifications\PersonalSubscriptions;
use Swe\SpaceSDK\Notifications\PrivateFeeds;
use Swe\SpaceSDK\Notifications\Slack;

/**
 * Class Notifications
 * Generated at 2024-03-16 02:07
 *
 * @package Swe\SpaceSDK
 * @author Luca Braun <l.braun@s-w-e.com>
 */
final class Notifications extends AbstractApi
{
    /**
     * List all subscription subjects
     *
     * @param array $request
     * @param array $response
     * @return array
     * @throws GuzzleException
     */
    final public function getAllNotifications(array $request = [], array $response = []): array
    {
        $uri = 'notifications';

        return $this->client->get($this->buildUrl($uri), $request, $response);
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

    /**
     * @return Slack
     */
    final public function slack(): Slack
    {
        return new Slack($this->client);
    }
}
