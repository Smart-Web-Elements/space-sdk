<?php

namespace Swe\SpaceSDK\TeamDirectory\Memberships;

use GuzzleHttp\Exception\GuzzleException;
use Swe\SpaceSDK\AbstractApi;
use Swe\SpaceSDK\Exception\MissingArgumentException;

/**
 * Class ManagerCandidates
 *
 * @package Swe\SpaceSDK\TeamDirectory\Memberships
 * @author Luca Braun <l.braun@s-w-e.com>
 */
class ManagerCandidates extends AbstractApi
{
    /**
     * Query profiles that can be a manager.
     *
     * @param array $request
     * @param array $response
     * @return array
     * @throws GuzzleException
     * @throws MissingArgumentException
     */
    public function getManagerCandidate(array $request, array $response = []): array
    {
        $uri = 'team-directory/memberships/manager-candidates';
        $required = [
            'term' => self::TYPE_STRING,
        ];
        $this->throwIfInvalid($required, $request);

        return $this->client->get($this->buildUrl($uri), $response, $request);
    }
}