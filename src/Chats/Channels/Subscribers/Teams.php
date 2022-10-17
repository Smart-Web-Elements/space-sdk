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
     * @param array $data
     * @return void
     * @throws GuzzleException
     * @throws MissingArgumentException
     */
    public function addTeamsToChannel(array $data): void
    {
        $uri = 'chats/channels/{channel}/subscribers/teams';
        $required = [
            'channel' => self::TYPE_STRING,
            'teams' => self::TYPE_ARRAY,
        ];
        $this->throwIfInvalid($required, $data);
        $uriArguments = [
            'channel' => $data['channel'],
        ];
        $this->removeUrlArgumentsFromData($uriArguments, $data);

        $this->client->post($this->buildUrl($uri, $uriArguments), $data);
    }

    /**
     * Permissions that may be checked: Channel.ViewChannelParticipants
     *
     * @param array $data
     * @param array $response
     * @return array
     * @throws GuzzleException
     * @throws MissingArgumentException
     */
    public function listTeamsSubscribedToChannel(array $data, array $response): array
    {
        $uri = 'chats/channels/{channel}/subscribers/teams';
        $required = [
            'channel' => self::TYPE_STRING,
            'query' => self::TYPE_STRING,
        ];
        $this->throwIfInvalid($required, $data);
        $uriArguments = [
            'channel' => $data['channel'],
        ];
        $this->removeUrlArgumentsFromData($uriArguments, $data);

        return $this->client->get($this->buildUrl($uri, $uriArguments), $data, $response);
    }

    /**
     * Permissions that may be checked: Channel.RemoveMembersOfTeams
     *
     * @param array $data
     * @return void
     * @throws GuzzleException
     * @throws MissingArgumentException
     */
    public function removeTeamsFromChannel(array $data): void
    {
        $uri = 'chats/channels/{channel}/subscribers/teams';
        $required = [
            'channel' => self::TYPE_STRING,
            'teams' => self::TYPE_ARRAY,
        ];
        $this->throwIfInvalid($required, $data);
        $uriArguments = [
            'channel' => $data['channel'],
        ];
        $this->removeUrlArgumentsFromData($uriArguments, $data);

        $this->client->delete($this->buildUrl($uri, $uriArguments), $data);
    }
}