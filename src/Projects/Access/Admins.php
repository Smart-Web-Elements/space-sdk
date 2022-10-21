<?php

namespace Swe\SpaceSDK\Projects\Access;

use GuzzleHttp\Exception\GuzzleException;
use Swe\SpaceSDK\AbstractApi;
use Swe\SpaceSDK\Projects\Access\Admins\Profiles;
use Swe\SpaceSDK\Projects\Access\Admins\Teams;

/**
 * Class Admins
 *
 * @package Swe\SpaceSDK\Projects\Access
 * @author Luca Braun <l.braun@s-w-e.com>
 */
class Admins extends AbstractApi
{
    /**
     * Returns the list of all project administrators.
     *
     * Permissions that may be checked: Project.View
     *
     * @param string $project
     * @param array $response
     * @return array
     * @throws GuzzleException
     */
    public function getAllAdmins(string $project, array $response = []): array
    {
        $uri = 'projects/{project}/access/admins';
        $uriArguments = [
            'project' => $project,
        ];

        return $this->client->get($this->buildUrl($uri, $uriArguments), $response);
    }

    /**
     * @return Profiles
     */
    public function profiles(): Profiles
    {
        return new Profiles($this->client);
    }

    /**
     * @return Teams
     */
    public function teams(): Teams
    {
        return new Teams($this->client);
    }
}