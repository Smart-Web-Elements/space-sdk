<?php

namespace Swe\SpaceSDK\Chats\Channels;

use GuzzleHttp\Exception\GuzzleException;
use Swe\SpaceSDK\AbstractApi;
use Swe\SpaceSDK\Chats\Channels\Conversations\Subject;
use Swe\SpaceSDK\Exception\MissingArgumentException;

/**
 * Class Conversations
 *
 * @package Swe\SpaceSDK\Chats\Channels
 * @author Luca Braun <l.braun@s-w-e.com>
 */
class Conversations extends AbstractApi
{
    /**
     * Permissions that may be checked: Chat.StartConversation
     *
     * @param array $data
     * @param array $response
     * @return array
     * @throws GuzzleException
     * @throws MissingArgumentException
     */
    public function createConversation(array $data, array $response = []): array
    {
        $uri = 'chats/channels/conversations';
        $required = [
            'profileIds' => self::TYPE_ARRAY,
        ];
        $this->throwIfInvalid($required, $data);

        return $this->client->post($this->buildUrl($uri), $data, $response);
    }

    /**
     * Permissions that may be checked: Channel.Admin
     *
     * @param string $channel
     * @param array $data
     * @param array $response
     * @return array
     * @throws GuzzleException
     * @throws MissingArgumentException
     */
    public function convertConversationToPrivateChannel(string $channel, array $data, array $response = []): array
    {
        $uri = 'chats/channels/conversations/{channel}/convert';
        $required = [
            'channelName' => self::TYPE_STRING,
        ];
        $this->throwIfInvalid($required, $data);
        $uriArguments = [
            'channel' => $channel,
        ];

        return $this->client->post($this->buildUrl($uri, $uriArguments), $data, $response);
    }

    /**
     * @return Subject
     */
    public function subject(): Subject
    {
        return new Subject($this->client);
    }
}