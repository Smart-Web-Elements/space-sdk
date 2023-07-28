<?php

namespace Swe\SpaceSDK;

use Swe\SpaceSDK\Chats\Channels;
use Swe\SpaceSDK\Chats\Messages;

/**
 * Class Chats
 * Generated at 2023-07-28 02:08
 *
 * @package Swe\SpaceSDK
 * @author Luca Braun <l.braun@s-w-e.com>
 */
final class Chats extends AbstractApi
{
    /**
     * @return Channels
     */
    final public function channels(): Channels
    {
        return new Channels($this->client);
    }

    /**
     * @return Messages
     */
    final public function messages(): Messages
    {
        return new Messages($this->client);
    }
}
