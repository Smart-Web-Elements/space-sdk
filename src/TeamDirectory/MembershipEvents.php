<?php

namespace Swe\SpaceSDK\TeamDirectory;

use GuzzleHttp\Exception\GuzzleException;
use Swe\SpaceSDK\AbstractApi;

/**
 * Class MembershipEvents
 *
 * @package Swe\SpaceSDK\TeamDirectory
 * @author Luca Braun <l.braun@s-w-e.com>
 */
class MembershipEvents extends AbstractApi
{
    /**
     * Get/search membership events. Parameters are applied as 'AND' filters.
     *
     * @param array $request
     * @param array $response
     * @return array
     * @throws GuzzleException
     */
    public function getAllMembershipEvents(array $request = [], array $response = []): array
    {
        $uri = 'team-directory/membership-events';

        return $this->client->get($this->buildUrl($uri), $response, $request);
    }
}