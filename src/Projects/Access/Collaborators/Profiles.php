<?php

namespace Swe\SpaceSDK\Projects\Access\Collaborators;

use GuzzleHttp\Exception\GuzzleException;
use Swe\SpaceSDK\AbstractApi;
use Swe\SpaceSDK\Exception\MissingArgumentException;

/**
 * Class Profiles
 *
 * @package Swe\SpaceSDK\Projects\Access\Collaborators
 * @author Luca Braun <l.braun@s-w-e.com>
 */
class Profiles extends AbstractApi
{
    /**
     * Permissions that may be checked: Project.Admin
     *
     * @param string $project
     * @param array $data
     * @return void
     * @throws GuzzleException
     * @throws MissingArgumentException
     */
    public function addACollaborator(string $project, array $data): void
    {
        $uri = 'projects/{project}/access/collaborators/profiles';
        $required = [
            'profile' => self::TYPE_STRING,
        ];
        $this->throwIfInvalid($required, $data);
        $uriArguments = [
            'project' => $project,
        ];

        $this->client->post($this->buildUrl($uri, $uriArguments), $data);
    }

    /**
     * Permissions that may be checked: Project.View
     *
     * @param string $project
     * @param array $response
     * @return array
     * @throws GuzzleException
     */
    public function getAllIndividualCollaborators(string $project, array $response = []): array
    {
        $uri = 'projects/{project}/access/collaborators/profiles';
        $uriArguments = [
            'project' => $project,
        ];

        return $this->client->get($this->buildUrl($uri, $uriArguments), $response);
    }

    /**
     * Permissions that may be checked: Project.Admin
     *
     * @param string $project
     * @param string $profile
     * @return void
     * @throws GuzzleException
     */
    public function removeACollaborator(string $project, string $profile): void
    {
        $uri = 'projects/{project}/access/collaborators/profiles';
        $uriArguments = [
            'project' => $project,
        ];
        $request = [
            'profile' => $profile,
        ];

        $this->client->delete($this->buildUrl($uri, $uriArguments), $request);
    }
}