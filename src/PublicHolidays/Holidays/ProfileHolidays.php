<?php

namespace Swe\SpaceSDK\PublicHolidays\Holidays;

use GuzzleHttp\Exception\GuzzleException;
use Swe\SpaceSDK\AbstractApi;
use Swe\SpaceSDK\Exception\MissingArgumentException;
use Swe\SpaceSDK\Type;

/**
 * Class ProfileHolidays
 * Generated at 2023-01-27 02:00
 *
 * @package Swe\SpaceSDK\PublicHolidays\Holidays
 * @author Luca Braun <l.braun@s-w-e.com>
 */
final class ProfileHolidays extends AbstractApi
{
    /**
     * Get holidays observed in the location(s) of the current profile during the selected period
     *
     * @param array $request
     * @param array $response
     * @return array
     * @throws GuzzleException
     * @throws MissingArgumentException
     */
    final public function getAllProfileHolidays(array $request, array $response = []): array
    {
        $uri = 'public-holidays/holidays/profile-holidays';
        $required = [
            'startDate' => Type::Date,
            'endDate' => Type::Date,
            'profile' => Type::String,
        ];
        $this->throwIfInvalid($required, $request);

        return $this->client->get($this->buildUrl($uri), $request, $response);
    }
}
