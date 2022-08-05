<?php

namespace Swe\SpaceSDK\Chats;

use GuzzleHttp\Exception\GuzzleException;
use Swe\SpaceSDK\AbstractApi;
use Swe\SpaceSDK\Exception\MissingArgumentException;

/**
 *
 */
class Channels extends AbstractApi
{
    /**
     * Create a new channel.
     *
     * Permissions that may be checked: Chat.AddChannels
     *
     * @param array $data
     * @param array $response
     * @return array
     * @throws GuzzleException
     * @throws MissingArgumentException
     */
    public function addNewChannel(array $data, array $response = []): array
    {
        $url = 'chats/channels';
        $required = [
            'private' => 'boolean',
        ];
        $this->throwIfInvalid($required, $data);

        return $this->client->post($this->buildUrl($url), $data, $response);
    }

    /**
     * Check whether a channel name is available. Returns true when the channel name can be used to create a new channel, false otherwise.
     *
     * @param string $name
     * @return bool
     * @throws GuzzleException
     */
    public function isNameFree(string $name): bool
    {
        $url = 'chats/channels/is-name-free';
        $data = [
            'name' => $name,
        ];

        return $this->client->post($this->buildUrl($url), $data)[0];
    }
}