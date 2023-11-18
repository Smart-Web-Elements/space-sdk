<?php

namespace Swe\SpaceSDK\Chats\Channels;

use GuzzleHttp\Exception\GuzzleException;
use Swe\SpaceSDK\AbstractApi;
use Swe\SpaceSDK\Exception\MissingArgumentException;
use Swe\SpaceSDK\Type;

/**
 * Class Administrator
 * Generated at 2023-11-18 04:46
 *
 * @package Swe\SpaceSDK\Chats\Channels
 * @author Luca Braun <l.braun@s-w-e.com>
 */
final class Administrator extends AbstractApi
{
    /**
     * Permissions that may be checked: Channel.ViewChannelParticipants
     *
     * @param string $channel
     * @param array $response
     * @return array|null
     * @throws GuzzleException
     */
    final public function getChannelAdministrator(string $channel, array $response = []): ?array
    {
        $uri = 'chats/channels/{channel}/administrator';
        $uriArguments = [
            'channel' => $channel,
        ];

        return $this->client->get($this->buildUrl($uri, $uriArguments), [], $response);
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
    final public function assignChannelAdministrator(string $channel, array $data): void
    {
        $uri = 'chats/channels/{channel}/administrator';
        $required = [
            'profile' => Type::String,
        ];
        $this->throwIfInvalid($required, $data);
        $uriArguments = [
            'channel' => $channel,
        ];

        $this->client->patch($this->buildUrl($uri, $uriArguments), $data);
    }
}
