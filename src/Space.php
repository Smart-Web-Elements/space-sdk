<?php

namespace Swe\SpaceSDK;


/**
 * Class Space
 *
 * @package Space
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
     * @return ToDoItem
     */
    public function toDoItem(): ToDoItem
    {
        return new ToDoItem($this->client);
    }
}