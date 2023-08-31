<?php

namespace Swe\SpaceSDK\Chats\Channels\Subscribers;

use GuzzleHttp\Exception\GuzzleException;
use Swe\SpaceSDK\AbstractApi;
use Swe\SpaceSDK\Exception\MissingArgumentException;
use Swe\SpaceSDK\Type;

/**
 * Class Users
 * Generated at 2023-08-31 02:00
 *
 * @package Swe\SpaceSDK\Chats\Channels\Subscribers
 * @author Luca Braun <l.braun@s-w-e.com>
 */
final class Users extends AbstractApi
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
    final public function addUsersToChannel(string $channel, array $data): void
    {
        $uri = 'chats/channels/{channel}/subscribers/users';
        $required = [
            'profiles' => Type::Array,
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
    final public function listUsersSubscribedToChannel(string $channel, array $request, array $response = []): array
    {
        $uri = 'chats/channels/{channel}/subscribers/users';
        $required = [
            'query' => Type::String,
        ];
        $this->throwIfInvalid($required, $request);
        $uriArguments = [
            'channel' => $channel,
        ];

        return $this->client->get($this->buildUrl($uri, $uriArguments), $request, $response);
    }

    /**
     * Permissions that may be checked: Channel.RemoveMembersOrTeams
     *
     * @param string $channel
     * @param array $request
     * @return void
     * @throws GuzzleException
     * @throws MissingArgumentException
     */
    final public function removeUsersFromChannel(string $channel, array $request): void
    {
        $uri = 'chats/channels/{channel}/subscribers/users';
        $required = [
            'profiles' => Type::Array,
        ];
        $this->throwIfInvalid($required, $request);
        $uriArguments = [
            'channel' => $channel,
        ];

        $this->client->delete($this->buildUrl($uri, $uriArguments), $request);
    }
}
