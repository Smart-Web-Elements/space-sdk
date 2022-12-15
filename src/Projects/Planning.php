<?php

namespace Swe\SpaceSDK\Projects;

use Swe\SpaceSDK\AbstractApi;
use Swe\SpaceSDK\Projects\Planning\Boards;
use Swe\SpaceSDK\Projects\Planning\Checklists;
use Swe\SpaceSDK\Projects\Planning\Issues;
use Swe\SpaceSDK\Projects\Planning\Tags;

/**
 * Class Planning
 * Generated at 2022-12-15 02:00
 *
 * @package Swe\SpaceSDK\Projects
 * @author Luca Braun <l.braun@s-w-e.com>
 */
final class Planning extends AbstractApi
{
    /**
     * @return Boards
     */
    final public function boards(): Boards
    {
        return new Boards($this->client);
    }

    /**
     * @return Checklists
     */
    final public function checklists(): Checklists
    {
        return new Checklists($this->client);
    }

    /**
     * @return Issues
     */
    final public function issues(): Issues
    {
        return new Issues($this->client);
    }

    /**
     * @return Tags
     */
    final public function tags(): Tags
    {
        return new Tags($this->client);
    }
}
