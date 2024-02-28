<?php

namespace Swe\SpaceSDK\TeamDirectory\Teams;

use GuzzleHttp\Exception\GuzzleException;
use Swe\SpaceSDK\AbstractApi;

/**
 * Class DirectMembers
 * Generated at 2024-02-28 02:00
 *
 * @package Swe\SpaceSDK\TeamDirectory\Teams
 * @author Luca Braun <l.braun@s-w-e.com>
 */
final class DirectMembers extends AbstractApi
{
    /**
     * Get or search direct members of a given team
     *
     * @param string $id
     * @param array $request
     * @param array $response
     * @return array
     * @throws GuzzleException
     */
    final public function getAllDirectMembers(string $id, array $request = [], array $response = []): array
    {
        $uri = 'team-directory/teams/{id}/direct-members';
        $uriArguments = [
            'id' => $id,
        ];

        return $this->client->get($this->buildUrl($uri, $uriArguments), $request, $response);
    }
}
