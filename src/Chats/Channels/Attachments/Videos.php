<?php

namespace Swe\SpaceSDK\Chats\Channels\Attachments;

use GuzzleHttp\Exception\GuzzleException;
use Swe\SpaceSDK\AbstractApi;

/**
 * Class Videos
 *
 * @package Swe\SpaceSDK\Chats\Channels\Attachments
 * @author Luca Braun <l.braun@s-w-e.com>
 */
class Videos extends AbstractApi
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
    public function listVideosInChannel(string $channel, array $request = [], array $response = []): array
    {
        $uri = 'chats/channels/{channel}/attachments/videos';
        $uriArguments = [
            'channel' => $channel,
        ];

        return $this->client->get($this->buildUrl($uri, $uriArguments), $response, $request);
    }
}