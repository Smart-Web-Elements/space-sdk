<?php

namespace Swe\SpaceSDK\Chats\Channels;

use GuzzleHttp\Exception\GuzzleException;
use Swe\SpaceSDK\AbstractApi;
use Swe\SpaceSDK\Exception\MissingArgumentException;

/**
 * Class Description
 *
 * @package Swe\SpaceSDK\Chats\Channels
 * @author Luca Braun <l.braun@s-w-e.com>
 */
class Description extends AbstractApi
{
    /**
     * Permissions that may be checked: Channel.UpdateChannelInfo
     *
     * @param array $data
     * @return void
     * @throws GuzzleException
     * @throws MissingArgumentException
     */
    public function changeChannelDescription(array $data): void
    {
        $uri = 'chats/channels/{channel}/description';
        $required = [
            'channel' => self::TYPE_STRING,
            'description' => self::TYPE_STRING,
        ];
        $this->throwIfInvalid($required, $data);
        $uriArguments = [
            'channel' => $data['channel'],
        ];
        $this->removeUrlArgumentsFromData($uriArguments, $data);

        $this->client->patch($this->buildUrl($uri, $uriArguments), $data);
    }
}