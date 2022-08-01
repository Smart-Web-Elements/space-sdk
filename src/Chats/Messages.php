<?php

namespace Swe\SpaceSDK\Chats;

use GuzzleHttp\Exception\GuzzleException;
use Swe\SpaceSDK\AbstractApi;

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
}