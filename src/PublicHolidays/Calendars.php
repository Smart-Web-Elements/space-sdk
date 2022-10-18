<?php

namespace Swe\SpaceSDK\PublicHolidays;

use GuzzleHttp\Exception\GuzzleException;
use Swe\SpaceSDK\AbstractApi;
use Swe\SpaceSDK\Exception\MissingArgumentException;

/**
 * Class Calendars
 *
 * @package Swe\SpaceSDK\PublicHolidays
 * @author Luca Braun <l.braun@s-w-e.com>
 */
class Calendars extends AbstractApi
{
    /**
     * Create a public holiday calendar for a location.
     *
     * @param array $data
     * @param array $response
     * @return array
     * @throws GuzzleException
     * @throws MissingArgumentException
     */
    public function createCalendar(array $data, array $response = []): array
    {
        $uri = 'public-holidays/calendars';
        $required = [
            'name' => self::TYPE_STRING,
            'location' => self::TYPE_STRING,
        ];
        $this->throwIfInvalid($required, $data);

        return $this->client->post($this->buildUrl($uri), $data, $response);
    }

    /**
     * Import holidays in a public holiday calendar, using an attachment (.ics format) as the source.
     *
     * @param array $data
     * @return string
     * @throws GuzzleException
     * @throws MissingArgumentException
     */
    public function importCalendar(array $data): string
    {
        $uri = 'public-holidays/calendars/import';
        $required = [
            'calendar' => self::TYPE_STRING,
            'attachmentId' => self::TYPE_STRING,
        ];
        $this->throwIfInvalid($required, $data);

        return (string)$this->client->post($this->buildUrl($uri), $data)[0];
    }

    /**
     * Get all public holiday calendars.
     *
     * @param array $request
     * @param array $response
     * @return array
     * @throws GuzzleException
     */
    public function getAllCalendars(array $request = [], array $response = []): array
    {
        $uri = 'public-holidays/calendars';

        return $this->client->get($this->buildUrl($uri), $response, $request);
    }

    /**
     * Update an existing public holiday calendar.
     *
     * @param string $id
     * @param array $data
     * @param array $response
     * @return array
     * @throws GuzzleException
     * @throws MissingArgumentException
     */
    public function updateCalendar(string $id, array $data, array $response = []): array
    {
        $uri = 'public-holidays/calendars/{id}';
        $required = [
            'name' => self::TYPE_STRING,
            'location' => self::TYPE_STRING,
        ];
        $this->throwIfInvalid($required, $data);
        $uriArguments = [
            'id' => $id,
        ];

        return $this->client->patch($this->buildUrl($uri, $uriArguments), $data, $response);
    }

    /**
     * Delete a public holiday calendar.
     *
     * @param string $id
     * @return void
     * @throws GuzzleException
     */
    public function deleteCalendar(string $id): void
    {
        $uri = 'public-holidays/calendars/{id}';
        $uriArguments = [
            'id' => $id,
        ];

        $this->client->delete($this->buildUrl($uri, $uriArguments));
    }
}