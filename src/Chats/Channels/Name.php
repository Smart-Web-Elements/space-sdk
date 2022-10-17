<?php

namespace Swe\SpaceSDK\Chats\Channels;

use GuzzleHttp\Exception\GuzzleException;
use Swe\SpaceSDK\AbstractApi;
use Swe\SpaceSDK\Exception\MissingArgumentException;

/**
 * Class Name
 *
 * @package Swe\SpaceSDK\Chats\Channels
 * @author Luca Braun <l.braun@s-w-e.com>
 */
class Name extends AbstractApi
{
    /**
     * Permissions that may be checked: Channel.Admin
     *
     * @param array $data
     * @return void
     * @throws GuzzleException
     * @throws MissingArgumentException
     */
    public function renameChannel(array $data): void
    {
        $uri = 'chats/channels/{channel}/name';
        $required = [
            'channel' => self::TYPE_STRING,
            'name' => self::TYPE_STRING,
        ];
        $this->throwIfInvalid($required, $data);
        $uriArguments = [
            'channel' => $data['channel'],
        ];
        $this->removeUrlArgumentsFromData($uriArguments, $data);

        $this->client->patch($this->buildUrl($uri, $uriArguments), $data);
    }
}