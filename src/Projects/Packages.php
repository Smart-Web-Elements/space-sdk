<?php

namespace Swe\SpaceSDK\Projects;

use Swe\SpaceSDK\AbstractApi;
use Swe\SpaceSDK\Projects\Packages\Repositories;
use Swe\SpaceSDK\Projects\Packages\Search;
use Swe\SpaceSDK\Projects\Packages\Types;

/**
 * Class Packages
 *
 * @package Swe\SpaceSDK\Projects
 * @author Luca Braun <l.braun@s-w-e.com>
 */
class Packages extends AbstractApi
{
    /**
     * @return Repositories
     */
    public function repositories(): Repositories
    {
        return new Repositories($this->client);
    }

    /**
     * @return Search
     */
    public function search(): Search
    {
        return new Search($this->client);
    }

    /**
     * @return Types
     */
    public function types(): Types
    {
        return new Types($this->client);
    }
}