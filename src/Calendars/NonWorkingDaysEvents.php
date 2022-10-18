<?php

namespace Swe\SpaceSDK\Calendars;

use GuzzleHttp\Exception\GuzzleException;
use Swe\SpaceSDK\AbstractApi;
use Swe\SpaceSDK\Exception\MissingArgumentException;

/**
 * Class NonWorkingDaysEvents
 *
 * @package Swe\SpaceSDK\Calendars
 * @author Luca Braun <l.braun@s-w-e.com>
 */
class NonWorkingDaysEvents extends AbstractApi
{
    /**
     * Get/search membership events. Parameters are applied as 'AND' filters.
     *
     * Permissions that may be checked: Profile.Memberships.View
     *
     * @param array $request
     * @param array $response
     * @return array
     * @throws GuzzleException
     * @throws MissingArgumentException
     */
    public function getAllNonWorkingDaysEvents(array $request, array $response = []): array
    {
        $uri = 'calendars/non-working-days-events';
        $required = [
            'dateFrom' => self::TYPE_DATE,
            'dateTo' => self::TYPE_DATE,
        ];
        $this->throwIfInvalid($required, $request);

        return $this->client->get($this->buildUrl($uri), $response, $request);
    }
}