<?php

namespace Swe\SpaceSDK\Chats\Channels;

use GuzzleHttp\Exception\GuzzleException;
use Swe\SpaceSDK\AbstractApi;
use Swe\SpaceSDK\Chats\Channels\Attachments\Files;
use Swe\SpaceSDK\Chats\Channels\Attachments\Images;
use Swe\SpaceSDK\Chats\Channels\Attachments\Links;
use Swe\SpaceSDK\Chats\Channels\Attachments\Videos;

/**
 * Class Attachments
 * Generated at 2022-12-03 02:00
 *
 * @package Swe\SpaceSDK\Chats\Channels
 * @author Luca Braun <l.braun@s-w-e.com>
 */
final class Attachments extends AbstractApi
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
    final public function listAttachmentsInChannel(string $channel, array $request = [], array $response = []): array
    {
        $uri = 'chats/channels/{channel}/attachments';
        $uriArguments = [
            'channel' => $channel,
        ];

        return $this->client->get($this->buildUrl($uri, $uriArguments), $request, $response);
    }

    /**
     * @return Files
     */
    final public function files(): Files
    {
        return new Files($this->client);
    }

    /**
     * @return Images
     */
    final public function images(): Images
    {
        return new Images($this->client);
    }

    /**
     * @return Links
     */
    final public function links(): Links
    {
        return new Links($this->client);
    }

    /**
     * @return Videos
     */
    final public function videos(): Videos
    {
        return new Videos($this->client);
    }
}
