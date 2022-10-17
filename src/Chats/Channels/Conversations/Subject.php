<?php

namespace Swe\SpaceSDK\Chats\Channels\Conversations;

use GuzzleHttp\Exception\GuzzleException;
use Swe\SpaceSDK\AbstractApi;
use Swe\SpaceSDK\Exception\MissingArgumentException;

/**
 * Class Subject
 *
 * @package Swe\SpaceSDK\Chats\Channels\Conversations
 * @author Luca Braun <l.braun@s-w-e.com>
 */
class Subject extends AbstractApi
{
    /**
     * Permissions that may be checked: Channel.UpdateChannelInfo
     *
     * @param string $channel
     * @param array $data
     * @return void
     * @throws GuzzleException
     * @throws MissingArgumentException
     */
    public function changeConversationSubject(string $channel, array $data): void
    {
        $uri = 'chats/channels/conversations/{channel}/subject';
        $required = [
            'subject' => self::TYPE_STRING,
        ];
        $this->throwIfInvalid($required, $data);
        $uriArguments = [
            'channel' => $channel,
        ];

        $this->client->patch($this->buildUrl($uri, $uriArguments), $data);
    }
}