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

    /**
     * @return ExternalLinkPatterns
     */
    public function externalLinkPatterns(): ExternalLinkPatterns
    {
        return new ExternalLinkPatterns($this->client);
    }

    /**
     * @return HttpApiModel
     */
    public function httpApiModel(): HttpApiModel
    {
        return new HttpApiModel($this->client);
    }

    /**
     * @return ToDoItems
     */
    public function toDoItems(): ToDoItems
    {
        return new ToDoItems($this->client);
    }

    /**
     * @return Blog
     */
    public function blog(): Blog
    {
        return new Blog($this->client);
    }

    /**
     * @return Permissions
     */
    public function permissions(): Permissions
    {
        return new Permissions($this->client);
    }

    /**
     * @return RichText
     */
    public function richText(): RichText
    {
        return new RichText($this->client);
    }

    /**
     * @return Reactions
     */
    public function reactions(): Reactions
    {
        return new Reactions($this->client);
    }

    /**
     * @return Emojis
     */
    public function emojis(): Emojis
    {
        return new Emojis($this->client);
    }
}