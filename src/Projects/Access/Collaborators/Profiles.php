<?php

namespace Swe\SpaceSDK\Projects\Access\Collaborators;

use GuzzleHttp\Exception\GuzzleException;
use Swe\SpaceSDK\AbstractApi;
use Swe\SpaceSDK\Exception\MissingArgumentException;
use Swe\SpaceSDK\Type;

/**
 * Class Profiles
 * Generated at 2022-12-15 02:00
 *
 * @package Swe\SpaceSDK\Projects\Access\Collaborators
 * @author Luca Braun <l.braun@s-w-e.com>
 */
final class Profiles extends AbstractApi
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
    final public function addACollaborator(string $project, array $data): void
    {
        $uri = 'projects/{project}/access/collaborators/profiles';
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
     * Permissions that may be checked: Project.View
     *
     * @param string $project
     * @param array $response
     * @return array
     * @throws GuzzleException
     */
    final public function getAllIndividualCollaborators(string $project, array $response = []): array
    {
        $uri = 'projects/{project}/access/collaborators/profiles';
        $uriArguments = [
            'project' => $project,
        ];

        return $this->client->get($this->buildUrl($uri, $uriArguments), [], $response);
    }

    /**
     * Permissions that may be checked: Project.Admin
     *
     * @param string $project
     * @param array $request
     * @return void
     * @throws GuzzleException
     * @throws MissingArgumentException
     */
    final public function removeACollaborator(string $project, array $request): void
    {
        $uri = 'projects/{project}/access/collaborators/profiles';
        $required = [
            'profile' => Type::String,
        ];
        $this->throwIfInvalid($required, $request);
        $uriArguments = [
            'project' => $project,
        ];

        $this->client->delete($this->buildUrl($uri, $uriArguments), $request);
    }
}
