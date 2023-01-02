<?php

namespace Swe\SpaceSDK\Chats;

use GuzzleHttp\Exception\GuzzleException;
use Swe\SpaceSDK\AbstractApi;
use Swe\SpaceSDK\Chats\Channels\Administrator;
use Swe\SpaceSDK\Chats\Channels\Attachments;
use Swe\SpaceSDK\Chats\Channels\Conversations;
use Swe\SpaceSDK\Chats\Channels\Description;
use Swe\SpaceSDK\Chats\Channels\Icon;
use Swe\SpaceSDK\Chats\Channels\Name;
use Swe\SpaceSDK\Chats\Channels\Subscribers;
use Swe\SpaceSDK\Exception\MissingArgumentException;
use Swe\SpaceSDK\Type;

/**
 * Class Channels
 * Generated at 2023-01-02 09:05
 *
 * @package Swe\SpaceSDK\Chats
 * @author Luca Braun <l.braun@s-w-e.com>
 */
final class Channels extends AbstractApi
{
    /**
     * Permissions that may be checked: Chat.AddChannels
     *
     * @param array $data
     * @param array $response
     * @return array
     * @throws GuzzleException
     * @throws MissingArgumentException
     */
    final public function addNewChannel(array $data, array $response = []): array
    {
        $uri = 'chats/channels';
        $required = [
            'name' => Type::String,
            'description' => Type::String,
            'private' => Type::Boolean,
        ];
        $this->throwIfInvalid($required, $data);

        return $this->client->post($this->buildUrl($uri), $data, [], $response);
    }

    /**
     * Create or get a direct messages channel with a profile
     *
     * @param array $data
     * @param array $response
     * @return array
     * @throws GuzzleException
     * @throws MissingArgumentException
     * @deprecated This method is deprecated since 2021-12-13. Use POST chats/channels/{channel}
     */
    final public function getOrCreateDirectMessagesChannel(array $data, array $response = []): array
    {
        $uri = 'chats/channels/dm';
        $required = [
            'profile' => Type::String,
        ];
        $this->throwIfInvalid($required, $data);

        return $this->client->post($this->buildUrl($uri), $data, [], $response);
    }

    /**
     * Check whether a channel name is available. Returns true when the channel name can be used to create a new channel, false otherwise.
     *
     * @param array $data
     * @param array $response
     * @return bool
     * @throws GuzzleException
     * @throws MissingArgumentException
     */
    final public function isNameFree(array $data): bool
    {
        $uri = 'chats/channels/is-name-free';
        $required = [
            'name' => Type::String,
        ];
        $this->throwIfInvalid($required, $data);

        return (bool)$this->client->post($this->buildUrl($uri), $data)[0];
    }

    /**
     * Restore an archived channel and allow new messages to be added again.
     *
     * Permissions that may be checked: Channel.Admin
     *
     * @param string $channel
     * @return void
     * @throws GuzzleException
     */
    final public function restoreArchivedChannel(string $channel): void
    {
        $uri = 'chats/channels/{channel}/restore-archived';
        $uriArguments = [
            'channel' => $channel,
        ];

        $this->client->post($this->buildUrl($uri, $uriArguments), []);
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
    final public function listAllChannels(array $request, array $response = []): array
    {
        $uri = 'chats/channels/all-channels';
        $required = [
            'query' => Type::String,
        ];
        $this->throwIfInvalid($required, $request);

        return $this->client->get($this->buildUrl($uri), $request, $response);
    }

    /**
     * Permissions that may be checked: Channel.ViewChannel
     *
     * @param string $channel
     * @param array $response
     * @return array
     * @throws GuzzleException
     */
    final public function getChannel(string $channel, array $response = []): array
    {
        $uri = 'chats/channels/{channel}';
        $uriArguments = [
            'channel' => $channel,
        ];

        return $this->client->get($this->buildUrl($uri, $uriArguments), [], $response);
    }

    /**
     * Delete a channel. No one will be able to view this channel or its threads. This action cannot be undone.
     *
     * Permissions that may be checked: Channel.Admin
     *
     * @param string $channel
     * @return void
     * @throws GuzzleException
     */
    final public function deleteChannel(string $channel): void
    {
        $uri = 'chats/channels/{channel}';
        $uriArguments = [
            'channel' => $channel,
        ];

        $this->client->delete($this->buildUrl($uri, $uriArguments));
    }

    /**
     * Archive a channel and reject new messages being added. It is still possible to view messages from an archived channel. It is possible to restore the channel later.
     *
     * Permissions that may be checked: Channel.Admin
     *
     * @param string $channel
     * @return void
     * @throws GuzzleException
     */
    final public function archiveChannel(string $channel): void
    {
        $uri = 'chats/channels/{channel}/archive';
        $uriArguments = [
            'channel' => $channel,
        ];

        $this->client->delete($this->buildUrl($uri, $uriArguments));
    }

    /**
     * @return Conversations
     */
    final public function conversations(): Conversations
    {
        return new Conversations($this->client);
    }

    /**
     * @return Administrator
     */
    final public function administrator(): Administrator
    {
        return new Administrator($this->client);
    }

    /**
     * @return Attachments
     */
    final public function attachments(): Attachments
    {
        return new Attachments($this->client);
    }

    /**
     * @return Description
     */
    final public function description(): Description
    {
        return new Description($this->client);
    }

    /**
     * @return Icon
     */
    final public function icon(): Icon
    {
        return new Icon($this->client);
    }

    /**
     * @return Name
     */
    final public function name(): Name
    {
        return new Name($this->client);
    }

    /**
     * @return Subscribers
     */
    final public function subscribers(): Subscribers
    {
        return new Subscribers($this->client);
    }
}
