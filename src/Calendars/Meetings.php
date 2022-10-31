<?php

namespace Swe\SpaceSDK\Calendars;

use GuzzleHttp\Exception\GuzzleException;
use Swe\SpaceSDK\AbstractApi;
use Swe\SpaceSDK\Calendars\Meetings\ConferenceRooms;
use Swe\SpaceSDK\Calendars\Meetings\ParticipationStatus;
use Swe\SpaceSDK\Exception\MissingArgumentException;

/**
 * Class Meetings
 *
 * @package Swe\SpaceSDK\Calendars
 * @author Luca Braun <l.braun@s-w-e.com>
 */
class Meetings extends AbstractApi
{
    /**
     * Create a meeting.
     *
     * Permissions that may be checked: Meeting.Edit
     *
     * @param array $data
     * @param array $response
     * @return array
     * @throws GuzzleException
     * @throws MissingArgumentException
     */
    public function createMeeting(array $data, array $response = []): array
    {
        $uri = 'calendars/meetings';
        $required = [
            'summary' => self::TYPE_STRING,
            'occurrenceRule' => [
                'start' => self::TYPE_DATETIME,
                'end' => self::TYPE_DATETIME,
                'allDay' => self::TYPE_BOOLEAN,
                'timezone' => [
                    'id' => self::TYPE_STRING,
                ],
            ],
        ];
        $this->throwIfInvalid($required, $data);

        return $this->client->post($this->buildUrl($uri), $data, $response);
    }

    /**
     * Search meetings by name, location, time period and other parameters. Parameters are applied as 'AND' filters
     * while values in lists of locations, profiles and teams have 'OR' semantics.
     *
     * Permissions that may be checked: Meeting.View
     *
     * @param array $request
     * @param array $response
     * @return array
     * @throws GuzzleException
     */
    public function getAllMeetings(array $request = [], array $response = []): array
    {
        $uri = 'calendars/meetings';

        return $this->client->get($this->buildUrl($uri), $response, $request);
    }

    /**
     * Search for the next meeting occurrence that starts after the provided time point or after the current time if it
     * is not specified.
     *
     * Permissions that may be checked: Meeting.View
     *
     * @param array $request
     * @param array $response
     * @return array
     * @throws GuzzleException
     * @throws MissingArgumentException
     */
    public function getNextMeetingOccurrence(array $request, array $response = []): array
    {
        $uri = 'calendars/meetings/next-occurrence';
        $required = [
            'meetingId' => self::TYPE_STRING,
        ];
        $this->throwIfInvalid($required, $request);

        return $this->client->get($this->buildUrl($uri), $response, $request);
    }

    /**
     * Search for occurrences of a meeting that start in the provided time interval. Interval limits are inclusive,
     * response is limited by the first 1_000 results by default.
     *
     * Permissions that may be checked: Meeting.View
     *
     * @param array $request
     * @param array $response
     * @return array
     * @throws GuzzleException
     * @throws MissingArgumentException
     */
    public function getMeetingOccurrencesForPeriod(array $request, array $response = []): array
    {
        $uri = 'calendars/meetings/occurrences';
        $required = [
            'meetingId' => self::TYPE_STRING,
            'since' => self::TYPE_DATETIME,
            'until' => self::TYPE_DATETIME,
        ];
        $this->throwIfInvalid($required, $request);

        return $this->client->get($this->buildUrl($uri), $response, $request);
    }

    /**
     * Search for occurrences of a meeting that start in the provided time interval. Interval limits are inclusive,
     * response is limited by the first 1_000 results by default (per meeting).
     *
     * Permissions that may be checked: Meeting.View
     *
     * @param array $request
     * @param array $response
     * @return array
     * @throws GuzzleException
     * @throws MissingArgumentException
     */
    public function getMeetingOccurrencesForPeriodForMultipleMeetings(array $request, array $response = []): array
    {
        $uri = 'calendars/meetings/occurrences-by-meeting';
        $required = [
            'meetingIds' => self::TYPE_ARRAY,
            'since' => self::TYPE_DATETIME,
            'until' => self::TYPE_DATETIME,
        ];
        $this->throwIfInvalid($required, $request);

        return $this->client->get($this->buildUrl($uri), $response, $request);
    }

    /**
     * Permissions that may be checked: Meeting.View
     *
     * @param array $request
     * @return string[]
     * @throws GuzzleException
     * @throws MissingArgumentException
     */
    public function getMeetingParticipationStatusesForProfiles(array $request): array
    {
        $uri = 'calendars/meetings/participation-statuses';
        $required = [
            'id' => self::TYPE_STRING,
            'profileIds' => self::TYPE_ARRAY,
        ];
        $this->throwIfInvalid($required, $request);

        return $this->client->get($this->buildUrl($uri), [], $request);
    }

    /**
     * Permissions that may be checked: Meeting.View
     *
     * @param array $request
     * @return string[]
     * @throws GuzzleException
     * @throws MissingArgumentException
     */
    public function getRSVPStatusesForExternalUsers(array $request): array
    {
        $uri = 'calendars/meetings/participation-statuses-external';
        $required = [
            'id' => self::TYPE_STRING,
            'emails' => self::TYPE_ARRAY,
        ];
        $this->throwIfInvalid($required, $request);

        return $this->client->get($this->buildUrl($uri), [], $request);
    }

    /**
     * Permissions that may be checked: Meeting.View
     *
     * @param array $request
     * @param array $response
     * @return array
     * @throws GuzzleException
     * @throws MissingArgumentException
     */
    public function getProfileParticipationStatusRecordsForMeetings(array $request, array $response = []): array
    {
        $uri = 'calendars/meetings/profile-participation-records';
        $required = [
            'profileId' => self::TYPE_STRING,
            'events' => self::TYPE_ARRAY,
        ];
        $this->throwIfInvalid($required, $request);

        return $this->client->get($this->buildUrl($uri), $response, $request);
    }

    /**
     * Permissions that may be checked: Meeting.View
     *
     * @param string $id
     * @param array $response
     * @return array
     * @throws GuzzleException
     */
    public function getMeeting(string $id, array $response = []): array
    {
        $uri = 'calendars/meetings/{id}';
        $uriArguments = [
            'id' => $id,
        ];

        return $this->client->get($this->buildUrl($uri, $uriArguments), $response);
    }

    /**
     * Patch a meeting. Only not-null parameters and not empty diffs will be applied.
     *
     * Permissions that may be checked: Meeting.Edit
     *
     * @param string $id
     * @param array $data
     * @param array $response
     * @return array
     * @throws GuzzleException
     */
    public function updateMeeting(string $id, array $data = [], array $response = []): array
    {
        $uri = 'calendars/meetings/{id}';
        $uriArguments = [
            'id' => $id,
        ];

        return $this->client->patch($this->buildUrl($uri, $uriArguments), $data, $response);
    }

    /**
     * Permissions that may be checked: Meeting.Edit
     *
     * @param string $id
     * @param array $request
     * @param array $response
     * @return array
     * @throws GuzzleException
     */
    public function deleteMeeting(string $id, array $request = [], array $response = []): array
    {
        $uri = 'calendars/meetings/{id}';
        $uriArguments = [
            'id' => $id,
        ];

        return $this->client->delete($this->buildUrl($uri, $uriArguments), $request, $response);
    }

    /**
     * @return ParticipationStatus
     */
    public function participationStatus(): ParticipationStatus
    {
        return new ParticipationStatus($this->client);
    }

    /**
     * @return ConferenceRooms
     */
    public function conferenceRooms(): ConferenceRooms
    {
        return new ConferenceRooms($this->client);
    }
}