<?php

namespace Swe\SpaceSDK\Projects\Access\Admins;

use GuzzleHttp\Exception\GuzzleException;
use Swe\SpaceSDK\AbstractApi;
use Swe\SpaceSDK\Exception\MissingArgumentException;
use Swe\SpaceSDK\Type;

/**
 * Class Profiles
 * Generated at 2024-03-06 02:53
 *
 * @package Swe\SpaceSDK\Projects\Access\Admins
 * @author Luca Braun <l.braun@s-w-e.com>
 */
final class Profiles extends AbstractApi
{
    /**
     * Add a member as administrator to a project
     *
     * Permissions that may be checked: Project.Admin
     *
     * @param string $project
     * @param array $data
     * @return void
     * @throws GuzzleException
     * @throws MissingArgumentException
     */
    final public function addAdministrator(string $project, array $data): void
    {
        $uri = 'projects/{project}/access/admins/profiles';
        $required = [
            'profile' => Type::String,
        ];
        $this->throwIfInvalid($required, $data);
        $uriArguments = [
            'project' => $project,
        ];

        $this->client->post($this->buildUrl($uri, $uriArguments), $data);
    }

    /**
     * Remove a member as administrator from a project
     *
     * Permissions that may be checked: Project.Admin
     *
     * @param string $project
     * @param string $profile
     * @return void
     * @throws GuzzleException
     */
    final public function removeAdministrator(string $project, string $profile): void
    {
        $uri = 'projects/{project}/access/admins/profiles/{profile}';
        $uriArguments = [
            'project' => $project,
            'profile' => $profile,
        ];

        $this->client->delete($this->buildUrl($uri, $uriArguments));
    }
}
