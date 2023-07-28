<?php

namespace Swe\SpaceSDK\TeamDirectory\CalendarEvents;

use GuzzleHttp\Exception\GuzzleException;
use Swe\SpaceSDK\AbstractApi;
use Swe\SpaceSDK\Exception\MissingArgumentException;
use Swe\SpaceSDK\Type;

/**
 * Class AbsenceEvents
 * Generated at 2023-07-28 02:08
 *
 * @package Swe\SpaceSDK\TeamDirectory\CalendarEvents
 * @author Luca Braun <l.braun@s-w-e.com>
 */
final class AbsenceEvents extends AbstractApi
{
    /**
     * Get/search absences. Parameters are applied as 'AND' filters.
     *
     * @param array $request
     * @param array $response
     * @return array
     * @throws GuzzleException
     * @throws MissingArgumentException
     * @deprecated This method is deprecated since 2020-10-14. Use endpoints from 'calendars' resource
     */
    final public function getAllAbsenceEvents(array $request, array $response = []): array
    {
        $uri = 'team-directory/calendar-events/absence-events';
        $required = [
            'dateFrom' => Type::Date,
            'dateTo' => Type::Date,
        ];
        $this->throwIfInvalid($required, $request);

        return $this->client->get($this->buildUrl($uri), $request, $response);
    }
}
