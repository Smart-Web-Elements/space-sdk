<?php

namespace Swe\SpaceSDK\TeamDirectory\CalendarEvents;

use GuzzleHttp\Exception\GuzzleException;
use Swe\SpaceSDK\AbstractApi;
use Swe\SpaceSDK\Exception\MissingArgumentException;
use Swe\SpaceSDK\Type;

/**
 * Class Holidays
 * Generated at 2024-02-07 02:00
 *
 * @package Swe\SpaceSDK\TeamDirectory\CalendarEvents
 * @author Luca Braun <l.braun@s-w-e.com>
 */
final class Holidays extends AbstractApi
{
    /**
     * Get/search holidays. Parameters are applied as 'AND' filters.
     *
     * @param array $request
     * @param array $response
     * @return array
     * @throws GuzzleException
     * @throws MissingArgumentException
     * @deprecated This method is deprecated since 2020-10-14. Use endpoints from 'calendars' resource
     */
    final public function getAllHolidays(array $request, array $response = []): array
    {
        $uri = 'team-directory/calendar-events/holidays';
        $required = [
            'startDate' => Type::Date,
            'endDate' => Type::Date,
        ];
        $this->throwIfInvalid($required, $request);

        return $this->client->get($this->buildUrl($uri), $request, $response);
    }
}
