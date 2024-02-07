<?php

namespace Swe\SpaceSDK\Projects\Access;

use GuzzleHttp\Exception\GuzzleException;
use Swe\SpaceSDK\AbstractApi;

/**
 * Class MemberProfiles
 * Generated at 2024-02-07 02:00
 *
 * @package Swe\SpaceSDK\Projects\Access
 * @author Luca Braun <l.braun@s-w-e.com>
 */
final class MemberProfiles extends AbstractApi
{
    /**
     * Get project members for a given project key
     *
     * Permissions that may be checked: Project.View
     *
     * @param string $project
     * @param array $request
     * @param array $response
     * @return array
     * @throws GuzzleException
     */
    final public function getAllMemberProfiles(string $project, array $request = [], array $response = []): array
    {
        $uri = 'projects/{project}/access/member-profiles';
        $uriArguments = [
            'project' => $project,
        ];

        return $this->client->get($this->buildUrl($uri, $uriArguments), $request, $response);
    }
}
