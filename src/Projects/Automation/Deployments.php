<?php

namespace Swe\SpaceSDK\Projects\Automation;

use GuzzleHttp\Exception\GuzzleException;
use Swe\SpaceSDK\AbstractApi;
use Swe\SpaceSDK\Exception\MissingArgumentException;
use Swe\SpaceSDK\Type;

/**
 * Class Deployments
 * Generated at 2023-08-19 02:00
 *
 * @package Swe\SpaceSDK\Projects\Automation
 * @author Luca Braun <l.braun@s-w-e.com>
 */
final class Deployments extends AbstractApi
{
    /**
     * Permissions that may be checked: Project.Deployments.Modify
     *
     * @param string $project
     * @param array $data
     * @param array $response
     * @return array
     * @throws GuzzleException
     * @throws MissingArgumentException
     */
    final public function fail(string $project, array $data, array $response = []): array
    {
        $uri = 'projects/{project}/automation/deployments/fail';
        $required = [
            'targetIdentifier' => Type::String,
        ];
        $this->throwIfInvalid($required, $data);
        $uriArguments = [
            'project' => $project,
        ];

        return $this->client->post($this->buildUrl($uri, $uriArguments), $data, [], $response);
    }

    /**
     * Permissions that may be checked: Project.Deployments.Modify
     *
     * @param string $project
     * @param array $data
     * @param array $response
     * @return array
     * @throws GuzzleException
     * @throws MissingArgumentException
     */
    final public function finish(string $project, array $data, array $response = []): array
    {
        $uri = 'projects/{project}/automation/deployments/finish';
        $required = [
            'targetIdentifier' => Type::String,
        ];
        $this->throwIfInvalid($required, $data);
        $uriArguments = [
            'project' => $project,
        ];

        return $this->client->post($this->buildUrl($uri, $uriArguments), $data, [], $response);
    }

    /**
     * Permissions that may be checked: Project.Deployments.Modify
     *
     * @param string $project
     * @param array $data
     * @param array $response
     * @return array
     * @throws GuzzleException
     * @throws MissingArgumentException
     */
    final public function schedule(string $project, array $data, array $response = []): array
    {
        $uri = 'projects/{project}/automation/deployments/schedule';
        $required = [
            'targetIdentifier' => Type::String,
        ];
        $this->throwIfInvalid($required, $data);
        $uriArguments = [
            'project' => $project,
        ];

        return $this->client->post($this->buildUrl($uri, $uriArguments), $data, [], $response);
    }

    /**
     * Permissions that may be checked: Project.Deployments.Modify
     *
     * @param string $project
     * @param array $data
     * @param array $response
     * @return array
     * @throws GuzzleException
     * @throws MissingArgumentException
     */
    final public function start(string $project, array $data, array $response = []): array
    {
        $uri = 'projects/{project}/automation/deployments/start';
        $required = [
            'targetIdentifier' => Type::String,
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
     */
    final public function list(string $project, array $request = [], array $response = []): array
    {
        $uri = 'projects/{project}/automation/deployments';
        $uriArguments = [
            'project' => $project,
        ];

        return $this->client->get($this->buildUrl($uri, $uriArguments), $request, $response);
    }

    /**
     * Permissions that may be checked: Project.Deployments.View
     *
     * @param string $project
     * @param string $targetIdentifier
     * @param string $deploymentIdentifier
     * @param array $response
     * @return array
     * @throws GuzzleException
     */
    final public function get(
        string $project,
        string $targetIdentifier,
        string $deploymentIdentifier,
        array $response = [],
    ): array
    {
        $uri = 'projects/{project}/automation/deployments/{targetIdentifier}/{deploymentIdentifier}';
        $uriArguments = [
            'project' => $project,
            'targetIdentifier' => $targetIdentifier,
            'deploymentIdentifier' => $deploymentIdentifier,
        ];

        return $this->client->get($this->buildUrl($uri, $uriArguments), [], $response);
    }

    /**
     * Permissions that may be checked: Project.Deployments.Modify
     *
     * @param string $project
     * @param array $data
     * @param array $response
     * @return array
     * @throws GuzzleException
     * @throws MissingArgumentException
     */
    final public function update(string $project, array $data, array $response = []): array
    {
        $uri = 'projects/{project}/automation/deployments';
        $required = [
            'targetIdentifier' => Type::String,
            'deploymentIdentifier' => Type::String,
        ];
        $this->throwIfInvalid($required, $data);
        $uriArguments = [
            'project' => $project,
        ];

        return $this->client->patch($this->buildUrl($uri, $uriArguments), $data, [], $response);
    }

    /**
     * Permissions that may be checked: Project.Deployments.Modify
     *
     * @param string $project
     * @param string $targetIdentifier
     * @param string $deploymentIdentifier
     * @return void
     * @throws GuzzleException
     */
    final public function delete(string $project, string $targetIdentifier, string $deploymentIdentifier): void
    {
        $uri = 'projects/{project}/automation/deployments/{targetIdentifier}/{deploymentIdentifier}';
        $uriArguments = [
            'project' => $project,
            'targetIdentifier' => $targetIdentifier,
            'deploymentIdentifier' => $deploymentIdentifier,
        ];

        $this->client->delete($this->buildUrl($uri, $uriArguments));
    }
}
