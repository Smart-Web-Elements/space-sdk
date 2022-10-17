<?php

namespace Swe\SpaceSDK\Chats\Channels\Subscribers;

use GuzzleHttp\Exception\GuzzleException;
use Swe\SpaceSDK\AbstractApi;
use Swe\SpaceSDK\Exception\MissingArgumentException;

/**
 * Class Teams
 *
 * @package Swe\SpaceSDK\Chats\Channels\Subscribers
 * @author Luca Braun <l.braun@s-w-e.com>
 */
class Teams extends AbstractApi
{
    /**
     * Permissions that may be checked: Channel.AddMembersOrTeams
     *
     * @param string $channel
     * @param array $data
     * @return void
     * @throws GuzzleException
     * @throws MissingArgumentException
     */
    public function addTeamsToChannel(string $channel, array $data): void
    {
        $uri = 'chats/channels/{channel}/subscribers/teams';
        $required = [
            'teams' => self::TYPE_ARRAY,
        ];
        $this->throwIfInvalid($required, $data);
        $uriArguments = [
            'channel' => $channel,
        ];

        $this->client->post($this->buildUrl($uri, $uriArguments), $data);
    }

    /**
     * Permissions that may be checked: Channel.ViewChannelParticipants
     *
     * @param string $channel
     * @param array $request
     * @param array $response
     * @return array
     * @throws GuzzleException
     * @throws MissingArgumentException
     */
    public function listTeamsSubscribedToChannel(string $channel, array $request, array $response = []): array
    {
        $uri = 'chats/channels/{channel}/subscribers/teams';
        $required = [
            'query' => self::TYPE_STRING,
        ];
        $this->throwIfInvalid($required, $request);
        $uriArguments = [
            'channel' => $channel,
        ];

        return $this->client->get($this->buildUrl($uri, $uriArguments), $response, $request);
    }

    /**
     * Permissions that may be checked: Channel.RemoveMembersOfTeams
     *
     * @param string $channel
     * @param array $request
     * @return void
     * @throws GuzzleException
     * @throws MissingArgumentException
     */
    public function removeTeamsFromChannel(string $channel, array $request): void
    {
        $uri = 'chats/channels/{channel}/subscribers/teams';
        $required = [
            'teams' => self::TYPE_ARRAY,
        ];
        $this->throwIfInvalid($required, $request);
        $uriArguments = [
            'channel' => $channel,
        ];

        $this->client->delete($this->buildUrl($uri, $uriArguments), $request);
    }
}