<?php

namespace Swe\SpaceSDK\Projects;

use Swe\SpaceSDK\AbstractApi;
use Swe\SpaceSDK\Projects\Planning\Boards;
use Swe\SpaceSDK\Projects\Planning\Checklists;
use Swe\SpaceSDK\Projects\Planning\Issues;
use Swe\SpaceSDK\Projects\Planning\Tags;

/**
 * Class Planning
 *
 * @package Swe\SpaceSDK\Projects
 * @author Luca Braun <l.braun@s-w-e.com>
 */
class Planning extends AbstractApi
{
    /**
     * @return Boards
     */
    public function boards(): Boards
    {
        return new Boards($this->client);
    }

    /**
     * @return Checklists
     */
    public function checklists(): Checklists
    {
        return new Checklists($this->client);
    }

    /**
     * @return Issues
     */
    public function issues(): Issues
    {
        return new Issues($this->client);
    }

    /**
     * @return Tags
     */
    public function tags(): Tags
    {
        return new Tags($this->client);
    }
}