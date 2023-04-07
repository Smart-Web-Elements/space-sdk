<?php

namespace Swe\SpaceSDK\Projects\Automation;

use GuzzleHttp\Exception\GuzzleException;
use Swe\SpaceSDK\AbstractApi;
use Swe\SpaceSDK\Exception\MissingArgumentException;
use Swe\SpaceSDK\Type;

/**
 * Class Jobs
 * Generated at 2023-04-07 02:00
 *
 * @package Swe\SpaceSDK\Projects\Automation
 * @author Luca Braun <l.braun@s-w-e.com>
 */
final class Jobs extends AbstractApi
{
    /**
     * Permissions that may be checked: Automation.Execution.View
     *
     * @param string $jobId
     * @param array $request
     * @param array $response
     * @return array|null
     * @throws GuzzleException
     * @throws MissingArgumentException
     */
    final public function getJob(string $jobId, array $request, array $response = []): ?array
    {
        $uri = 'projects/automation/jobs/{jobId}';
        $required = [
            'project' => Type::String,
        ];
        $this->throwIfInvalid($required, $request);
        $uriArguments = [
            'jobId' => $jobId,
        ];

        return $this->client->get($this->buildUrl($uri, $uriArguments), $request, $response);
    }

    /**
     * Start job. Returns ExecutionId, see projects/automation/graph-executions/{id}.
     *
     * Permissions that may be checked: Automation.Execution.Start
     *
     * @param string $project
     * @param string $jobId
     * @param array $data
     * @param array $response
     * @return array
     * @throws GuzzleException
     * @throws MissingArgumentException
     */
    final public function startJob(string $project, string $jobId, array $data, array $response = []): array
    {
        $uri = 'projects/{project}/automation/jobs/{jobId}/start';
        $required = [
            'branch' => [
                'branchName' => Type::String,
            ],
        ];
        $this->throwIfInvalid($required, $data);
        $uriArguments = [
            'project' => $project,
            'jobId' => $jobId,
        ];

        return $this->client->post($this->buildUrl($uri, $uriArguments), $data, [], $response);
    }

    /**
     * List jobs. Parameters are applied as 'AND' filters.
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
    final public function getAllJobs(string $project, array $request, array $response = []): array
    {
        $uri = 'projects/{project}/automation/jobs';
        $required = [
            'repoFilter' => Type::String,
            'branchFilter' => Type::String,
        ];
        $this->throwIfInvalid($required, $request);
        $uriArguments = [
            'project' => $project,
        ];

        return $this->client->get($this->buildUrl($uri, $uriArguments), $request, $response);
    }
}
