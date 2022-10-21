<?php

namespace Swe\SpaceSDK;


use GuzzleHttp\Exception\GuzzleException;
use Swe\SpaceSDK\Exception\MissingArgumentException;
use Swe\SpaceSDK\Projects\Access;
use Swe\SpaceSDK\Projects\Automation;
use Swe\SpaceSDK\Projects\CodeReviews;
use Swe\SpaceSDK\Projects\Documents;
use Swe\SpaceSDK\Projects\Packages;
use Swe\SpaceSDK\Projects\Params;
use Swe\SpaceSDK\Projects\Planning;
use Swe\SpaceSDK\Projects\PrivateProjects;
use Swe\SpaceSDK\Projects\Repositories;
use Swe\SpaceSDK\Projects\Responsibilities;
use Swe\SpaceSDK\Projects\Secrets;
use Swe\SpaceSDK\Projects\Tags;
use Swe\SpaceSDK\Projects\Topics;
use Swe\SpaceSDK\Projects\Vault;

/**
 * Class Projects
 *
 * @package Swe\SpaceSDK
 * @author Luca Braun <l.braun@s-w-e.com>
 */
class Projects extends AbstractApi
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
     * @return void
     * @throws GuzzleException
     */
    public function deleteProject(string $project): void
    {
        $uri = 'projects/{project}';
        $uriArguments = [
            'project' => $project,
        ];

        $this->client->delete($this->buildUrl($uri, $uriArguments));
    }

    /**
     * @return Access
     */
    public function access(): Access
    {
        return new Access($this->client);
    }

    /**
     * @return Automation
     */
    public function automation(): Automation
    {
        return new Automation($this->client);
    }

    /**
     * @return CodeReviews
     */
    public function codeReviews(): CodeReviews
    {
        return new CodeReviews($this->client);
    }

    /**
     * @return Documents
     */
    public function documents(): Documents
    {
        return new Documents($this->client);
    }

    /**
     * @return Packages
     */
    public function packages(): Packages
    {
        return new Packages($this->client);
    }

    /**
     * @return Params
     */
    public function params(): Params
    {
        return new Params($this->client);
    }

    /**
     * @return Planning
     */
    public function planning(): Planning
    {
        return new Planning($this->client);
    }

    /**
     * @return PrivateProjects
     */
    public function privateProjects(): PrivateProjects
    {
        return new PrivateProjects($this->client);
    }

    /**
     * @return Repositories
     */
    public function repositories(): Repositories
    {
        return new Repositories($this->client);
    }

    /**
     * @return Responsibilities
     */
    public function responsibilities(): Responsibilities
    {
        return new Responsibilities($this->client);
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

    /**
     * @return Topics
     */
    public function topics(): Topics
    {
        return new Topics($this->client);
    }

    /**
     * @return Vault
     */
    public function vault(): Vault
    {
        return new Vault($this->client);
    }
}