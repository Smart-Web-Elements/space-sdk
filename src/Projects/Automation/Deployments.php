<?php

namespace Swe\SpaceSDK\Projects\Automation;

use GuzzleHttp\Exception\GuzzleException;
use Swe\SpaceSDK\AbstractApi;
use Swe\SpaceSDK\Exception\MissingArgumentException;

/**
 * Class Deployments
 *
 * @package Swe\SpaceSDK\Projects\Automation
 * @author Luca Braun <l.braun@s-w-e.com>
 */
class Deployments extends AbstractApi
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
    public function fail(string $project, array $data, array $response = []): array
    {
        $uri = 'projects/{project}/automation/deployments/fail';
        $required = [
            'targetIdentifier' => self::TYPE_STRING,
        ];
        $this->throwIfInvalid($required, $data);
        $uriArguments = [
            'project' => $project,
        ];

        return $this->client->post($this->buildUrl($uri, $uriArguments), $data, $response);
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
    public function finish(string $project, array $data, array $response = []): array
    {
        $uri = 'projects/{project}/automation/deployments/finish';
        $required = [
            'targetIdentifier' => self::TYPE_STRING,
        ];
        $this->throwIfInvalid($required, $data);
        $uriArguments = [
            'project' => $project,
        ];

        return $this->client->post($this->buildUrl($uri, $uriArguments), $data, $response);
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
    public function schedule(string $project, array $data, array $response = []): array
    {
        $uri = 'projects/{project}/automation/deployments/schedule';
        $required = [
            'targetIdentifier' => self::TYPE_STRING,
        ];
        $this->throwIfInvalid($required, $data);
        $uriArguments = [
            'project' => $project,
        ];

        return $this->client->post($this->buildUrl($uri, $uriArguments), $data, $response);
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
    public function start(string $project, array $data, array $response = []): array
    {
        $uri = 'projects/{project}/automation/deployments/start';
        $required = [
            'targetIdentifier' => self::TYPE_STRING,
        ];
        $this->throwIfInvalid($required, $data);
        $uriArguments = [
            'project' => $project,
        ];

        return $this->client->post($this->buildUrl($uri, $uriArguments), $data, $response);
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
    public function list(string $project, array $request = [], array $response = []): array
    {
        $uri = 'projects/{project}/automation/deployments';
        $uriArguments = [
            'project' => $project,
        ];

        return $this->client->get($this->buildUrl($uri, $uriArguments), $response, $request);
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
    public function get(
        string $project,
        string $targetIdentifier,
        string $deploymentIdentifier,
        array $response = []
    ): array {
        $uri = 'projects/{project}/automation/deployments/{targetIdentifier}/{deploymentIdentifier}';
        $uriArguments = [
            'project' => $project,
            'targetIdentifier' => $targetIdentifier,
            'deploymentIdentifier' => $deploymentIdentifier,
        ];

        return $this->client->get($this->buildUrl($uri, $uriArguments), $response);
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
    public function update(string $project, array $data, array $response = []): array
    {
        $uri = 'projects/{project}/automation/deployments';
        $required = [
            'targetIdentifier' => self::TYPE_STRING,
            'deploymentIdentifier' => self::TYPE_STRING,
        ];
        $this->throwIfInvalid($required, $data);
        $uriArguments = [
            'project' => $project,
        ];

        return $this->client->put($this->buildUrl($uri, $uriArguments), $data, $response);
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
    public function delete(string $project, string $targetIdentifier, string $deploymentIdentifier): void
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