<?php

namespace Swe\SpaceSDK\Projects\Access;

use GuzzleHttp\Exception\GuzzleException;
use Swe\SpaceSDK\AbstractApi;
use Swe\SpaceSDK\Projects\Access\Collaborators\Profiles;
use Swe\SpaceSDK\Projects\Access\Collaborators\Teams;

/**
 * Class Collaborators
 * Generated at 2023-04-07 02:00
 *
 * @package Swe\SpaceSDK\Projects\Access
 * @author Luca Braun <l.braun@s-w-e.com>
 */
final class Collaborators extends AbstractApi
{
    /**
     * Permissions that may be checked: Project.View
     *
     * @param string $project
     * @param array $response
     * @return array
     * @throws GuzzleException
     */
    final public function getAllCollaboratorsProfiles(string $project, array $response = []): array
    {
        $uri = 'projects/{project}/access/collaborators';
        $uriArguments = [
            'project' => $project,
        ];

        return $this->client->get($this->buildUrl($uri, $uriArguments), [], $response);
    }

    /**
     * @return Profiles
     */
    final public function profiles(): Profiles
    {
        return new Profiles($this->client);
    }

    /**
     * @return Teams
     */
    final public function teams(): Teams
    {
        return new Teams($this->client);
    }
}
