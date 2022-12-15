<?php

namespace Swe\SpaceSDK\PublicHolidays\Holidays;

use GuzzleHttp\Exception\GuzzleException;
use Swe\SpaceSDK\AbstractApi;

/**
 * Class RelatedHolidays
 * Generated at 2022-12-15 11:10
 *
 * @package Swe\SpaceSDK\PublicHolidays\Holidays
 * @author Luca Braun <l.braun@s-w-e.com>
 */
final class RelatedHolidays extends AbstractApi
{
    /**
     * Search related holidays in all public holiday calendars, during the selected period
     *
     * @param array $request
     * @param array $response
     * @return array
     * @throws GuzzleException
     */
    final public function getAllRelatedHolidays(array $request = [], array $response = []): array
    {
        $uri = 'public-holidays/holidays/related-holidays';

        return $this->client->get($this->buildUrl($uri), $request, $response);
    }
}
