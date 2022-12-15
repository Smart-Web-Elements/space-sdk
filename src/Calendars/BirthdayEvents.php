<?php

namespace Swe\SpaceSDK\Calendars;

use GuzzleHttp\Exception\GuzzleException;
use Swe\SpaceSDK\AbstractApi;
use Swe\SpaceSDK\Calendars\BirthdayEvents\Starred;
use Swe\SpaceSDK\Exception\MissingArgumentException;
use Swe\SpaceSDK\Type;

/**
 * Class BirthdayEvents
 * Generated at 2022-12-15 02:00
 *
 * @package Swe\SpaceSDK\Calendars
 * @author Luca Braun <l.braun@s-w-e.com>
 */
final class BirthdayEvents extends AbstractApi
{
    /**
     * Get/search birthdays. Parameters are applied as 'AND' filters.
     *
     * @param array $request
     * @param array $response
     * @return array
     * @throws GuzzleException
     * @throws MissingArgumentException
     */
    final public function getAllBirthdayEvents(array $request, array $response = []): array
    {
        $uri = 'calendars/birthday-events';
        $required = [
            'dateFrom' => Type::Date,
            'dateTo' => Type::Date,
        ];
        $this->throwIfInvalid($required, $request);

        return $this->client->get($this->buildUrl($uri), $request, $response);
    }

    /**
     * @return Starred
     */
    final public function starred(): Starred
    {
        return new Starred($this->client);
    }
}
