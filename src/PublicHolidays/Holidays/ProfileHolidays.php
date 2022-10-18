<?php

namespace Swe\SpaceSDK\PublicHolidays\Holidays;

use GuzzleHttp\Exception\GuzzleException;
use Swe\SpaceSDK\AbstractApi;
use Swe\SpaceSDK\Exception\MissingArgumentException;

/**
 * Class ProfileHolidays
 *
 * @package Swe\SpaceSDK\PublicHolidays\Holidays
 * @author Luca Braun <l.braun@s-w-e.com>
 */
class ProfileHolidays extends AbstractApi
{
    /**
     * Get holidays observed in the location(s) of the current profile during the selected period.
     *
     * @param array $request
     * @param array $response
     * @return array
     * @throws GuzzleException
     * @throws MissingArgumentException
     */
    public function getAllProfileHolidays(array $request, array $response = []): array
    {
        $uri = 'public-holidays/holidays/profile-holidays';
        $required = [
            'startDate' => self::TYPE_DATE,
            'endDate' => self::TYPE_DATE,
            'profile' => self::TYPE_STRING,
        ];
        $this->throwIfInvalid($required, $request);
        $uriArguments = [];

        return $this->client->get($this->buildUrl($uri, $uriArguments), $response, $request);
    }
}