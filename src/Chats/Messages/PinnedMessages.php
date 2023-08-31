<?php

namespace Swe\SpaceSDK\Chats\Messages;

use GuzzleHttp\Exception\GuzzleException;
use Swe\SpaceSDK\AbstractApi;
use Swe\SpaceSDK\Exception\MissingArgumentException;
use Swe\SpaceSDK\Type;

/**
 * Class PinnedMessages
 * Generated at 2023-08-31 02:00
 *
 * @package Swe\SpaceSDK\Chats\Messages
 * @author Luca Braun <l.braun@s-w-e.com>
 */
final class PinnedMessages extends AbstractApi
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
    final public function listPinnedMessagesInChannel(array $request, array $response = []): array
    {
        $uri = 'chats/messages/pinned-messages';
        $required = [
            'channel' => Type::String,
        ];
        $this->throwIfInvalid($required, $request);

        return $this->client->get($this->buildUrl($uri), $request, $response);
    }
}
