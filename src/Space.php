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

    /**
     * @return Calls
     */
    public function calls(): Calls
    {
        return new Calls($this->client);
    }

    /**
     * @return Checklists
     */
    public function checklists(): Checklists
    {
        return new Checklists($this->client);
    }
}