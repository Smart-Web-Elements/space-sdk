<?php

namespace Swe\SpaceSDK\Project\Automation;


use GuzzleHttp\Exception\GuzzleException;
use Swe\SpaceSDK\AbstractApi;
use Swe\SpaceSDK\Exception\MissingArgumentException;

/**
 * Class Jobs
 *
 * @package Swe\SpaceSDK\Project\Automation
 * @author Luca Braun <l.braun@s-w-e.com>
 */
class Jobs extends AbstractApi
{
    /**
     * List jobs. Parameters are applied as 'AND' filters.
     *
     * Permissions that may be checked: Automation.Execution.View
     *
     * @param array $request
     * @param array $response
     * @return array
     * @throws GuzzleException
     * @throws MissingArgumentException
     */
    public function getAllJobs(array $request, array $response = []): array
    {
        $uri = 'projects/{project}/automation/jobs';
        $requiredFields = [
            'repoFilter' => 'string',
            'branchFilter' => 'string',
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
    public function getJob(array $request, array $response = []): array
    {
        $uri = 'projects/{project}/automation/jobs/{job}';
        $requiredFields = [
            'jobId' => 'string',
        ];

        $missing = [
            'key',
            'id',
        ];
        $project = $this->throwIfMissing($missing, $request);
        $this->throwIfInvalid($requiredFields, $request);
        $uriArguments = [
            'project' => $project,
            'job' => $request['jobId'],
        ];

        return $this->client->get($this->buildUrl($uri, $uriArguments), $response);
    }

    /**
     * Start job. Returns ExecutionId.
     *
     * Permissions that may be checked: Automation.Execution.Start
     *
     * @param array $data
     * @param array $response
     * @return array
     * @throws GuzzleException
     * @throws MissingArgumentException
     * @see GraphExecutions::getGraphExecution()
     */
    public function startJob(array $data, array $response = []): array
    {
        $uri = 'projects/{project}/automation/jobs/{jobId}/start';
        $requiredFields = [
            'jobId' => 'string',
            'branch' => [
                'branchName' => 'string',
            ],
        ];

        $missing = [
            'key',
            'id',
        ];
        $project = $this->throwIfMissing($missing, $data);
        $this->throwIfInvalid($requiredFields, $data);
        $uriArguments = [
            'project' => $project,
            'jobId' => $data['jobId'],
        ];

        return $this->client->post($this->buildUrl($uri, $uriArguments), $data, $response);
    }
}