<?php

namespace Swe\SpaceSDK;


use GuzzleHttp\Exception\GuzzleException;
use Swe\SpaceSDK\Exception\MissingArgumentException;
use Swe\SpaceSDK\Project\Automation;
use Swe\SpaceSDK\Project\PrivateProjects;
use Swe\SpaceSDK\Project\Repositories;
use Swe\SpaceSDK\Project\Secrets;
use Swe\SpaceSDK\Project\Tags;

/**
 * Class Project
 *
 * @package Swe\SpaceSDK
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
        $uri = 'projects';
        $required = [
            'key' => [
                'key' => self::TYPE_STRING,
            ],
            'name' => self::TYPE_STRING,
        ];
        $this->throwIfInvalid($required, $data);

        return $this->client->post($this->buildUrl($uri), $data, $response);
    }

    /**
     * Get/search all projects. Parameters are applied as 'AND' filters.
     *
     * Permissions that may be checked: Project.View
     *
     * @param array $request
     * @param array $response
     * @return array
     * @throws GuzzleException
     */
    public function getAllProjects(array $request = [], array $response = []): array
    {
        $uri = 'projects';

        return $this->client->get($this->buildUrl($uri), $request, $response);
    }

    /**
     * Get all projects in which given user is collaborator.
     *
     * Permissions that may be checked: Project.View
     *
     * @param string $profile
     * @param array $request
     * @param array $response
     * @return array
     * @throws GuzzleException
     */
    public function getAllProjectsByCollaborator(string $profile, array $request = [], array $response = []): array
    {
        $uri = 'projects/collaborator:{profile}';
        $uriArguments = [
            'profile' => $profile,
        ];

        return $this->client->get($this->buildUrl($uri, $uriArguments), $request, $response);
    }

    /**
     * Get all projects for a member.
     *
     * Permissions that may be checked: Project.View
     *
     * @param string $member
     * @param array $request
     * @param array $response
     * @return array
     * @throws GuzzleException
     */
    public function getAllProjectsByMember(string $member, array $request = [], array $response = []): array
    {
        $uri = 'projects/member:{member}';
        $uriArguments = [
            'member' => $member,
        ];

        return $this->client->get($this->buildUrl($uri, $uriArguments), $request, $response);
    }

    /**
     * Permissions that may be checked: Project.View
     *
     * @param string $rightCode
     * @param array $request
     * @param array $response
     * @return array
     * @throws GuzzleException
     */
    public function getAllProjectsWithRight(string $rightCode, array $request = [], array $response = []): array
    {
        $uri = 'projects/right-code:{rightCode}';
        $uriArguments = [
            'rightCode' => $rightCode,
        ];

        return $this->client->get($this->buildUrl($uri, $uriArguments), $request, $response);
    }

    /**
     * Permissions that may be checked: Project.View
     *
     * @param string $right
     * @param array $request
     * @param array $response
     * @return array
     * @throws GuzzleException
     */
    public function getAllProjectsWithRightCode(string $right, array $request = [], array $response = []): array
    {
        $uri = 'projects/right-unique-code:{right}';
        $uriArguments = [
            'right' => $right,
        ];

        return $this->client->get($this->buildUrl($uri, $uriArguments), $request, $response);
    }

    /**
     * Get all projects for a team.
     *
     * Permissions that may be checked: Project.View
     *
     * @param string $team
     * @param array $request
     * @param array $response
     * @return array
     * @throws GuzzleException
     */
    public function getAllProjectsByTeam(string $team, array $request = [], array $response = []): array
    {
        $uri = 'projects/team:{team}';
        $uriArguments = [
            'team' => $team,
        ];

        return $this->client->get($this->buildUrl($uri, $uriArguments), $request, $response);
    }

    /**
     * Get project by ID or project key.
     *
     * Permissions that may be checked: Project.View
     *
     * @param string $project
     * @param array $response
     * @return array
     * @throws GuzzleException
     */
    public function getProject(string $project, array $response = []): array
    {
        $uri = 'projects/{project}';
        $uriArguments = [
            'project' => $project,
        ];

        return $this->client->get($this->buildUrl($uri, $uriArguments), $response);
    }

    /**
     * Update an existing project. Optional parameters will be ignored when not specified and updated otherwise.
     *
     * Permissions that may be checked: Project.Admin
     *
     * @param string $project
     * @param array $data
     * @param array $response
     * @return array
     * @throws GuzzleException
     */
    public function updateProject(string $project, array $data, array $response = []): array
    {
        $uri = 'projects/{project}';
        $uriArguments = [
            'project' => $project,
        ];

        return $this->client->patch($this->buildUrl($uri, $uriArguments), $data, $response);
    }

    /**
     * Delete a project.
     *
     * Permissions that may be checked: Project.Admin
     *
     * @param string $project
     * @return bool
     * @throws GuzzleException
     */
    public function deleteProject(string $project): bool
    {
        $uri = 'projects/{project}';
        $uriArguments = [
            'project' => $project,
        ];

        return $this->client->delete($this->buildUrl($uri, $uriArguments));
    }

    /**
     * @return Repositories
     */
    public function repositories(): Repositories
    {
        return new Repositories($this->client);
    }

    /**
     * @return Automation
     */
    public function automation(): Automation
    {
        return new Automation($this->client);
    }

    /**
     * @return PrivateProjects
     */
    public function privateProjects(): PrivateProjects
    {
        return new PrivateProjects($this->client);
    }

    /**
     * @return Secrets
     */
    public function secrets(): Secrets
    {
        return new Secrets($this->client);
    }

    /**
     * @return Tags
     */
    public function tags(): Tags
    {
        return new Tags($this->client);
    }
}