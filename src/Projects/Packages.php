<?php

namespace Swe\SpaceSDK\Projects;

use Swe\SpaceSDK\AbstractApi;
use Swe\SpaceSDK\Projects\Packages\Repositories;
use Swe\SpaceSDK\Projects\Packages\Search;
use Swe\SpaceSDK\Projects\Packages\Types;

/**
 * Class Packages
 * Generated at 2023-03-09 02:00
 *
 * @package Swe\SpaceSDK\Projects
 * @author Luca Braun <l.braun@s-w-e.com>
 */
final class Packages extends AbstractApi
{
    /**
     * @return Repositories
     */
    final public function repositories(): Repositories
    {
        return new Repositories($this->client);
    }

    /**
     * @return Search
     */
    final public function search(): Search
    {
        return new Search($this->client);
    }

    /**
     * @return Types
     */
    final public function types(): Types
    {
        return new Types($this->client);
    }
}
