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
     * Permissions that may be checked: Channel.Admin
     *
     * @param array $data
     * @return void
     * @throws GuzzleException
     * @throws MissingArgumentException
     */
    public function assignChannelAdministrator(array $data): void
    {
        $uri = 'chats/channels/{channel}/administrator';
        $required = [
            'channel' => self::TYPE_STRING,
            'profile' => self::TYPE_STRING,
        ];
        $this->throwIfInvalid($required, $data);
        $uriArguments = [
            'channel' => $data['channel'],
        ];
        $this->removeUrlArgumentsFromData($uriArguments, $data);

        $this->client->patch($this->buildUrl($uri, $uriArguments), $data);
    }

    /**
     * Permissions that may be checked: Channel.ViewChannelParticipants
     *
     * @param array $data
     * @param array $response
     * @return array
     * @throws GuzzleException
     * @throws MissingArgumentException
     */
    public function getChannelAdministrator(array $data, array $response = []): array
    {
        $uri = 'chats/channels/{channel}/administrator';
        $required = [
            'channel' => self::TYPE_STRING,
        ];
        $this->throwIfInvalid($required, $data);
        $uriArguments = [
            'channel' => $data['channel'],
        ];
        $this->removeUrlArgumentsFromData($uriArguments, $data);

        return $this->client->get($this->buildUrl($uri, $uriArguments), $response);
    }
}