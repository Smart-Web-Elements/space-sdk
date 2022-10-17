<?php

namespace Swe\SpaceSDK\Chats\Messages;

use GuzzleHttp\Exception\GuzzleException;
use Swe\SpaceSDK\AbstractApi;
use Swe\SpaceSDK\Exception\MissingArgumentException;

/**
 * Class PinnedMessages
 *
 * @package Swe\SpaceSDK\Chats\Messages
 * @author Luca Braun <l.braun@s-w-e.com>
 */
class PinnedMessages extends AbstractApi
{
    /**
     * Permissions that may be checked: Channel.ViewMessages
     *
     * @param array $request
     * @param array $response
     * @return array
     * @throws GuzzleException
     * @throws MissingArgumentException
     */
    public function listPinnedMessagesInChannel(array $request, array $response = []): array
    {
        $uri = 'chats/messages/pinned-messages';
        $required = [
            'channel' => self::TYPE_STRING,
        ];
        $this->throwIfInvalid($required, $request);

        return $this->client->get($this->buildUrl($uri), $request, $response);
    }
}