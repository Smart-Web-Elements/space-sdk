<?php

namespace Swe\SpaceSDK\PublicHolidays;

use GuzzleHttp\Exception\GuzzleException;
use Swe\SpaceSDK\AbstractApi;
use Swe\SpaceSDK\Exception\MissingArgumentException;
use Swe\SpaceSDK\Type;

/**
 * Class Calendars
 * Generated at 2023-11-18 04:46
 *
 * @package Swe\SpaceSDK\PublicHolidays
 * @author Luca Braun <l.braun@s-w-e.com>
 */
final class Calendars extends AbstractApi
{
    /**
     * Create a public holiday calendar for a location
     *
     * @param array $data
     * @param array $response
     * @return array
     * @throws GuzzleException
     * @throws MissingArgumentException
     */
    final public function createCalendar(array $data, array $response = []): array
    {
        $uri = 'public-holidays/calendars';
        $required = [
            'name' => Type::String,
            'location' => Type::String,
        ];
        $this->throwIfInvalid($required, $data);

        return $this->client->post($this->buildUrl($uri), $data, [], $response);
    }

    /**
     * Import holidays in a public holiday calendar, using an attachment (.ics format) as the source
     *
     * @param array $data
     * @return string
     * @throws GuzzleException
     * @throws MissingArgumentException
     */
    final public function importCalendar(array $data): string
    {
        $uri = 'public-holidays/calendars/import';
        $required = [
            'calendar' => Type::String,
            'attachmentId' => Type::String,
        ];
        $this->throwIfInvalid($required, $data);

        return (string)$this->client->post($this->buildUrl($uri), $data)[0];
    }

    /**
     * Get all public holiday calendars
     *
     * @param array $request
     * @param array $response
     * @return array
     * @throws GuzzleException
     */
    final public function getAllCalendars(array $request = [], array $response = []): array
    {
        $uri = 'public-holidays/calendars';

        return $this->client->get($this->buildUrl($uri), $request, $response);
    }

    /**
     * Update an existing public holiday calendar
     *
     * @param string $id
     * @param array $data
     * @param array $response
     * @return array
     * @throws GuzzleException
     * @throws MissingArgumentException
     */
    final public function updateCalendar(string $id, array $data, array $response = []): array
    {
        $uri = 'public-holidays/calendars/{id}';
        $required = [
            'name' => Type::String,
            'location' => Type::String,
        ];
        $this->throwIfInvalid($required, $data);
        $uriArguments = [
            'id' => $id,
        ];

        return $this->client->patch($this->buildUrl($uri, $uriArguments), $data, [], $response);
    }

    /**
     * Delete a public holiday calendar
     *
     * @param string $id
     * @return void
     * @throws GuzzleException
     */
    final public function deleteCalendar(string $id): void
    {
        $uri = 'public-holidays/calendars/{id}';
        $uriArguments = [
            'id' => $id,
        ];

        $this->client->delete($this->buildUrl($uri, $uriArguments));
    }
}
