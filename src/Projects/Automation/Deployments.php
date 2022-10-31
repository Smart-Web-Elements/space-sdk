<?php

namespace Swe\SpaceSDK\Projects\Automation;

use GuzzleHttp\Exception\GuzzleException;
use Swe\SpaceSDK\AbstractApi;
use Swe\SpaceSDK\Exception\MissingArgumentException;
use Swe\SpaceSDK\Type;

/**
 * Class Deployments
 *
 * @package Swe\SpaceSDK\Projects\Automation
 * @author Luca Braun <l.braun@s-w-e.com>
 */
final class Deployments extends AbstractApi
{
    /**
     * Permissions that may be checked: Project.Deployments.Modify
     *
     * @param array $project
     * @param array $data
     * @param array $response
     * @return array
     * @throws GuzzleException
     * @throws MissingArgumentException
     */
    final public function fail(array $project, array $data, array $response = []): array
    {
        $uri = 'projects/{project}/automation/deployments/fail';
        $required = [
            'targetIdentifier' => Type::Array,
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
     * @param array $project
     * @param array $data
     * @param array $response
     * @return array
     * @throws GuzzleException
     * @throws MissingArgumentException
     */
    final public function finish(array $project, array $data, array $response = []): array
    {
        $uri = 'projects/{project}/automation/deployments/finish';
        $required = [
            'targetIdentifier' => Type::Array,
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
     * @param array $project
     * @param array $data
     * @param array $response
     * @return array
     * @throws GuzzleException
     * @throws MissingArgumentException
     */
    final public function schedule(array $project, array $data, array $response = []): array
    {
        $uri = 'projects/{project}/automation/deployments/schedule';
        $required = [
            'targetIdentifier' => Type::Array,
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
     * @param array $project
     * @param array $data
     * @param array $response
     * @return array
     * @throws GuzzleException
     * @throws MissingArgumentException
     */
    final public function start(array $project, array $data, array $response = []): array
    {
        $uri = 'projects/{project}/automation/deployments/start';
        $required = [
            'targetIdentifier' => Type::Array,
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
     * @param array $project
     * @param array $request
     * @param array $response
     * @return array
     * @throws GuzzleException
     */
    final public function list(array $project, array $request = [], array $response = []): array
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
     * @param array $project
     * @param array $targetIdentifier
     * @param array $deploymentIdentifier
     * @param array $response
     * @return array
     * @throws GuzzleException
     */
    final public function get(
        array $project,
        array $targetIdentifier,
        array $deploymentIdentifier,
        array $response = [],
    ): array {
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
     * @param array $project
     * @param array $data
     * @param array $response
     * @return array
     * @throws GuzzleException
     * @throws MissingArgumentException
     */
    final public function update(array $project, array $data, array $response = []): array
    {
        $uri = 'projects/{project}/automation/deployments';
        $required = [
            'targetIdentifier' => Type::Array,
            'deploymentIdentifier' => Type::Array,
        ];
        $this->throwIfInvalid($required, $data);
        $uriArguments = [
            'project' => $project,
        ];

        return $this->client->put($this->buildUrl($uri, $uriArguments), $data, [], $response);
    }

    /**
     * Permissions that may be checked: Project.Deployments.Modify
     *
     * @param array $project
     * @param array $targetIdentifier
     * @param array $deploymentIdentifier
     * @return void
     * @throws GuzzleException
     */
    final public function delete(array $project, array $targetIdentifier, array $deploymentIdentifier): void
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
