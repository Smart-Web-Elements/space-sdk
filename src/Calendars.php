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
 * Generated at 2022-12-15 02:00
 *
 * @package Swe\SpaceSDK
 * @author Luca Braun <l.braun@s-w-e.com>
 */
final class Calendars extends AbstractApi
{
    /**
     * @return AbsenceEvents
     */
    final public function absenceEvents(): AbsenceEvents
    {
        return new AbsenceEvents($this->client);
    }

    /**
     * @return BirthdayEvents
     */
    final public function birthdayEvents(): BirthdayEvents
    {
        return new BirthdayEvents($this->client);
    }

    /**
     * @return EventParticipations
     */
    final public function eventParticipations(): EventParticipations
    {
        return new EventParticipations($this->client);
    }

    /**
     * @return Events
     */
    final public function events(): Events
    {
        return new Events($this->client);
    }

    /**
     * @return Holidays
     */
    final public function holidays(): Holidays
    {
        return new Holidays($this->client);
    }

    /**
     * @return Meetings
     */
    final public function meetings(): Meetings
    {
        return new Meetings($this->client);
    }

    /**
     * @return MembershipEvents
     */
    final public function membershipEvents(): MembershipEvents
    {
        return new MembershipEvents($this->client);
    }

    /**
     * @return NonWorkingDaysEvents
     */
    final public function nonWorkingDaysEvents(): NonWorkingDaysEvents
    {
        return new NonWorkingDaysEvents($this->client);
    }
}
