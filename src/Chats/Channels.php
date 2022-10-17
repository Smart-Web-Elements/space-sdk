<?php

namespace Swe\SpaceSDK\Chats;

use GuzzleHttp\Exception\GuzzleException;
use Swe\SpaceSDK\AbstractApi;
use Swe\SpaceSDK\Chats\Channels\Administrator;
use Swe\SpaceSDK\Chats\Channels\Attachments;
use Swe\SpaceSDK\Chats\Channels\Conversations;
use Swe\SpaceSDK\Chats\Channels\Icon;
use Swe\SpaceSDK\Chats\Channels\Name;
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
            'name' => self::TYPE_STRING,
            'description' => self::TYPE_STRING,
            'private' => self::TYPE_BOOLEAN,
        ];
        $this->throwIfInvalid($required, $data);

        return $this->client->post($this->buildUrl($uri), $data, $response);
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
     * @param string $channel
     * @return bool
     * @throws GuzzleException
     */
    public function restoreArchivedChannel(string $channel): bool
    {
        $uri = 'chats/channels/{channel}/restore-archived';
        $uriArguments = [
            'channel' => $channel,
        ];

        $this->client->post($this->buildUrl($uri, $uriArguments));

        return true;
    }

    /**
     * Permissions that may be checked: Channel.ViewChannel
     *
     * @param array $request
     * @param array $response
     * @return array
     * @throws GuzzleException
     * @throws MissingArgumentException
     */
    public function listAllChannels(array $request, array $response = []): array
    {
        $uri = 'chats/channels/all-channels';
        $required = [
            'query' => self::TYPE_STRING,
        ];
        $this->throwIfInvalid($required, $request);

        return $this->client->get($this->buildUrl($uri), $response, $request);
    }

    /**
     * Permissions that may be checked: Channel.ViewChannel
     *
     * @param string $channel
     * @param array $response
     * @return array
     * @throws GuzzleException
     */
    public function getChannel(string $channel, array $response = []): array
    {
        $uri = 'chats/channels/{channel}';
        $uriArguments = [
            'channel' => $channel,
        ];

        return $this->client->get($this->buildUrl($uri, $uriArguments), $response);
    }

    /**
     * Delete a channel. No one will be able to view this channel or its threads. This action cannot be undone.
     *
     * Permissions that may be checked: Channel.Admin
     *
     * @param string $channel
     * @return bool
     * @throws GuzzleException
     */
    public function deleteChannel(string $channel): bool
    {
        $uri = 'chats/channels/{channel}';
        $uriArguments = [
            'channel' => $channel,
        ];

        return $this->client->delete($this->buildUrl($uri, $uriArguments));
    }

    /**
     * Archive a channel and reject new messages being added. It is still possible to view messages from an archived channel.
     * It is possible to restore the channel later.
     *
     * Permissions may be checked: Channel.Admin
     *
     * @param string $channel
     * @return bool
     * @throws GuzzleException
     */
    public function archiveChannel(string $channel): bool
    {
        $uri = 'chats/channels/{channel}/archive';
        $uriArguments = [
            'channel' => $channel,
        ];

        return $this->client->delete($this->buildUrl($uri, $uriArguments));
    }

    /**
     * @return Administrator
     */
    public function administrator(): Administrator
    {
        return new Administrator($this->client);
    }

    /**
     * @return Name
     */
    public function name(): Name
    {
        return new Name($this->client);
    }

    /**
     * @return Icon
     */
    public function icon(): Icon
    {
        return new Icon($this->client);
    }

    /**
     * @return Conversations
     */
    public function conversations(): Conversations
    {
        return new Conversations($this->client);
    }

    /**
     * @return Attachments
     */
    public function attachments(): Attachments
    {
        return new Attachments($this->client);
    }
}