<?php

namespace Swe\SpaceSDK\Projects\Access;

use Swe\SpaceSDK\AbstractApi;
use Swe\SpaceSDK\Projects\Access\Members\Profiles;
use Swe\SpaceSDK\Projects\Access\Members\Teams;

/**
 * Class Members
 *
 * @package Swe\SpaceSDK\Projects\Access
 * @author Luca Braun <l.braun@s-w-e.com>
 */
class Members extends AbstractApi
{
    /**
     * @return Profiles
     */
    public function profiles(): Profiles
    {
        return new Profiles($this->client);
    }

    /**
     * @return Teams
     */
    public function teams(): Teams
    {
        return new Teams($this->client);
    }
}