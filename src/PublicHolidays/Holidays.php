<?php

namespace Swe\SpaceSDK\PublicHolidays;

use GuzzleHttp\Exception\GuzzleException;
use Swe\SpaceSDK\AbstractApi;
use Swe\SpaceSDK\Exception\MissingArgumentException;
use Swe\SpaceSDK\PublicHolidays\Holidays\ProfileHolidays;
use Swe\SpaceSDK\PublicHolidays\Holidays\RelatedHolidays;

/**
 * Class Holidays
 *
 * @package Swe\SpaceSDK\PublicHolidays
 * @author Luca Braun <l.braun@s-w-e.com>
 */
class Holidays extends AbstractApi
{
    /**
     * Add a holiday to a public holiday calendar and specify if it is a working day or not.
     *
     * @param array $data
     * @param array $response
     * @return array
     * @throws GuzzleException
     * @throws MissingArgumentException
     */
    public function createHoliday(array $data, array $response = []): array
    {
        $uri = 'public-holidays/holidays';
        $required = [
            'calendar' => self::TYPE_STRING,
            'name' => self::TYPE_STRING,
            'date' => self::TYPE_DATE,
            'workingDay' => self::TYPE_BOOLEAN,
        ];
        $this->throwIfInvalid($required, $data);

        return $this->client->post($this->buildUrl($uri), $data, $response);
    }

    /**
     * Get/search all holidays in a public holiday calendar. Parameters are applied as 'AND' filters.
     *
     * @param array $request
     * @param array $response
     * @return array
     * @throws GuzzleException
     */
    public function getAllHolidays(array $request = [], array $response = []): array
    {
        $uri = 'public-holidays/holidays';

        return $this->client->get($this->buildUrl($uri), $response, $request);
    }

    /**
     * Update a holiday in a public holiday calendar. Optional parameters will be ignored when not specified and updated
     * otherwise.
     *
     * @param string $id
     * @param array $data
     * @param array $response
     * @return array
     * @throws GuzzleException
     */
    public function updateHoliday(string $id, array $data = [], array $response = []): array
    {
        $uri = 'public-holidays/holidays/{id}}';
        $uriArguments = [
            'id' => $id,
        ];

        return $this->client->patch($this->buildUrl($uri, $uriArguments), $data, $response);
    }

    /**
     * @param string $id
     * @return void
     * @throws GuzzleException
     */
    public function deleteHoliday(string $id): void
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
    public function profileHolidays(): ProfileHolidays
    {
        return new ProfileHolidays($this->client);
    }

    /**
     * @return RelatedHolidays
     */
    public function relatedHolidays(): RelatedHolidays
    {
        return new RelatedHolidays($this->client);
    }
}