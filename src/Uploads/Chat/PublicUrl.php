<?php

namespace Swe\SpaceSDK\Uploads\Chat;

use GuzzleHttp\Exception\GuzzleException;
use Swe\SpaceSDK\AbstractApi;

/**
 * Class PublicUrl
 *
 * @package Swe\SpaceSDK\Uploads\Chat
 * @author Luca Braun <l.braun@s-w-e.com>
 */
class PublicUrl extends AbstractApi
{
    /**
     * Returns a URL that can be used to access attachment file without authentication.
     *
     * @param string $channel
     * @param string $message
     * @param string $attachmentId
     * @return string
     * @throws GuzzleException
     */
    public function getPublicUrl(string $channel, string $message, string $attachmentId): string
    {
        $uri = 'uploads/chat/public-url/{channel}/{message}/{attachmentId}';
        $uriArguments = [
            'channel' => $channel,
            'message' => $message,
            'attachmentId' => $attachmentId,
        ];

        return (string)$this->client->get($this->buildUrl($uri, $uriArguments))[0];
    }
}