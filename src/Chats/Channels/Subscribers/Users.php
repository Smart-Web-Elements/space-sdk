<?php

namespace Swe\SpaceSDK\Chats\Channels\Subscribers;

use GuzzleHttp\Exception\GuzzleException;
use Swe\SpaceSDK\AbstractApi;
use Swe\SpaceSDK\Exception\MissingArgumentException;

/**
 * Class Users
 *
 * @package Swe\SpaceSDK\Chats\Channels\Subscribers
 * @author Luca Braun <l.braun@s-w-e.com>
 */
class Users extends AbstractApi
{
    /**
     * Permissions that may be checked: Channel.AddMembersOrTeams
     *
     * @param array $data
     * @return void
     * @throws GuzzleException
     * @throws MissingArgumentException
     */
    public function addUsersToChannel(array $data): void
    {
        $uri = 'chats/channels/{channel}/subscribers/users';
        $required = [
            'channel' => 'string',
            'profiles' => 'array',
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
    public function listUsersSubscribedToChannel(array $data, array $response): array
    {
        $uri = 'chats/channels/{channel}/subscribers/users';
        $required = [
            'channel' => 'string',
            'query' => 'string',
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
    public function removeUsersFromChannel(array $data): void
    {
        $uri = 'chats/channels/{channel}/subscribers/users';
        $required = [
            'channel' => 'string',
            'profiles' => 'array',
        ];
        $this->throwIfInvalid($required, $data);
        $uriArguments = [
            'channel' => $data['channel'],
        ];
        $this->removeUrlArgumentsFromData($uriArguments, $data);

        $this->client->delete($this->buildUrl($uri, $uriArguments), $data);
    }
}