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
 *
 * @package Swe\SpaceSDK\Projects
 * @author Luca Braun <l.braun@s-w-e.com>
 */
class Access extends AbstractApi
{
    /**
     * @return Admins
     */
    public function admins(): Admins
    {
        return new Admins($this->client);
    }

    /**
     * @return Collaborators
     */
    public function collaborators(): Collaborators
    {
        return new Collaborators($this->client);
    }

    /**
     * @return MemberProfiles
     */
    public function memberProfiles(): MemberProfiles
    {
        return new MemberProfiles($this->client);
    }

    /**
     * @return Members
     */
    public function members(): Members
    {
        return new Members($this->client);
    }

    /**
     * @return Viewers
     */
    public function viewers(): Viewers
    {
        return new Viewers($this->client);
    }
}