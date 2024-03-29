<?php

namespace Swe\SpaceSDK\Projects\Automation;

use GuzzleHttp\Exception\GuzzleException;
use Swe\SpaceSDK\AbstractApi;
use Swe\SpaceSDK\Exception\MissingArgumentException;
use Swe\SpaceSDK\Projects\Automation\DeploymentTargets\AuditLog;
use Swe\SpaceSDK\Type;

/**
 * Class DeploymentTargets
 * Generated at 2024-03-16 02:07
 *
 * @package Swe\SpaceSDK\Projects\Automation
 * @author Luca Braun <l.braun@s-w-e.com>
 */
final class DeploymentTargets extends AbstractApi
{
    /**
     * Permissions that may be checked: Project.Deployments.View
     *
     * @param array $data
     * @param array $response
     * @return array
     * @throws GuzzleException
     * @throws MissingArgumentException
     */
    final public function search(array $data, array $response = []): array
    {
        $uri = 'projects/automation/deployment-targets/search';
        $required = [
            'expression' => [
                'filters' => Type::Array,
            ],
        ];
        $this->throwIfInvalid($required, $data);

        return $this->client->post($this->buildUrl($uri), $data, [], $response);
    }

    /**
     * Permissions that may be checked: Project.Deployments.View
     *
     * @param array $request
     * @param array $response
     * @return array
     * @throws GuzzleException
     */
    final public function getAllDeploymentTargets(array $request = [], array $response = []): array
    {
        $uri = 'projects/automation/deployment-targets';

        return $this->client->get($this->buildUrl($uri), $request, $response);
    }

    /**
     * Permissions that may be checked: Project.Deployments.View
     *
     * @param string $fullNumberId
     * @param array $response
     * @return array
     * @throws GuzzleException
     */
    final public function get(string $fullNumberId, array $response = []): array
    {
        $uri = 'projects/automation/deployment-targets/{fullNumberId}';
        $uriArguments = [
            'fullNumberId' => $fullNumberId,
        ];

        return $this->client->get($this->buildUrl($uri, $uriArguments), [], $response);
    }

    /**
     * @return AuditLog
     */
    final public function auditLog(): AuditLog
    {
        return new AuditLog($this->client);
    }

    /**
     * Permissions that may be checked: Project.Deployments.Targets.Modify
     *
     * @param string $project
     * @param array $data
     * @param array $response
     * @return array
     * @throws GuzzleException
     * @throws MissingArgumentException
     */
    final public function create(string $project, array $data, array $response = []): array
    {
        $uri = 'projects/{project}/automation/deployment-targets';
        $required = [
            'key' => Type::String,
            'name' => Type::String,
            'description' => Type::String,
        ];
        $this->throwIfInvalid($required, $data);
        $uriArguments = [
            'project' => $project,
        ];

        return $this->client->post($this->buildUrl($uri, $uriArguments), $data, [], $response);
    }

    /**
     * Permissions that may be checked: Project.Deployments.View
     *
     * @param string $project
     * @param array $request
     * @param array $response
     * @return array
     * @throws GuzzleException
     * @deprecated This method is deprecated since 2023-02-28. Use GET projects/automation/deployment-targets`
     */
    final public function list(string $project, array $request = [], array $response = []): array
    {
        $uri = 'projects/{project}/automation/deployment-targets';
        $uriArguments = [
            'project' => $project,
        ];

        return $this->client->get($this->buildUrl($uri, $uriArguments), $request, $response);
    }

    /**
     * Permissions that may be checked: Project.Deployments.View
     *
     * @param string $project
     * @param array $request
     * @param array $response
     * @return array
     * @throws GuzzleException
     */
    final public function listFavorites(string $project, array $request = [], array $response = []): array
    {
        $uri = 'projects/{project}/automation/deployment-targets/favorites';
        $uriArguments = [
            'project' => $project,
        ];

        return $this->client->get($this->buildUrl($uri, $uriArguments), $request, $response);
    }

    /**
     * @param string $project
     * @param string $target
     * @param array $data
     * @return void
     * @throws GuzzleException
     */
    final public function update(string $project, string $target, array $data = []): void
    {
        $uri = 'projects/{project}/automation/deployment-targets/{target}';
        $uriArguments = [
            'project' => $project,
            'target' => $target,
        ];

        $this->client->patch($this->buildUrl($uri, $uriArguments), $data);
    }

    /**
     * Permissions that may be checked: Project.Deployments.Targets.Modify
     *
     * @param string $project
     * @param string $target
     * @return void
     * @throws GuzzleException
     */
    final public function delete(string $project, string $target): void
    {
        $uri = 'projects/{project}/automation/deployment-targets/{target}';
        $uriArguments = [
            'project' => $project,
            'target' => $target,
        ];

        $this->client->delete($this->buildUrl($uri, $uriArguments));
    }
}
