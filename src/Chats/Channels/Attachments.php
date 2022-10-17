<?php

namespace Swe\SpaceSDK\Chats\Channels;

use GuzzleHttp\Exception\GuzzleException;
use Swe\SpaceSDK\AbstractApi;
use Swe\SpaceSDK\Chats\Channels\Attachments\Files;
use Swe\SpaceSDK\Chats\Channels\Attachments\Images;
use Swe\SpaceSDK\Chats\Channels\Attachments\Links;
use Swe\SpaceSDK\Chats\Channels\Attachments\Videos;
use Swe\SpaceSDK\Exception\MissingArgumentException;

/**
 * Class Attachments
 *
 * @package Swe\SpaceSDK\Chats\Channels
 * @author Luca Braun <l.braun@s-w-e.com>
 */
class Attachments extends AbstractApi
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
    public function listAttachmentsInChannel(array $data, array $response): array
    {
        $uri = 'chats/channels/{channel}/attachments';
        $required = [
            'channel' => 'string',
        ];
        $this->throwIfInvalid($required, $data);
        $uriArguments = [
            'channel' => $data['channel'],
        ];
        $this->removeUrlArgumentsFromData($uriArguments, $data);

        return $this->client->get($this->buildUrl($uri, $uriArguments), $data, $response);
    }

    /**
     * @return Files
     */
    public function files(): Files
    {
        return new Files($this->client);
    }

    /**
     * @return Images
     */
    public function images(): Images
    {
        return new Images($this->client);
    }

    /**
     * @return Links
     */
    public function links(): Links
    {
        return new Links($this->client);
    }

    /**
     * @return Videos
     */
    public function videos(): Videos
    {
        return new Videos($this->client);
    }
}