<?php

namespace Swe\SpaceSDK\TeamDirectory;

use GuzzleHttp\Exception\GuzzleException;
use Swe\SpaceSDK\AbstractApi;

/**
 * Class Stats
 *
 * @package Swe\SpaceSDK\TeamDirectory
 * @author Luca Braun <l.braun@s-w-e.com>
 */
class Stats extends AbstractApi
{
    /**
     * Get statistics of total members, as well as members per location, role, and team. Parameters are applied as 'AND'
     * filters.
     *
     * Permissions that may be checked: Team.View, Locations.View, Roles.View
     *
     * @param array $request
     * @param array $response
     * @return array
     * @throws GuzzleException
     */
    public function getAllStats(array $request = [], array $response = []): array
    {
        $uri = 'team-directory/stats';

        return $this->client->get($this->buildUrl($uri), $response, $request);
    }
}