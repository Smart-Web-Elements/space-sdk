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
        $url = 'chats/messages/import';

        $this->client->post($this->buildUrl($url), $data);
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
        $url = 'chats/messages/{message}';
        $required = [
            'channel' => 'string',
        ];
        $this->throwIfInvalid($required, $data);
        $message = $this->throwIfMissing(['externalId', 'id'], $data);
        $urlArguments = [
            'message' => $message,
        ];

        return $this->client->post($this->buildUrl($url, $urlArguments), $data, $response);
    }
}