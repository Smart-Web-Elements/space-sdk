<?php

namespace Swe\SpaceSDK\PublicHolidays;

use GuzzleHttp\Exception\GuzzleException;
use Swe\SpaceSDK\AbstractApi;
use Swe\SpaceSDK\Exception\MissingArgumentException;
use Swe\SpaceSDK\PublicHolidays\Holidays\ProfileHolidays;
use Swe\SpaceSDK\PublicHolidays\Holidays\RelatedHolidays;
use Swe\SpaceSDK\Type;

/**
 * Class Holidays
 * Generated at 2023-05-05 02:00
 *
 * @package Swe\SpaceSDK\PublicHolidays
 * @author Luca Braun <l.braun@s-w-e.com>
 */
final class Holidays extends AbstractApi
{
    /**
     * Add a holiday to a public holiday calendar and specify if it is a working day or not
     *
     * @param array $data
     * @param array $response
     * @return array
     * @throws GuzzleException
     * @throws MissingArgumentException
     */
    final public function createHoliday(array $data, array $response = []): array
    {
        $uri = 'public-holidays/holidays';
        $required = [
            'calendar' => Type::String,
            'name' => Type::String,
            'date' => Type::Date,
            'workingDay' => Type::Boolean,
        ];
        $this->throwIfInvalid($required, $data);

        return $this->client->post($this->buildUrl($uri), $data, [], $response);
    }

    /**
     * Get/search all holidays in a public holiday calendar. Parameters are applied as 'AND' filters.
     *
     * @param array $request
     * @param array $response
     * @return array
     * @throws GuzzleException
     */
    final public function getAllHolidays(array $request = [], array $response = []): array
    {
        $uri = 'public-holidays/holidays';

        return $this->client->get($this->buildUrl($uri), $request, $response);
    }

    /**
     * Update a holiday in a public holiday calendar. Optional parameters will be ignored when not specified and updated otherwise.
     *
     * @param string $id
     * @param array $data
     * @param array $response
     * @return array
     * @throws GuzzleException
     */
    final public function updateHoliday(string $id, array $data = [], array $response = []): array
    {
        $uri = 'public-holidays/holidays/{id}';
        $uriArguments = [
            'id' => $id,
        ];

        return $this->client->patch($this->buildUrl($uri, $uriArguments), $data, [], $response);
    }

    /**
     * Delete a holiday from a public holiday calendar
     *
     * @param string $id
     * @return void
     * @throws GuzzleException
     */
    final public function deleteHoliday(string $id): void
    {
        $uri = 'public-holidays/holidays/{id}';
        $uriArguments = [
            'id' => $id,
        ];

        $this->client->delete($this->buildUrl($uri, $uriArguments));
    }

    /**
     * @return ProfileHolidays
     */
    final public function profileHolidays(): ProfileHolidays
    {
        return new ProfileHolidays($this->client);
    }

    /**
     * @return RelatedHolidays
     */
    final public function relatedHolidays(): RelatedHolidays
    {
        return new RelatedHolidays($this->client);
    }
}
