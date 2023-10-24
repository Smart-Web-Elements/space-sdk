<?php

namespace Swe\SpaceSDK\Projects;

use GuzzleHttp\Exception\GuzzleException;
use Swe\SpaceSDK\AbstractApi;

/**
 * Class PrivateProjects
 * Generated at 2023-10-24 02:15
 *
 * @package Swe\SpaceSDK\Projects
 * @author Luca Braun <l.braun@s-w-e.com>
 */
final class PrivateProjects extends AbstractApi
{
    /**
     * Request access to a project
     *
     * Permissions that may be checked: Project.ViewPrivate
     *
     * @param string $project
     * @return void
     * @throws GuzzleException
     */
    final public function requestAccessToProject(string $project): void
    {
        $uri = 'projects/private-projects/{project}/request-access';
        $uriArguments = [
            'project' => $project,
        ];

        $this->client->post($this->buildUrl($uri, $uriArguments));
    }

    /**
     * List private projects in the current organization
     *
     * Permissions that may be checked: Project.ViewPrivate, Project.View
     *
     * @param array $response
     * @return array
     * @throws GuzzleException
     */
    final public function getAllPrivateProjects(array $response = []): array
    {
        $uri = 'projects/private-projects';

        return $this->client->get($this->buildUrl($uri), [], $response);
    }
}
