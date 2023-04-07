<?php

namespace Swe\SpaceSDK\Calendars;

use GuzzleHttp\Exception\GuzzleException;
use Swe\SpaceSDK\AbstractApi;
use Swe\SpaceSDK\Exception\MissingArgumentException;
use Swe\SpaceSDK\Type;

/**
 * Class NonWorkingDaysEvents
 * Generated at 2023-04-07 02:00
 *
 * @package Swe\SpaceSDK\Calendars
 * @author Luca Braun <l.braun@s-w-e.com>
 */
final class NonWorkingDaysEvents extends AbstractApi
{
    /**
     * Get/search non-working day events. Parameters are applied as 'AND' filters.
     *
     * @param array $request
     * @param array $response
     * @return array
     * @throws GuzzleException
     * @throws MissingArgumentException
     */
    final public function getAllNonWorkingDaysEvents(array $request, array $response = []): array
    {
        $uri = 'calendars/non-working-days-events';
        $required = [
            'dateFrom' => Type::Date,
            'dateTo' => Type::Date,
        ];
        $this->throwIfInvalid($required, $request);

        return $this->client->get($this->buildUrl($uri), $request, $response);
    }
}
