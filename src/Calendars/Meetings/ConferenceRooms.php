<?php

namespace Swe\SpaceSDK\Calendars\Meetings;

use GuzzleHttp\Exception\GuzzleException;
use Swe\SpaceSDK\AbstractApi;
use Swe\SpaceSDK\Exception\MissingArgumentException;
use Swe\SpaceSDK\Type;

/**
 * Class ConferenceRooms
 * Generated at 2023-02-07 02:00
 *
 * @package Swe\SpaceSDK\Calendars\Meetings
 * @author Luca Braun <l.braun@s-w-e.com>
 */
final class ConferenceRooms extends AbstractApi
{
    /**
     * Permissions that may be checked: Meetings.ManageRooms
     *
     * @param string $id
     * @param array $data
     * @return void
     * @throws GuzzleException
     * @throws MissingArgumentException
     */
    final public function addConferenceRoom(string $id, array $data): void
    {
        $uri = 'calendars/meetings/{id}/conference-rooms';
        $required = [
            'roomId' => Type::String,
            'dateTime' => Type::DateTime,
        ];
        $this->throwIfInvalid($required, $data);
        $uriArguments = [
            'id' => $id,
        ];

        $this->client->post($this->buildUrl($uri, $uriArguments), $data);
    }

    /**
     * Permissions that may be checked: Meetings.ManageRooms
     *
     * @param string $id
     * @param array $request
     * @return void
     * @throws GuzzleException
     * @throws MissingArgumentException
     */
    final public function removeConferenceRoom(string $id, array $request): void
    {
        $uri = 'calendars/meetings/{id}/conference-rooms';
        $required = [
            'roomId' => Type::String,
            'dateTime' => Type::DateTime,
        ];
        $this->throwIfInvalid($required, $request);
        $uriArguments = [
            'id' => $id,
        ];

        $this->client->delete($this->buildUrl($uri, $uriArguments), $request);
    }
}
