<?php

namespace Swe\SpaceSDK\Automation;


use GuzzleHttp\Exception\GuzzleException;
use Swe\SpaceSDK\AbstractApi;
use Swe\SpaceSDK\Exception\MissingArgumentException;

/**
 * Class Job
 *
 * @package Swe\SpaceSDK\Automation
 * @author Luca Braun <l.braun@s-w-e.com>
 */
class Job extends AbstractApi
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
        $url = 'projects/{project}/automation/jobs';
        $requiredFields = [
            'repoFilter' => 'string',
            'branchFilter' => 'string',
        ];

        $project = $this->throwIfKeyIdMissing($request);
        $this->throwIfInvalid($requiredFields, $request);

        return $this->client->get($this->buildUrl($url, ['project' => $project]), $response, $request);
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
        $url = 'projects/{project}/automation/jobs/{job}';
        $requiredFields = [
            'jobId' => 'string',
        ];

        $project = $this->throwIfKeyIdMissing($request);
        $this->throwIfInvalid($requiredFields, $request);
        $urlArguments = [
            'project' => $project,
            'job' => $request['jobId'],
        ];

        return $this->client->get($this->buildUrl($url, $urlArguments), $response);
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
     * @see GraphExecution::getGraphExecution()
     */
    public function startJob(array $data, array $response = []): array
    {
        $url = 'projects/{project}/automation/jobs/{jobId}/start';
        $requiredFields = [
            'jobId' => 'string',
            'branch' => [
                'branchName' => 'string',
            ],
        ];

        $project = $this->throwIfKeyIdMissing($data);
        $this->throwIfInvalid($requiredFields, $data);
        $urlArguments = [
            'project' => $project,
            'jobId' => $data['jobId'],
        ];

        return $this->client->post($this->buildUrl($url, $urlArguments), $data, $response);
    }
}