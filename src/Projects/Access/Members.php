<?php

namespace Swe\SpaceSDK\Projects\Access;

use Swe\SpaceSDK\AbstractApi;
use Swe\SpaceSDK\Projects\Access\Members\Profiles;
use Swe\SpaceSDK\Projects\Access\Members\Teams;

/**
 * Class Members
 * Generated at 2023-09-20 02:00
 *
 * @package Swe\SpaceSDK\Projects\Access
 * @author Luca Braun <l.braun@s-w-e.com>
 */
final class Members extends AbstractApi
{
    /**
     * @return Profiles
     */
    final public function profiles(): Profiles
    {
        return new Profiles($this->client);
    }

    /**
     * @return Teams
     */
    final public function teams(): Teams
    {
        return new Teams($this->client);
    }
}
