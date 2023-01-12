<?php

namespace Swe\SpaceSDK\TeamDirectory\CalendarEvents\BirthdayEvents;

use GuzzleHttp\Exception\GuzzleException;
use Swe\SpaceSDK\AbstractApi;
use Swe\SpaceSDK\Exception\MissingArgumentException;
use Swe\SpaceSDK\Type;

/**
 * Class Starred
 * Generated at 2023-01-12 02:00
 *
 * @package Swe\SpaceSDK\TeamDirectory\CalendarEvents\BirthdayEvents
 * @author Luca Braun <l.braun@s-w-e.com>
 */
final class Starred extends AbstractApi
{
    /**
     * Get/search birthdays in a specific time period for starred profiles.
     *
     * @param array $request
     * @param array $response
     * @return array
     * @throws GuzzleException
     * @throws MissingArgumentException
     * @deprecated This method is deprecated since 2020-10-14. Use endpoints from 'calendars' resource
     */
    final public function getAllStarredBirthdayEvents(array $request, array $response = []): array
    {
        $uri = 'team-directory/calendar-events/birthday-events/starred';
        $required = [
            'dateFrom' => Type::Date,
            'dateTo' => Type::Date,
        ];
        $this->throwIfInvalid($required, $request);

        return $this->client->get($this->buildUrl($uri), $request, $response);
    }
}
