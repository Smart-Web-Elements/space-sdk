<?php

namespace Swe\SpaceSDK\Calendars;

use GuzzleHttp\Exception\GuzzleException;
use Swe\SpaceSDK\AbstractApi;
use Swe\SpaceSDK\Calendars\BirthdayEvents\Starred;
use Swe\SpaceSDK\Exception\MissingArgumentException;

/**
 * Class BirthdayEvents
 *
 * @package Swe\SpaceSDK\Calendars
 * @author Luca Braun <l.braun@s-w-e.com>
 */
class BirthdayEvents extends AbstractApi
{
    /**
     * Get/search birthdays. Parameters are applied as 'AND' filters.
     *
     * @param array $request
     * @param array $response
     * @return array
     * @throws GuzzleException
     * @throws MissingArgumentException
     */
    public function getAllBirthdayEvents(array $request, array $response = []): array
    {
        $uri = 'calendars/birthday-events';
        $required = [
            'dateFrom' => self::TYPE_DATE,
            'dateTo' => self::TYPE_DATE,
        ];
        $this->throwIfInvalid($required, $request);

        return $this->client->get($this->buildUrl($uri), $response, $request);
    }

    /**
     * @return Starred
     */
    public function starred(): Starred
    {
        return new Starred($this->client);
    }
}