<?php

namespace Swe\SpaceSDK\TeamDirectory;

use GuzzleHttp\Exception\GuzzleException;
use Swe\SpaceSDK\AbstractApi;
use Swe\SpaceSDK\Exception\MissingArgumentException;
use Swe\SpaceSDK\TeamDirectory\CalendarEvents\AbsenceEvents;
use Swe\SpaceSDK\TeamDirectory\CalendarEvents\BirthdayEvents;
use Swe\SpaceSDK\TeamDirectory\CalendarEvents\Holidays;
use Swe\SpaceSDK\TeamDirectory\CalendarEvents\MeetingParticipations;
use Swe\SpaceSDK\TeamDirectory\CalendarEvents\MembershipEvents;
use Swe\SpaceSDK\TeamDirectory\CalendarEvents\NonWorkingDaysEvents;
use Swe\SpaceSDK\Type;

/**
 * Class CalendarEvents
 * Generated at 2023-11-10 04:08
 *
 * @package Swe\SpaceSDK\TeamDirectory
 * @author Luca Braun <l.braun@s-w-e.com>
 */
final class CalendarEvents extends AbstractApi
{
    /**
     * Get calendar events attached to an article in a specific time period
     *
     * @param array $request
     * @param array $response
     * @return array
     * @throws GuzzleException
     * @throws MissingArgumentException
     * @deprecated This method is deprecated since 2020-10-14. Use endpoints from 'calendars' resource
     */
    final public function getAllCalendarEvents(array $request, array $response = []): array
    {
        $uri = 'team-directory/calendar-events';
        $required = [
            'dateFrom' => Type::Date,
            'dateTo' => Type::Date,
        ];
        $this->throwIfInvalid($required, $request);

        return $this->client->get($this->buildUrl($uri), $request, $response);
    }

    /**
     * Get a calendar event attached to an article
     *
     * @param string $id
     * @param array $response
     * @return array
     * @throws GuzzleException
     * @deprecated This method is deprecated since 2020-10-14. Use endpoints from 'calendars' resource
     */
    final public function getCalendarEvent(string $id, array $response = []): array
    {
        $uri = 'team-directory/calendar-events/{id}';
        $uriArguments = [
            'id' => $id,
        ];

        return $this->client->get($this->buildUrl($uri, $uriArguments), [], $response);
    }

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
     * @return Holidays
     */
    final public function holidays(): Holidays
    {
        return new Holidays($this->client);
    }

    /**
     * @return MeetingParticipations
     */
    final public function meetingParticipations(): MeetingParticipations
    {
        return new MeetingParticipations($this->client);
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
