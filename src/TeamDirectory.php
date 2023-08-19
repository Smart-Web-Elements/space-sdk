<?php

namespace Swe\SpaceSDK;

use Swe\SpaceSDK\TeamDirectory\CalendarEvents;
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
 * Generated at 2023-08-19 02:00
 *
 * @package Swe\SpaceSDK
 * @author Luca Braun <l.braun@s-w-e.com>
 */
final class TeamDirectory extends AbstractApi
{
    /**
     * @return CalendarEvents
     */
    final public function calendarEvents(): CalendarEvents
    {
        return new CalendarEvents($this->client);
    }

    /**
     * @return InvitationLinks
     */
    final public function invitationLinks(): InvitationLinks
    {
        return new InvitationLinks($this->client);
    }

    /**
     * @return Invitations
     */
    final public function invitations(): Invitations
    {
        return new Invitations($this->client);
    }

    /**
     * @return Languages
     */
    final public function languages(): Languages
    {
        return new Languages($this->client);
    }

    /**
     * @return LocationEquipmentTypes
     */
    final public function locationEquipmentTypes(): LocationEquipmentTypes
    {
        return new LocationEquipmentTypes($this->client);
    }

    /**
     * @return LocationMapMemberPoints
     */
    final public function locationMapMemberPoints(): LocationMapMemberPoints
    {
        return new LocationMapMemberPoints($this->client);
    }

    /**
     * @return Locations
     */
    final public function locations(): Locations
    {
        return new Locations($this->client);
    }

    /**
     * @return LocationsWithTimezone
     */
    final public function locationsWithTimezone(): LocationsWithTimezone
    {
        return new LocationsWithTimezone($this->client);
    }

    /**
     * @return MemberLocations
     */
    final public function memberLocations(): MemberLocations
    {
        return new MemberLocations($this->client);
    }

    /**
     * @return MembershipEvents
     */
    final public function membershipEvents(): MembershipEvents
    {
        return new MembershipEvents($this->client);
    }

    /**
     * @return Memberships
     */
    final public function memberships(): Memberships
    {
        return new Memberships($this->client);
    }

    /**
     * @return Profiles
     */
    final public function profiles(): Profiles
    {
        return new Profiles($this->client);
    }

    /**
     * @return Roles
     */
    final public function roles(): Roles
    {
        return new Roles($this->client);
    }

    /**
     * @return Stats
     */
    final public function stats(): Stats
    {
        return new Stats($this->client);
    }

    /**
     * @return Teams
     */
    final public function teams(): Teams
    {
        return new Teams($this->client);
    }
}
