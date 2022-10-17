<?php

namespace Swe\SpaceSDK\Chats;

use GuzzleHttp\Exception\GuzzleException;
use Swe\SpaceSDK\AbstractApi;
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
            'channel' => 'string',
            'id' => 'string',
        ];
        $this->throwIfInvalid($required, $data);

        $this->client->post($this->buildUrl($uri), $data);
    }

    /**
     * This API method is intended to be used only by applications.
     *
     * Permissions that may be checked: Channel.ImportMessages
     *
     * @param array $data
     * @return void
     * @throws GuzzleException
     */
    public function importMessages(array $data): void
    {
        $uri = 'chats/messages/import';

        $this->client->post($this->buildUrl($uri), $data);
    }

    /**
     * @param array $data
     * @param array $response
     * @return array
     * @throws GuzzleException
     * @throws MissingArgumentException
     */
    public function getMessage(array $data, array $response = []): array
    {
        $uri = 'chats/messages/{message}';
        $required = [
            'channel' => 'string',
        ];
        $this->throwIfInvalid($required, $data);
        $message = $this->throwIfMissing(['externalId', 'id'], $data);
        $uriArguments = [
            'message' => $message,
        ];

        return $this->client->post($this->buildUrl($uri, $uriArguments), $data, $response);
    }
}