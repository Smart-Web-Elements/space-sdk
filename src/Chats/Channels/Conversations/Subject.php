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
     * @param array $data
     * @return void
     * @throws GuzzleException
     * @throws MissingArgumentException
     */
    public function changeConversationSubject(array $data): void
    {
        $uri = 'chats/channels/conversations/{channel}/subject';
        $required = [
            'channel' => 'string',
        ];
        $this->throwIfInvalid($required, $data);
        $uriArguments = [
            'channel' => $data['channel'],
        ];
        $this->removeUrlArgumentsFromData($uriArguments, $data);

        $this->client->patch($this->buildUrl($uri, $uriArguments), $data);
    }
}