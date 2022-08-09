<?php

namespace Swe\SpaceSDK\Chats;

use GuzzleHttp\Exception\GuzzleException;
use Swe\SpaceSDK\AbstractApi;
use Swe\SpaceSDK\Exception\MissingArgumentException;

/**
 *
 */
class Channels extends AbstractApi
{
    /**
     * Create a new channel.
     *
     * Permissions that may be checked: Chat.AddChannels
     *
     * @param array $data
     * @param array $response
     * @return array
     * @throws GuzzleException
     * @throws MissingArgumentException
     */
    public function addNewChannel(array $data, array $response = []): array
    {
        $uri = 'chats/channels';
        $required = [
            'private' => 'boolean',
        ];
        $this->throwIfInvalid($required, $data);

        return $this->client->post($this->buildUrl($uri), $data, $response);
    }

    /**
     * Permissions that may be checked: Channel.ViewChannel
     *
     * @param array $data
     * @param array $response
     * @return array
     * @throws GuzzleException
     * @throws MissingArgumentException
     */
    public function getChannel(array $data, array $response = []): array
    {
        $uri = 'chats/channels/{channel}';
        $required = [
            'channel' => 'string',
        ];
        $this->throwIfInvalid($required, $data);
        $uriArguments = [
            'channel' => $data['channel'],
        ];
        $this->removeUrlArgumentsFromData($uriArguments, $data);

        return $this->client->get($this->buildUrl($uri, $uriArguments), $response);
    }

    /**
     * Delete a channel. No one will be able to view this channel or its threads. This action cannot be undone.
     *
     * Permissions that may be checked: Channel.Admin
     *
     * @param array $data
     * @return bool
     * @throws GuzzleException
     * @throws MissingArgumentException
     */
    public function deleteChannel(array $data): bool
    {
        $uri = 'chats/channels/{channel}';
        $required = [
            'channel' => 'string',
        ];
        $this->throwIfInvalid($required, $data);
        $uriArguments = [
            'channel' => $data['channel'],
        ];
        $this->removeUrlArgumentsFromData($uriArguments, $data);

        return $this->client->delete($this->buildUrl($uri, $uriArguments));
    }

    /**
     * Permissions that may be checked: Channel.ViewChannel
     *
     * @param array $request
     * @param array $response
     * @return array
     * @throws GuzzleException
     */
    public function listAllChannels(array $request, array $response = []): array
    {
        $uri = 'chats/channels/all-channels';

        return $this->client->get($this->buildUrl($uri), $response, $request);
    }

    /**
     * Check whether a channel name is available. Returns true when the channel name can be used to create a new channel, false otherwise.
     *
     * @param string $name
     * @return bool
     * @throws GuzzleException
     */
    public function isNameFree(string $name): bool
    {
        $uri = 'chats/channels/is-name-free';
        $data = [
            'name' => $name,
        ];

        return $this->client->post($this->buildUrl($uri), $data)[0];
    }

    /**
     * Restore an archived channel and allow new messages to be added again.
     *
     * Permissions that may be checked: Channel.Admin
     *
     * @param array $data
     * @return bool
     * @throws GuzzleException
     * @throws MissingArgumentException
     */
    public function restoreArchivedChannel(array $data): bool
    {
        $uri = 'chats/channels/{channel}/restore-archived';
        $required = [
            'channel' => 'string',
        ];
        $this->throwIfInvalid($required, $data);
        $uriArguments = [
            'channel' => $data['channel'],
        ];
        $this->removeUrlArgumentsFromData($uriArguments, $data);

        $this->client->post($this->buildUrl($uri, $uriArguments));

        return true;
    }

    /**
     * Archive a channel and reject new messages being added. It is still possible to view messages from an archived channel.
     * It is possible to restore the channel later.
     *
     * Permissions may be checked: Channel.Admin
     *
     * @param array $data
     * @return bool
     * @throws GuzzleException
     * @throws MissingArgumentException
     */
    public function archiveChannel(array $data): bool
    {
        $uri = 'chats/channels/{channel}/archive';
        $required = [
            'channel' => 'string',
        ];
        $this->throwIfInvalid($required, $data);
        $uriArguments = [
            'channel' => $data['channel'],
        ];
        $this->removeUrlArgumentsFromData($uriArguments, $data);

        return $this->client->delete($this->buildUrl($uri, $uriArguments));
    }

    /**
     * Permissions that may be checked: Channel.AddMembersOrTeams
     *
     * @param array $data
     * @return void
     * @throws GuzzleException
     * @throws MissingArgumentException
     */
    public function addUsers(array $data): void
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
}