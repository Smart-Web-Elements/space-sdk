<?php

namespace Swe\SpaceSDK\Projects\Access;

use GuzzleHttp\Exception\GuzzleException;
use Swe\SpaceSDK\AbstractApi;

/**
 * Class MemberProfiles
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
     * @param array $project
     * @param array $request
     * @param array $response
     * @return array
     * @throws GuzzleException
     */
    final public function getAllMemberProfiles(array $project, array $request = [], array $response = []): array
    {
        $uri = 'projects/{project}/access/member-profiles';
        $uriArguments = [
            'project' => $project,
        ];

        return $this->client->get($this->buildUrl($uri, $uriArguments), $request, $response);
    }
}
