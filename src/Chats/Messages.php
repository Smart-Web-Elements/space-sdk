<?php

namespace Swe\SpaceSDK\Chats;

use GuzzleHttp\Exception\GuzzleException;
use Swe\SpaceSDK\AbstractApi;
use Swe\SpaceSDK\Chats\Messages\PinnedMessages;
use Swe\SpaceSDK\Exception\MissingArgumentException;

/**
 *
 */
class Messages extends AbstractApi
{
    /**
     * Delete a message from a channel.
     *
     * Permissions that may be checked: Channel.PostMessage, Channel.PostMessagesInThreads
     *
     * @param array $data
     * @return void
     * @throws GuzzleException
     * @throws MissingArgumentException
     */
    public function deleteMessage(array $data): void
    {
        $uri = 'chats/messages/delete-message';
        $required = [
            'channel' => self::TYPE_STRING,
            'id' => self::TYPE_STRING,
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
    public function editMessage(array $data): void
    {
        $uri = 'chats/messages/edit-message';
        $required = [
            'channel' => self::TYPE_STRING,
            'message' => self::TYPE_STRING,
            'content' => self::TYPE_ARRAY,
        ];
        $this->throwIfInvalid($required, $data);

        $this->client->post($this->buildUrl($uri), $data);
    }

    /**
     * This API method is intended to be used only by applications. The createdAtUtc and editedAtUtc parameters are Unix
     * epoch timestamps in milliseconds.
     *
     * Permissions that may be checked: Channel.ImportMessages
     *
     * @param array $data
     * @return void
     * @throws GuzzleException
     * @throws MissingArgumentException
     */
    public function importMessages(array $data): void
    {
        $uri = 'chats/messages/import';
        $required = [
            'channel' => self::TYPE_STRING,
            'messages' => self::TYPE_STRING,
        ];
        $this->throwIfInvalid($required, $data);

        $this->client->post($this->buildUrl($uri), $data);
    }

    /**
     * Send a message to a channel, thread, member, issue, code review, etc. Message content can be a string, or a block
     * with one or several sections of information.
     *
     * Permissions that may be checked: Channel.PostMessages, Channel.PostMessagesInThreads
     *
     * @param array $data
     * @param array $response
     * @return array
     * @throws GuzzleException
     * @throws MissingArgumentException
     */
    public function sendMessage(array $data, array $response = []): array
    {
        $uri = 'chats/messages/send-message';
        $required = [
            'content' => self::TYPE_ARRAY,
        ];
        $this->throwIfInvalid($required, $data);

        return $this->client->post($this->buildUrl($uri), $data, $response);
    }

    /**
     * Retrieve a batch of messages from a channel. Messages are divided into batches by providing sorting,
     * startFromDate and batchSize parameters. If the retrieved number of messages is less than batchSize, there are
     * currently no more messages to return. Return data also contains next value for startFromDate as well as the
     * orgLimitReached flag indicating whether part of messages could not be retrieved because of organization plan
     * limitation.
     *
     * Permissions that may be checked: Channel.ViewMessages
     *
     * @param array $request
     * @param array $response
     * @return array
     * @throws GuzzleException
     * @throws MissingArgumentException
     */
    public function getChannelMessages(array $request, array $response = []): array
    {
        $uri = 'chats/messages';
        $required = [
            'channel' => self::TYPE_STRING,
            'sorting' => self::TYPE_STRING,
            'batchSize' => self::TYPE_INTEGER,
        ];
        $this->throwIfInvalid($required, $request);

        return $this->client->get($this->buildUrl($uri), $response, $request);
    }

    /**
     * Permissions that may be checked: Channel.ViewMessages
     *
     * @param string $channel
     * @param string $message
     * @param array $response
     * @return array
     * @throws GuzzleException
     */
    public function getMessage(string $channel, string $message, array $response = []): array
    {
        $uri = 'chats/messages/{message}';
        $uriArguments = [
            'message' => $message,
        ];
        $request = [
            'channel' => $channel,
        ];

        return $this->client->get($this->buildUrl($uri, $uriArguments), $response, $request);
    }

    /**
     * Permissions that may be checked: Channel.EditPinnedMessagesList
     *
     * @param array $data
     * @return void
     * @throws GuzzleException
     * @throws MissingArgumentException
     */
    public function pinMessage(array $data): void
    {
        $uri = 'chats/messages/pin';
        $required = [
            'channel' => self::TYPE_STRING,
            'message' => self::TYPE_STRING,
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
    public function unpinMessage(array $data): void
    {
        $uri = 'chats/messages/unpin';
        $required = [
            'channel' => self::TYPE_STRING,
            'message' => self::TYPE_STRING,
        ];
        $this->throwIfInvalid($required, $data);

        $this->client->patch($this->buildUrl($uri), $data);
    }

    /**
     * @return PinnedMessages
     */
    public function pinnedMessages(): PinnedMessages
    {
        return new PinnedMessages($this->client);
    }
}