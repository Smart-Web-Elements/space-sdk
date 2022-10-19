<?php

namespace Swe\SpaceSDK\Projects\Automation;


use GuzzleHttp\Exception\GuzzleException;
use Swe\SpaceSDK\AbstractApi;
use Swe\SpaceSDK\Exception\MissingArgumentException;

/**
 * Class GraphExecutions
 *
 * @package Swe\SpaceSDK\Projects\Automation
 * @author Luca Braun <l.braun@s-w-e.com>
 */
class GraphExecutions extends AbstractApi
{
    /**
     * Stop execution by ExecutionId.
     *
     * Permissions that may be checked: Automation.Execution.Stop
     *
     * @param string $id
     * @throws GuzzleException
     */
    public function stopExecution(string $id): void
    {
        $uri = 'projects/automation/graph-executions/{id}/stop';
        $uriArguments = [
            'id' => $id,
        ];

        $this->client->post($this->buildUrl($uri, $uriArguments));
    }

    /**
     * Permissions that may be checked: Automation.Execution.View
     *
     * @param string $id
     * @param array $response
     * @return array
     * @throws GuzzleException
     */
    public function getGraphExecution(string $id, array $response = []): array
    {
        $uri = 'projects/automation/graph-executions/{id}';
        $uriArguments = [
            'id' => $id,
        ];

        return $this->client->get($this->buildUrl($uri, $uriArguments), $response);
    }

    /**
     * Search executions. Parameters are applied as 'AND' filters.
     *
     * Permissions that may be checked: Automation.Execution.View
     *
     * @param string $project
     * @param array $request
     * @param array $response
     * @return array
     * @throws GuzzleException
     * @throws MissingArgumentException
     */
    public function getAllGraphExecutions(string $project, array $request, array $response = []): array
    {
        $uri = 'projects/{project}/automation/graph-executions';
        $requiredFields = [
            'jobId' => self::TYPE_STRING,
        ];
        $this->throwIfInvalid($requiredFields, $request);
        $uriArguments = [
            'project' => $project,
        ];

        return $this->client->get($this->buildUrl($uri, $uriArguments), $response, $request);
    }
}