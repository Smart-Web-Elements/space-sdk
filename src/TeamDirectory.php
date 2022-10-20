<?php

namespace Swe\SpaceSDK;

use Swe\SpaceSDK\TeamDirectory\InvitationLinks;
use Swe\SpaceSDK\TeamDirectory\Invitations;
use Swe\SpaceSDK\TeamDirectory\Languages;
use Swe\SpaceSDK\TeamDirectory\LocationEquipmentTypes;
use Swe\SpaceSDK\TeamDirectory\LocationMapMemberPoints;
use Swe\SpaceSDK\TeamDirectory\Locations;
use Swe\SpaceSDK\TeamDirectory\LocationsWithTimezone;
use Swe\SpaceSDK\TeamDirectory\MemberLocations;
use Swe\SpaceSDK\TeamDirectory\MembershipEvents;
use Swe\SpaceSDK\TeamDirectory\Memberships;
use Swe\SpaceSDK\TeamDirectory\Profiles;
use Swe\SpaceSDK\TeamDirectory\Roles;
use Swe\SpaceSDK\TeamDirectory\Stats;
use Swe\SpaceSDK\TeamDirectory\Teams;

/**
 * Class TeamDirectory
 *
 * @package Swe\SpaceSDK
 * @author Luca Braun <l.braun@s-w-e.com>
 */
class TeamDirectory extends AbstractApi
{
    /**
     * @return InvitationLinks
     */
    public function invitationLinks(): InvitationLinks
    {
        return new InvitationLinks($this->client);
    }

    /**
     * @return Invitations
     */
    public function invitations(): Invitations
    {
        return new Invitations($this->client);
    }

    /**
     * @return Languages
     */
    public function languages(): Languages
    {
        return new Languages($this->client);
    }

    /**
     * @return LocationEquipmentTypes
     */
    public function locationEquipmentTypes(): LocationEquipmentTypes
    {
        return new LocationEquipmentTypes($this->client);
    }

    /**
     * @return LocationMapMemberPoints
     */
    public function locationMapMemberPoints(): LocationMapMemberPoints
    {
        return new LocationMapMemberPoints($this->client);
    }

    /**
     * @return Locations
     */
    public function locations(): Locations
    {
        return new Locations($this->client);
    }

    /**
     * @return LocationsWithTimezone
     */
    public function locationsWithTimezone(): LocationsWithTimezone
    {
        return new LocationsWithTimezone($this->client);
    }

    /**
     * @return MemberLocations
     */
    public function memberLocations(): MemberLocations
    {
        return new MemberLocations($this->client);
    }

    /**
     * @return MembershipEvents
     */
    public function membershipEvents(): MembershipEvents
    {
        return new MembershipEvents($this->client);
    }

    /**
     * @return Memberships
     */
    public function memberships(): Memberships
    {
        return new Memberships($this->client);
    }

    /**
     * @return Profiles
     */
    public function profiles(): Profiles
    {
        return new Profiles($this->client);
    }

    /**
     * @return Roles
     */
    public function roles(): Roles
    {
        return new Roles($this->client);
    }

    /**
     * @return Stats
     */
    public function stats(): Stats
    {
        return new Stats($this->client);
    }

    /**
     * @return Teams
     */
    public function teams(): Teams
    {
        return new Teams($this->client);
    }
}