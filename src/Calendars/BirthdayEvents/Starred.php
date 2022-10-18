<?php

namespace Swe\SpaceSDK\Calendars\BirthdayEvents;

use GuzzleHttp\Exception\GuzzleException;
use Swe\SpaceSDK\AbstractApi;
use Swe\SpaceSDK\Exception\MissingArgumentException;

/**
 * Class Starred
 *
 * @package Swe\SpaceSDK\Calendars\BirthdayEvents
 * @author Luca Braun <l.braun@s-w-e.com>
 */
class Starred extends AbstractApi
{
    /**
     * Get/search birthdays in a specific time period for starred profiles.
     *
     * @param array $request
     * @param array $response
     * @return array
     * @throws GuzzleException
     * @throws MissingArgumentException
     */
    public function getAllStarredBirthdayEvents(array $request, array $response = []): array
    {
        $uri = 'calendars/birthday-events/starred';
        $required = [
            'dateFrom' => self::TYPE_DATE,
            'dateTo' => self::TYPE_DATE,
        ];
        $this->throwIfInvalid($required, $request);

        return $this->client->get($this->buildUrl($uri), $response, $request);
    }
}