<?php

namespace Swe\SpaceSDK\Chats\Channels;

use Swe\SpaceSDK\AbstractApi;
use Swe\SpaceSDK\Chats\Channels\Subscribers\Teams;
use Swe\SpaceSDK\Chats\Channels\Subscribers\Users;

/**
 * Class Subscribers
 * Generated at 2023-08-08 02:41
 *
 * @package Swe\SpaceSDK\Chats\Channels
 * @author Luca Braun <l.braun@s-w-e.com>
 */
final class Subscribers extends AbstractApi
{
    /**
     * @return Teams
     */
    final public function teams(): Teams
    {
        return new Teams($this->client);
    }

    /**
     * @return Users
     */
    final public function users(): Users
    {
        return new Users($this->client);
    }
}
