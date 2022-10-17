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
     * Permissions that may be checked: Automation.Execution.View
     *
     * @param string $jobId
     * @param array $request
     * @param array $response
     * @return array
     * @throws GuzzleException
     * @throws MissingArgumentException
     */
    public function getJob(string $jobId, array $request, array $response = []): array
    {
        $uri = 'projects/automation/jobs/{jobId}';
        $requiredFields = [
            'project' => self::TYPE_STRING,
        ];
        $this->throwIfInvalid($requiredFields, $request);
        $uriArguments = [
            'jobId' => $jobId,
        ];

        return $this->client->get($this->buildUrl($uri, $uriArguments), $response, $request);
    }

    /**
     * Start job. Returns ExecutionId.
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
     * @see GraphExecutions::getGraphExecution()
     */
    public function startJob(string $project, string $jobId, array $data, array $response = []): array
    {
        $uri = 'projects/{project}/automation/jobs/{jobId}/start';
        $requiredFields = [
            'branch' => [
                'branchName' => self::TYPE_STRING,
            ],
        ];
        $this->throwIfInvalid($requiredFields, $data);
        $uriArguments = [
            'project' => $project,
            'jobId' => $jobId,
        ];

        return $this->client->post($this->buildUrl($uri, $uriArguments), $data, $response);
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
    public function getAllJobs(string $project, array $request, array $response = []): array
    {
        $uri = 'projects/{project}/automation/jobs';
        $requiredFields = [
            'repoFilter' => self::TYPE_STRING,
            'branchFilter' => self::TYPE_STRING,
        ];
        $this->throwIfInvalid($requiredFields, $request);
        $uriArguments = [
            'project' => $project,
        ];

        return $this->client->get($this->buildUrl($uri, $uriArguments), $response, $request);
    }
}