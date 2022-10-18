<?php

namespace Swe\SpaceSDK;

use Swe\SpaceSDK\Calendars\AbsenceEvents;
use Swe\SpaceSDK\Calendars\BirthdayEvents;
use Swe\SpaceSDK\Calendars\EventParticipations;
use Swe\SpaceSDK\Calendars\Events;
use Swe\SpaceSDK\Calendars\Holidays;
use Swe\SpaceSDK\Calendars\Meetings;
use Swe\SpaceSDK\Calendars\MembershipEvents;
use Swe\SpaceSDK\Calendars\NonWorkingDaysEvents;

/**
 * Class Calendars
 *
 * @package Swe\SpaceSDK
 * @author Luca Braun <l.braun@s-w-e.com>
 */
class Calendars extends AbstractApi
{
    /**
     * @return AbsenceEvents
     */
    public function absenceEvents(): AbsenceEvents
    {
        return new AbsenceEvents($this->client);
    }

    /**
     * @return BirthdayEvents
     */
    public function birthdayEvents(): BirthdayEvents
    {
        return new BirthdayEvents($this->client);
    }

    /**
     * @return EventParticipations
     */
    public function eventParticipations(): EventParticipations
    {
        return new EventParticipations($this->client);
    }

    /**
     * @return Events
     */
    public function events(): Events
    {
        return new Events($this->client);
    }

    /**
     * @return Holidays
     */
    public function holidays(): Holidays
    {
        return new Holidays($this->client);
    }

    /**
     * @return Meetings
     */
    public function meetings(): Meetings
    {
        return new Meetings($this->client);
    }

    /**
     * @return MembershipEvents
     */
    public function membershipEvents(): MembershipEvents
    {
        return new MembershipEvents($this->client);
    }

    /**
     * @return NonWorkingDaysEvents
     */
    public function nonWorkingDaysEvents(): NonWorkingDaysEvents
    {
        return new NonWorkingDaysEvents($this->client);
    }
}