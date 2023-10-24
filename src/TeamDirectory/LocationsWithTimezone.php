<?php

namespace Swe\SpaceSDK\TeamDirectory;

use GuzzleHttp\Exception\GuzzleException;
use Swe\SpaceSDK\AbstractApi;

/**
 * Class LocationsWithTimezone
 * Generated at 2023-10-24 02:15
 *
 * @package Swe\SpaceSDK\TeamDirectory
 * @author Luca Braun <l.braun@s-w-e.com>
 */
final class LocationsWithTimezone extends AbstractApi
{
    /**
     * Get all locations with their time zone
     *
     * Permissions that may be checked: Locations.View
     *
     * @param array $response
     * @return array
     * @throws GuzzleException
     */
    final public function getAllLocationsWithTimezone(array $response = []): array
    {
        $uri = 'team-directory/locations-with-timezone';

        return $this->client->get($this->buildUrl($uri), [], $response);
    }
}
