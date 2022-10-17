<?php

namespace Swe\SpaceSDK\Chats\Channels;

use GuzzleHttp\Exception\GuzzleException;
use Swe\SpaceSDK\AbstractApi;
use Swe\SpaceSDK\Exception\MissingArgumentException;

/**
 * Class Administrator
 *
 * @package Swe\SpaceSDK\Chats\Channels
 * @author Luca Braun <l.braun@s-w-e.com>
 */
class Administrator extends AbstractApi
{
    /**
     * Permissions that may be checked: Channel.ViewChannelParticipants
     *
     * @param string $channel
     * @param array $response
     * @return array
     * @throws GuzzleException
     */
    public function getChannelAdministrator(string $channel, array $response = []): array
    {
        $uri = 'chats/channels/{channel}/administrator';
        $uriArguments = [
            'channel' => $channel,
        ];

        return $this->client->get($this->buildUrl($uri, $uriArguments), $response);
    }

    /**
     * Permissions that may be checked: Channel.Admin
     *
     * @param string $channel
     * @param array $data
     * @return void
     * @throws GuzzleException
     * @throws MissingArgumentException
     */
    public function assignChannelAdministrator(string $channel, array $data): void
    {
        $uri = 'chats/channels/{channel}/administrator';
        $required = [
            'profile' => self::TYPE_STRING,
        ];
        $this->throwIfInvalid($required, $data);
        $uriArguments = [
            'channel' => $channel,
        ];

        $this->client->patch($this->buildUrl($uri, $uriArguments), $data);
    }
}