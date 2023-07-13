<?php

namespace Swe\SpaceSDK\Projects;

use Swe\SpaceSDK\AbstractApi;
use Swe\SpaceSDK\Projects\Access\Admins;
use Swe\SpaceSDK\Projects\Access\Collaborators;
use Swe\SpaceSDK\Projects\Access\MemberProfiles;
use Swe\SpaceSDK\Projects\Access\Members;
use Swe\SpaceSDK\Projects\Access\Viewers;

/**
 * Class Access
 * Generated at 2023-07-13 02:15
 *
 * @package Swe\SpaceSDK\Projects
 * @author Luca Braun <l.braun@s-w-e.com>
 */
final class Access extends AbstractApi
{
    /**
     * @return Admins
     */
    final public function admins(): Admins
    {
        return new Admins($this->client);
    }

    /**
     * @return Collaborators
     */
    final public function collaborators(): Collaborators
    {
        return new Collaborators($this->client);
    }

    /**
     * @return MemberProfiles
     */
    final public function memberProfiles(): MemberProfiles
    {
        return new MemberProfiles($this->client);
    }

    /**
     * @return Members
     */
    final public function members(): Members
    {
        return new Members($this->client);
    }

    /**
     * @return Viewers
     */
    final public function viewers(): Viewers
    {
        return new Viewers($this->client);
    }
}
