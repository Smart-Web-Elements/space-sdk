<?php

namespace Swe\SpaceSDK\Calendars;

use GuzzleHttp\Exception\GuzzleException;
use Swe\SpaceSDK\AbstractApi;
use Swe\SpaceSDK\Exception\MissingArgumentException;
use Swe\SpaceSDK\Type;

/**
 * Class AbsenceEvents
 * Generated at 2023-01-27 02:00
 *
 * @package Swe\SpaceSDK\Calendars
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
     */
    final public function getAllAbsenceEvents(array $request, array $response = []): array
    {
        $uri = 'calendars/absence-events';
        $required = [
            'dateFrom' => Type::Date,
            'dateTo' => Type::Date,
        ];
        $this->throwIfInvalid($required, $request);

        return $this->client->get($this->buildUrl($uri), $request, $response);
    }
}
