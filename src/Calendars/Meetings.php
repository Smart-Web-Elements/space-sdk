<?php

namespace Swe\SpaceSDK\Calendars;

use GuzzleHttp\Exception\GuzzleException;
use Swe\SpaceSDK\AbstractApi;
use Swe\SpaceSDK\Calendars\Meetings\ConferenceRooms;
use Swe\SpaceSDK\Calendars\Meetings\ParticipationStatus;
use Swe\SpaceSDK\Exception\MissingArgumentException;
use Swe\SpaceSDK\Type;

/**
 * Class Meetings
 * Generated at 2024-01-17 02:00
 *
 * @package Swe\SpaceSDK\Calendars
 * @author Luca Braun <l.braun@s-w-e.com>
 */
final class Meetings extends AbstractApi
{
    /**
     * Create a meeting
     *
     * Permissions that may be checked: Meeting.Edit
     *
     * @param array $data
     * @param array $response
     * @return array
     * @throws GuzzleException
     * @throws MissingArgumentException
     */
    final public function createMeeting(array $data, array $response = []): array
    {
        $uri = 'calendars/meetings';
        $required = [
            'summary' => Type::String,
            'occurrenceRule' => [
                'start' => Type::DateTime,
                'end' => Type::DateTime,
                'allDay' => Type::Boolean,
                'timezone' => [
                    'id' => Type::String,
                ],
            ],
        ];
        $this->throwIfInvalid($required, $data);

        return $this->client->post($this->buildUrl($uri), $data, [], $response);
    }

    /**
     * Search meetings by name, location, time period and other parameters. Parameters are applied as 'AND' filters while values in lists of locations, profiles and teams have 'OR' semantics.
     *
     * Permissions that may be checked: Meeting.View
     *
     * @param array $request
     * @param array $response
     * @return array
     * @throws GuzzleException
     */
    final public function getAllMeetings(array $request = [], array $response = []): array
    {
        $uri = 'calendars/meetings';

        return $this->client->get($this->buildUrl($uri), $request, $response);
    }

    /**
     * Search for the next meeting occurrence that starts after the provided time point or after the current time if it is not specified
     *
     * Permissions that may be checked: Meeting.View
     *
     * @param array $request
     * @param array $response
     * @return array|null
     * @throws GuzzleException
     * @throws MissingArgumentException
     */
    final public function getNextMeetingOccurrence(array $request, array $response = []): ?array
    {
        $uri = 'calendars/meetings/next-occurrence';
        $required = [
            'meetingId' => Type::String,
        ];
        $this->throwIfInvalid($required, $request);

        return $this->client->get($this->buildUrl($uri), $request, $response);
    }

    /**
     * Search for occurrences of a meeting that start in the provided time interval. Interval limits are inclusive, response is limited by the first 1_000 results by default.
     *
     * Permissions that may be checked: Meeting.View
     *
     * @param array $request
     * @param array $response
     * @return array
     * @throws GuzzleException
     * @throws MissingArgumentException
     */
    final public function getMeetingOccurrencesForPeriod(array $request, array $response = []): array
    {
        $uri = 'calendars/meetings/occurrences';
        $required = [
            'meetingId' => Type::String,
            'since' => Type::DateTime,
            'until' => Type::DateTime,
        ];
        $this->throwIfInvalid($required, $request);

        return $this->client->get($this->buildUrl($uri), $request, $response);
    }

    /**
     * Search for occurrences of a meeting that start in the provided time interval. Interval limits are inclusive, response is limited by the first 1_000 results by default (per meeting).
     *
     * Permissions that may be checked: Meeting.View
     *
     * @param array $request
     * @param array $response
     * @return array
     * @throws GuzzleException
     * @throws MissingArgumentException
     */
    final public function getMeetingOccurrencesForPeriodForMultipleMeetings(
        array $request,
        array $response = [],
    ): array
    {
        $uri = 'calendars/meetings/occurrences-by-meeting';
        $required = [
            'meetingIds' => Type::Array,
            'since' => Type::DateTime,
            'until' => Type::DateTime,
        ];
        $this->throwIfInvalid($required, $request);

        return $this->client->get($this->buildUrl($uri), $request, $response);
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
    final public function getMeetingParticipationStatusesForProfiles(array $request, array $response = []): array
    {
        $uri = 'calendars/meetings/participation-statuses';
        $required = [
            'id' => Type::String,
            'profileIds' => Type::Array,
        ];
        $this->throwIfInvalid($required, $request);

        return $this->client->get($this->buildUrl($uri), $request, $response);
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
    final public function getRsvpStatusesForExternalUsers(array $request, array $response = []): array
    {
        $uri = 'calendars/meetings/participation-statuses-external';
        $required = [
            'id' => Type::String,
            'emails' => Type::Array,
        ];
        $this->throwIfInvalid($required, $request);

        return $this->client->get($this->buildUrl($uri), $request, $response);
    }

    /**
     * Permissions that may be checked: Meeting.View
     *
     * @param array $request
     * @param array $response
     * @return array
     * @throws GuzzleException
     * @throws MissingArgumentException
     * @deprecated This method is deprecated since 27.07.2021. Use 'getProfileParticipantRecords' instead
     */
    final public function getProfileParticipationStatusesForMeetings(array $request, array $response = []): array
    {
        $uri = 'calendars/meetings/profile-participation';
        $required = [
            'profileId' => Type::String,
            'events' => Type::Array,
        ];
        $this->throwIfInvalid($required, $request);

        return $this->client->get($this->buildUrl($uri), $request, $response);
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
    final public function getProfileParticipationStatusRecordsForMeetings(array $request, array $response = []): array
    {
        $uri = 'calendars/meetings/profile-participation-records';
        $required = [
            'profileId' => Type::String,
            'events' => Type::Array,
        ];
        $this->throwIfInvalid($required, $request);

        return $this->client->get($this->buildUrl($uri), $request, $response);
    }

    /**
     * Permissions that may be checked: Meeting.View
     *
     * @param string $id
     * @param array $response
     * @return array|null
     * @throws GuzzleException
     */
    final public function getMeeting(string $id, array $response = []): ?array
    {
        $uri = 'calendars/meetings/{id}';
        $uriArguments = [
            'id' => $id,
        ];

        return $this->client->get($this->buildUrl($uri, $uriArguments), [], $response);
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
    final public function updateMeeting(string $id, array $data = [], array $response = []): array
    {
        $uri = 'calendars/meetings/{id}';
        $uriArguments = [
            'id' => $id,
        ];

        return $this->client->patch($this->buildUrl($uri, $uriArguments), $data, [], $response);
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
    final public function deleteMeeting(string $id, array $request = [], array $response = []): array
    {
        $uri = 'calendars/meetings/{id}';
        $uriArguments = [
            'id' => $id,
        ];

        return $this->client->delete($this->buildUrl($uri, $uriArguments), $request, $response);
    }

    /**
     * @return ConferenceRooms
     */
    final public function conferenceRooms(): ConferenceRooms
    {
        return new ConferenceRooms($this->client);
    }

    /**
     * @return ParticipationStatus
     */
    final public function participationStatus(): ParticipationStatus
    {
        return new ParticipationStatus($this->client);
    }
}
