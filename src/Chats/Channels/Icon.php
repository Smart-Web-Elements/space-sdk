<?php

namespace Swe\SpaceSDK\Chats\Channels;

use GuzzleHttp\Exception\GuzzleException;
use Swe\SpaceSDK\AbstractApi;

/**
 * Class Icon
 *
 * @package Swe\SpaceSDK\Chats\Channels
 * @author Luca Braun <l.braun@s-w-e.com>
 */
class Icon extends AbstractApi
{
    /**
     * Permissions may be checked: Channel.UpdateChannelInfo
     *
     * @param string $channel
     * @param array $data
     * @return void
     * @throws GuzzleException
     */
    public function changeChannelIcon(string $channel, array $data = []): void
    {
        $uri = 'chats/channels/{channel}/icons';
        $uriArguments = [
            'channel' => $channel,
        ];

        $this->client->patch($this->buildUrl($uri, $uriArguments), $data);
    }
}