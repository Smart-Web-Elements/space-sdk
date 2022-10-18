<?php

namespace Swe\SpaceSDK\Calendars\Meetings;

use GuzzleHttp\Exception\GuzzleException;
use Swe\SpaceSDK\AbstractApi;
use Swe\SpaceSDK\Exception\MissingArgumentException;

/**
 * Class ParticipationStatus
 *
 * @package Swe\SpaceSDK\Calendars\Meetings
 * @author Luca Braun <l.braun@s-w-e.com>
 */
class ParticipationStatus extends AbstractApi
{
    /**
     * Update profile participation status for a meeting.
     *
     * Permissions that may be checked: Meeting.EditRsvp
     *
     * @param string $id
     * @param array $data
     * @param array $response
     * @return array
     * @throws GuzzleException
     * @throws MissingArgumentException
     */
    public function updateProfileParticipationStatus(string $id, array $data, array $response = []): array
    {
        $uri = 'calendars/meetings/{id}/participation-status';
        $required = [
            'profileId' => self::TYPE_STRING,
            'status' => self::TYPE_STRING,
        ];
        $this->throwIfInvalid($required, $data);
        $uriArguments = [
            'id' => $id,
        ];

        return $this->client->patch($this->buildUrl($uri, $uriArguments), $data, $response);
    }
}