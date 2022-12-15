<?php

namespace Swe\SpaceSDK\Projects\Access\Members;

use GuzzleHttp\Exception\GuzzleException;
use Swe\SpaceSDK\AbstractApi;
use Swe\SpaceSDK\Exception\MissingArgumentException;
use Swe\SpaceSDK\Type;

/**
 * Class Profiles
 * Generated at 2022-12-15 11:10
 *
 * @package Swe\SpaceSDK\Projects\Access\Members
 * @author Luca Braun <l.braun@s-w-e.com>
 */
final class Profiles extends AbstractApi
{
    /**
     * Add a member to a project
     *
     * Permissions that may be checked: Project.Admin
     *
     * @param string $project
     * @param array $data
     * @return void
     * @throws GuzzleException
     * @throws MissingArgumentException
     */
    final public function addMember(string $project, array $data): void
    {
        $uri = 'projects/{project}/access/members/profiles';
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
     * Remove a member from a project
     *
     * Permissions that may be checked: Project.Admin
     *
     * @param string $project
     * @param string $profile
     * @return void
     * @throws GuzzleException
     */
    final public function removeMember(string $project, string $profile): void
    {
        $uri = 'projects/{project}/access/members/profiles/{profile}';
        $uriArguments = [
            'project' => $project,
            'profile' => $profile,
        ];

        $this->client->delete($this->buildUrl($uri, $uriArguments));
    }
}
