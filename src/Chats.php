<?php

namespace Swe\SpaceSDK;

use Swe\SpaceSDK\Chats\Channels;
use Swe\SpaceSDK\Chats\Messages;

/**
 *
 */
class Chats extends AbstractApi
{
    /**
     * @return Channels
     */
    public function channels(): Channels
    {
        return new Channels($this->client);
    }

    /**
     * @return Messages
     */
    public function messages(): Messages
    {
        return new Messages($this->client);
    }
}