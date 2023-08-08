<?php

namespace Swe\SpaceSDK\Chats\Channels\Conversations;

use GuzzleHttp\Exception\GuzzleException;
use Swe\SpaceSDK\AbstractApi;
use Swe\SpaceSDK\Exception\MissingArgumentException;
use Swe\SpaceSDK\Type;

/**
 * Class Subject
 * Generated at 2023-08-08 02:41
 *
 * @package Swe\SpaceSDK\Chats\Channels\Conversations
 * @author Luca Braun <l.braun@s-w-e.com>
 */
final class Subject extends AbstractApi
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
    final public function changeConversationSubject(string $channel, array $data): void
    {
        $uri = 'chats/channels/conversations/{channel}/subject';
        $required = [
            'subject' => Type::String,
        ];
        $this->throwIfInvalid($required, $data);
        $uriArguments = [
            'channel' => $channel,
        ];

        $this->client->patch($this->buildUrl($uri, $uriArguments), $data);
    }
}
