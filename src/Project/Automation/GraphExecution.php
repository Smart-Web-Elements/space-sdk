<?php

namespace Swe\SpaceSDK\Project\Automation;


use GuzzleHttp\Exception\GuzzleException;
use Swe\SpaceSDK\AbstractApi;
use Swe\SpaceSDK\Exception\MissingArgumentException;

/**
 * Class GraphExecution
 *
 * @package Swe\SpaceSDK\Project\Automation
 * @author Luca Braun <l.braun@s-w-e.com>
 */
class GraphExecution extends AbstractApi
{
    /**
     * Search executions. Parameters are applied as 'AND' filters.
     *
     * Permissions that may be checked: Automation.Execution.View
     *
     * @param array $request
     * @param array $response
     * @return array
     * @throws GuzzleException
     * @throws MissingArgumentException
     */
    public function getAllGraphExecutions(array $request, array $response = []): array
    {
        $uri = 'projects/{project}/automation/graph-executions';
        $requiredFields = [
            'jobId' => 'string',
        ];

        $missing = [
            'key',
            'id',
        ];
        $project = $this->throwIfMissing($missing, $request);
        $this->throwIfInvalid($requiredFields, $request);

        return $this->client->get($this->buildUrl($uri, ['project' => $project]), $response, $request);
    }

    /**
     * Permissions that may be checked: Automation.Execution.View
     *
     * @param array $request
     * @param array $response
     * @return array
     * @throws GuzzleException
     * @throws MissingArgumentException
     */
    public function getGraphExecution(array $request, array $response = []): array
    {
        $uri = 'projects/automation/graph-executions/{id}';
        $requiredFields = [
            'id' => 'string',
        ];

        $this->throwIfInvalid($requiredFields, $request);
        $id = $request['id'];

        return $this->client->get($this->buildUrl($uri, ['id' => $id]), $response);
    }

    /**
     * Stop execution by ExecutionId.
     *
     * Permissions that may be checked: Automation.Execution.Stop
     *
     * @param array $data
     * @throws GuzzleException
     * @throws MissingArgumentException
     */
    public function stopExecution(array $data): void
    {
        $uri = 'projects/automation/graph-executions/{id}/stop';
        $requiredFields = [
            'id' => 'string',
        ];

        $this->throwIfInvalid($requiredFields, $data);
        $id = $data['id'];
        $this->client->get($this->buildUrl($uri, ['id' => $id]));
    }
}