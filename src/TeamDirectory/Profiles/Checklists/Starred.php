<?php

namespace Swe\SpaceSDK\TeamDirectory\Profiles\Checklists;

use GuzzleHttp\Exception\GuzzleException;
use Swe\SpaceSDK\AbstractApi;

/**
 * Class Starred
 *
 * @package Swe\SpaceSDK\TeamDirectory\Profiles\Checklists
 * @author Luca Braun <l.braun@s-w-e.com>
 */
final class Starred extends AbstractApi
{
    /**
     * Get all starred checklists associated with the profile
     *
     * @param array $profile
     * @param array $response
     * @return array
     * @throws GuzzleException
     * @deprecated This method is deprecated since 2022-04-08. [SPACE-13768]: Not implemented yet
     */
    final public function getAllStarredChecklists(array $profile, array $response = []): array
    {
        $uri = 'team-directory/profiles/{profile}/checklists/starred';
        $uriArguments = [
            'profile' => $profile,
        ];

        return $this->client->get($this->buildUrl($uri, $uriArguments), [], $response);
    }
}
