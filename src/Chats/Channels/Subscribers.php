<?php

namespace Swe\SpaceSDK\Chats\Channels;

use Swe\SpaceSDK\AbstractApi;
use Swe\SpaceSDK\Chats\Channels\Subscribers\Teams;
use Swe\SpaceSDK\Chats\Channels\Subscribers\Users;

/**
 * Class Subscribers
 *
 * @package Swe\SpaceSDK\Chats\Channels
 * @author Luca Braun <l.braun@s-w-e.com>
 */
class Subscribers extends AbstractApi
{
    /**
     * @return Users
     */
    public function users(): Users
    {
        return new Users($this->client);
    }

    /**
     * @return Teams
     */
    public function teams(): Teams
    {
        return new Teams($this->client);
    }
}