<?php

namespace Swe\SpaceSDK\Chats;

use GuzzleHttp\Exception\GuzzleException;
use Swe\SpaceSDK\AbstractApi;
use Swe\SpaceSDK\Chats\Messages\PinnedMessages;
use Swe\SpaceSDK\Chats\Messages\SyncBatch;
use Swe\SpaceSDK\Exception\MissingArgumentException;
use Swe\SpaceSDK\Type;

/**
 * Class Messages
 * Generated at 2023-08-31 02:00
 *
 * @package Swe\SpaceSDK\Chats
 * @author Luca Braun <l.braun@s-w-e.com>
 */
final class Messages extends AbstractApi
{
    /**
     * Delete a message from a channel.
     *
     * Permissions that may be checked: Channel.PostMessages, Channel.PostMessagesInThreads
     *
     * @param array $data
     * @return void
     * @throws GuzzleException
     * @throws MissingArgumentException
     */
    final public function deleteMessage(array $data): void
    {
        $uri = 'chats/messages/delete-message';
        $required = [
            'channel' => Type::String,
            'id' => Type::String,
        ];
        $this->throwIfInvalid($required, $data);

        $this->client->post($this->buildUrl($uri), $data);
    }

    /**
     * Edit an existing message. Message content can be a string, or a block with one or several sections of information.
     *
     * Permissions that may be checked: Channel.PostMessages, Channel.PostMessagesInThreads
     *
     * @param array $data
     * @return void
     * @throws GuzzleException
     * @throws MissingArgumentException
     */
    final public function editMessage(array $data): void
    {
        $uri = 'chats/messages/edit-message';
        $required = [
            'channel' => Type::String,
            'message' => Type::String,
            'content' => [
            ],
        ];
        $this->throwIfInvalid($required, $data);

        $this->client->post($this->buildUrl($uri), $data);
    }

    /**
     * This API method is intended to be used only by applications. The `createdAtUtc` and `editedAtUtc` parameters are Unix epoch timestamps in *milliseconds*.
     *
     * Permissions that may be checked: Channel.ImportMessages, Project.Issues.Import
     *
     * @param array $data
     * @return void
     * @throws GuzzleException
     * @throws MissingArgumentException
     */
    final public function importMessages(array $data): void
    {
        $uri = 'chats/messages/import';
        $required = [
            'channel' => Type::String,
            'messages' => Type::Array,
        ];
        $this->throwIfInvalid($required, $data);

        $this->client->post($this->buildUrl($uri), $data);
    }

    /**
     * Permissions that may be checked: Channel.PostMessages, Channel.PostMessagesInThreads
     *
     * @param array $data
     * @param array $response
     * @return array
     * @throws GuzzleException
     * @throws MissingArgumentException
     * @deprecated This method is deprecated since 2020-01-17. Use POST chats/messages/send-message
     */
    final public function sendTextMessage(array $data, array $response = []): array
    {
        $uri = 'chats/messages/send';
        $required = [
            'channel' => Type::String,
            'text' => Type::String,
        ];
        $this->throwIfInvalid($required, $data);

        return $this->client->post($this->buildUrl($uri), $data, [], $response);
    }

    /**
     * Send a message to a channel, thread, member, issue, code review, etc. Message content can be a string, or a block with one or several sections of information.
     *
     * Permissions that may be checked: Channel.PostMessages, Channel.PostMessagesInThreads
     *
     * @param array $data
     * @param array $response
     * @return array
     * @throws GuzzleException
     * @throws MissingArgumentException
     */
    final public function sendMessage(array $data, array $response = []): array
    {
        $uri = 'chats/messages/send-message';
        $required = [
            'content' => [
            ],
        ];
        $this->throwIfInvalid($required, $data);

        return $this->client->post($this->buildUrl($uri), $data, [], $response);
    }

    /**
     * Retrieve a batch of messages from a channel. Messages are divided into batches by providing `sorting`, `startFromDate` and `batchSize` parameters. If the retrieved number of messages is less than `batchSize`, there are currently no more messages to return. Return data also contains next value for `startFromDate` as well as the `orgLimitReached` flag indicating whether part of messages could not be retrieved because of organization plan limitation.
     *
     * Permissions that may be checked: Channel.ViewMessages
     *
     * @param array $request
     * @param array $response
     * @return array
     * @throws GuzzleException
     * @throws MissingArgumentException
     */
    final public function getChannelMessages(array $request, array $response = []): array
    {
        $uri = 'chats/messages';
        $required = [
            'channel' => Type::String,
            'sorting' => Type::String,
            'batchSize' => Type::Integer,
        ];
        $this->throwIfInvalid($required, $request);

        return $this->client->get($this->buildUrl($uri), $request, $response);
    }

    /**
     * Permissions that may be checked: Channel.ViewMessages
     *
     * @param string $message
     * @param array $request
     * @param array $response
     * @return array
     * @throws GuzzleException
     * @throws MissingArgumentException
     */
    final public function getMessage(string $message, array $request, array $response = []): array
    {
        $uri = 'chats/messages/{message}';
        $required = [
            'channel' => Type::String,
        ];
        $this->throwIfInvalid($required, $request);
        $uriArguments = [
            'message' => $message,
        ];

        return $this->client->get($this->buildUrl($uri, $uriArguments), $request, $response);
    }

    /**
     * Permissions that may be checked: Channel.EditPinnedMessagesList
     *
     * @param array $data
     * @return void
     * @throws GuzzleException
     * @throws MissingArgumentException
     */
    final public function pinMessage(array $data): void
    {
        $uri = 'chats/messages/pin';
        $required = [
            'channel' => Type::String,
            'message' => Type::String,
        ];
        $this->throwIfInvalid($required, $data);

        $this->client->patch($this->buildUrl($uri), $data);
    }

    /**
     * Permissions that may be checked: Channel.EditPinnedMessagesList
     *
     * @param array $data
     * @return void
     * @throws GuzzleException
     * @throws MissingArgumentException
     */
    final public function unpinMessage(array $data): void
    {
        $uri = 'chats/messages/unpin';
        $required = [
            'channel' => Type::String,
            'message' => Type::String,
        ];
        $this->throwIfInvalid($required, $data);

        $this->client->patch($this->buildUrl($uri), $data);
    }

    /**
     * @return PinnedMessages
     */
    final public function pinnedMessages(): PinnedMessages
    {
        return new PinnedMessages($this->client);
    }

    /**
     * @return SyncBatch
     */
    final public function syncBatch(): SyncBatch
    {
        return new SyncBatch($this->client);
    }
}
