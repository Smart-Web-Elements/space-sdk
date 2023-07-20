<?php

namespace Swe\SpaceSDK\Calendars;

use GuzzleHttp\Exception\GuzzleException;
use Swe\SpaceSDK\AbstractApi;
use Swe\SpaceSDK\Exception\MissingArgumentException;
use Swe\SpaceSDK\Type;

/**
 * Class Events
 * Generated at 2023-07-20 02:00
 *
 * @package Swe\SpaceSDK\Calendars
 * @author Luca Braun <l.braun@s-w-e.com>
 */
final class Events extends AbstractApi
{
    /**
     * Get calendar events attached to an article in a specific time period
     *
     * @param array $request
     * @param array $response
     * @return array
     * @throws GuzzleException
     * @throws MissingArgumentException
     */
    final public function getAllEvents(array $request, array $response = []): array
    {
        $uri = 'calendars/events';
        $required = [
            'dateFrom' => Type::Date,
            'dateTo' => Type::Date,
        ];
        $this->throwIfInvalid($required, $request);

        return $this->client->get($this->buildUrl($uri), $request, $response);
    }

    /**
     * Get a calendar event attached to an article
     *
     * @param string $id
     * @param array $response
     * @return array
     * @throws GuzzleException
     */
    final public function getEvent(string $id, array $response = []): array
    {
        $uri = 'calendars/events/{id}';
        $uriArguments = [
            'id' => $id,
        ];

        return $this->client->get($this->buildUrl($uri, $uriArguments), [], $response);
    }
}
