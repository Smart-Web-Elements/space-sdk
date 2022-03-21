<?php

namespace Swe\SpaceSDK;


use GuzzleHttp\Exception\GuzzleException;
use Swe\SpaceSDK\Exception\MissingArgumentException;
use Swe\SpaceSDK\Project\Repository;

/**
 * Class Projects
 *
 * @package Space
 * @author Luca Braun <l.braun@s-w-e.com>
 */
class Project extends AbstractApi
{
    /**
     * Create a new project.
     *
     * Permissions that may be checked: Project.Create
     *
     * @param array $data
     * @param array $response
     * @return array
     * @throws GuzzleException
     * @throws MissingArgumentException
     */
    public function createProject(array $data, array $response = []): array
    {
        $url = 'projects';
        $requiredFields = [
            'key' => [
                'key' => 'string',
            ],
            'name' => 'string',
        ];

        $this->throwIfInvalid($requiredFields, $data);

        return $this->client->post($this->buildUrl($url), $data, $response);
    }

    /**
     * Update an existing project. Optional parameters will be ignored when not specified and updated otherwise.
     *
     * @param array $request
     * @param array $data
     * @param array $response
     * @return array
     * @throws GuzzleException
     * @throws MissingArgumentException
     */
    public function updateProject(array $request, array $data, array $response = []): array
    {
        $url = 'projects/{project}';
        $project = $this->throwIfKeyIdMissing($request);

        return $this->client->patch($this->buildUrl($url, ['project' => $project]), $data, $response);
    }

    /**
     * Delete a project.
     *
     * Permissions that may be checked: Project.Admin
     *
     * @param array $request
     * @return bool
     * @throws GuzzleException
     * @throws MissingArgumentException
     */
    public function deleteProject(array $request): bool
    {
        $url = 'projects/{project}';
        $project = $this->throwIfKeyIdMissing($request);

        return $this->client->delete($this->buildUrl($url, ['project' => $project]));
    }

    /**
     * Get/search all projects. Parameters are applied as 'AND' filters.
     *
     * @param array $request
     * @param array $response
     * @return array
     * @throws GuzzleException
     */
    public function getAllProjects(array $request = [], array $response = []): array
    {
        $url = 'projects';
        return $this->client->get($this->buildUrl($url), $request, $response);
    }

    /**
     * Get project by ID or project key.
     *
     * @param array $request
     * @param array $response
     * @return array
     * @throws GuzzleException
     * @throws MissingArgumentException
     */
    public function getProject(array $request, array $response = []): array
    {
        $url = 'projects/{project}';
        $project = $this->throwIfKeyIdMissing($request);

        return $this->client->get($this->buildUrl($url, ['project' => $project]), $response);
    }

    /**
     * @return Repository
     */
    public function repository(): Repository
    {
        return new Repository($this->client);
    }
}