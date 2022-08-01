<?php

namespace Swe\SpaceSDK;


/**
 * Class Space
 *
 * @package Swe\SpaceSDK
 * @author Luca Braun <l.braun@s-w-e.com>
 */
class Space extends AbstractApi
{

    /**
     * @return Project
     */
    public function project(): Project
    {
        return new Project($this->client);
    }

    /**
     * @return Chats
     */
    public function chats(): Chats
    {
        return new Chats($this->client);
    }
}