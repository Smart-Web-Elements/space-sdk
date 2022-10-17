<?php

namespace Swe\SpaceSDK\Chats\Channels\Attachments;

use GuzzleHttp\Exception\GuzzleException;
use Swe\SpaceSDK\AbstractApi;
use Swe\SpaceSDK\Exception\MissingArgumentException;

/**
 * Class Files
 *
 * @package Swe\SpaceSDK\Chats\Channels\Attachments
 * @author Luca Braun <l.braun@s-w-e.com>
 */
class Files extends AbstractApi
{
    /**
     * Permissions that may be checked: Channel.ViewMessages
     *
     * @param array $data
     * @param array $response
     * @return array
     * @throws GuzzleException
     * @throws MissingArgumentException
     */
    public function listFileAttachmentsInChannel(array $data, array $response): array
    {
        $uri = 'chats/channels/{channel}/attachments/files';
        $required = [
            'channel' => self::TYPE_STRING,
        ];
        $this->throwIfInvalid($required, $data);
        $uriArguments = [
            'channel' => $data['channel'],
        ];
        $this->removeUrlArgumentsFromData($uriArguments, $data);

        return $this->client->get($this->buildUrl($uri, $uriArguments), $data, $response);
    }
}