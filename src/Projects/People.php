<?php

namespace Swe\SpaceSDK\Projects;

use Swe\SpaceSDK\AbstractApi;
use Swe\SpaceSDK\Projects\People\Members;
use Swe\SpaceSDK\Projects\People\Teams;

/**
 * Class People
 * Generated at 2023-11-18 04:46
 *
 * @package Swe\SpaceSDK\Projects
 * @author Luca Braun <l.braun@s-w-e.com>
 */
final class People extends AbstractApi
{
    /**
     * @return Members
     */
    final public function members(): Members
    {
        return new Members($this->client);
    }

    /**
     * @return Teams
     */
    final public function teams(): Teams
    {
        return new Teams($this->client);
    }
}
