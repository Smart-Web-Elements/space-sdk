<?php

namespace Swe\SpaceSDK\Chats\Channels\Attachments;

use GuzzleHttp\Exception\GuzzleException;
use Swe\SpaceSDK\AbstractApi;

/**
 * Class Images
 * Generated at 2023-10-06 07:26
 *
 * @package Swe\SpaceSDK\Chats\Channels\Attachments
 * @author Luca Braun <l.braun@s-w-e.com>
 */
final class Images extends AbstractApi
{
    /**
     * Permissions that may be checked: Channel.ViewMessages
     *
     * @param string $channel
     * @param array $request
     * @param array $response
     * @return array
     * @throws GuzzleException
     */
    final public function listImagesInChannel(string $channel, array $request = [], array $response = []): array
    {
        $uri = 'chats/channels/{channel}/attachments/images';
        $uriArguments = [
            'channel' => $channel,
        ];

        return $this->client->get($this->buildUrl($uri, $uriArguments), $request, $response);
    }
}
