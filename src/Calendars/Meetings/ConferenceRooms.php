<?php

namespace Swe\SpaceSDK\Calendars\Meetings;

use GuzzleHttp\Exception\GuzzleException;
use Swe\SpaceSDK\AbstractApi;
use Swe\SpaceSDK\Exception\MissingArgumentException;

/**
 * Class ConferenceRooms
 *
 * @package Swe\SpaceSDK\Calendars\Meetings
 * @author Luca Braun <l.braun@s-w-e.com>
 */
class ConferenceRooms extends AbstractApi
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
    public function addConferenceRoom(string $id, array $data): void
    {
        $uri = 'calendars/meetings/{id}/conference-rooms';
        $required = [
            'roomId' => self::TYPE_STRING,
            'dateTime' => self::TYPE_DATETIME,
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
    public function removeConferenceRoom(string $id, array $request): void
    {
        $uri = 'calendars/meetings/{id}/conference-rooms';
        $required = [
            'roomId' => self::TYPE_STRING,
            'dateTime' => self::TYPE_DATETIME,
        ];
        $this->throwIfInvalid($required, $request);
        $uriArguments = [
            'id' => $id,
        ];

        $this->client->delete($this->buildUrl($uri, $uriArguments), $request);
    }
}