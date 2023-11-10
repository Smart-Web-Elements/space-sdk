<?php

namespace Swe\SpaceSDK\Projects\Automation;

use GuzzleHttp\Exception\GuzzleException;
use Swe\SpaceSDK\AbstractApi;
use Swe\SpaceSDK\Exception\MissingArgumentException;
use Swe\SpaceSDK\Type;

/**
 * Class GraphExecutions
 * Generated at 2023-11-10 04:08
 *
 * @package Swe\SpaceSDK\Projects\Automation
 * @author Luca Braun <l.braun@s-w-e.com>
 */
final class GraphExecutions extends AbstractApi
{
    /**
     * Stop execution by ExecutionId
     *
     * Permissions that may be checked: Automation.Execution.Stop
     *
     * @param string $id
     * @return void
     * @throws GuzzleException
     */
    final public function stopExecution(string $id): void
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
     * @return array|null
     * @throws GuzzleException
     */
    final public function getGraphExecution(string $id, array $response = []): ?array
    {
        $uri = 'projects/automation/graph-executions/{id}';
        $uriArguments = [
            'id' => $id,
        ];

        return $this->client->get($this->buildUrl($uri, $uriArguments), [], $response);
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
    final public function getAllGraphExecutions(string $project, array $request, array $response = []): array
    {
        $uri = 'projects/{project}/automation/graph-executions';
        $required = [
            'jobId' => Type::String,
        ];
        $this->throwIfInvalid($required, $request);
        $uriArguments = [
            'project' => $project,
        ];

        return $this->client->get($this->buildUrl($uri, $uriArguments), $request, $response);
    }
}
