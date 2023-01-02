<?php

namespace Swe\SpaceSDK\Calendars\Meetings;

use GuzzleHttp\Exception\GuzzleException;
use Swe\SpaceSDK\AbstractApi;
use Swe\SpaceSDK\Exception\MissingArgumentException;
use Swe\SpaceSDK\Type;

/**
 * Class ParticipationStatus
 * Generated at 2023-01-02 09:05
 *
 * @package Swe\SpaceSDK\Calendars\Meetings
 * @author Luca Braun <l.braun@s-w-e.com>
 */
final class ParticipationStatus extends AbstractApi
{
    /**
     * Update profile participation status for a meeting
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
    final public function updateProfileParticipationStatus(string $id, array $data, array $response = []): array
    {
        $uri = 'calendars/meetings/{id}/participation-status';
        $required = [
            'profileId' => Type::String,
            'status' => Type::String,
        ];
        $this->throwIfInvalid($required, $data);
        $uriArguments = [
            'id' => $id,
        ];

        return $this->client->patch($this->buildUrl($uri, $uriArguments), $data, [], $response);
    }
}
