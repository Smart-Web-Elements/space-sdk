<?php

namespace Swe\SpaceSDK\Projects\Automation;

use GuzzleHttp\Exception\GuzzleException;
use Swe\SpaceSDK\AbstractApi;

/**
 * Class JobExecutions
 * Generated at 2023-10-06 07:26
 *
 * @package Swe\SpaceSDK\Projects\Automation
 * @author Luca Braun <l.braun@s-w-e.com>
 */
final class JobExecutions extends AbstractApi
{
    /**
     * Returns the job execution associated to the currently authenticated principal. This endpoint can only be used with the credentials provided to an Automation job.
     *
     * Permissions that may be checked: Automation.Execution.View
     *
     * @param array $response
     * @return array
     * @throws GuzzleException
     * @deprecated This method is deprecated since 2023-08-08. Use projects/automation/graph-executions/{id} instead, and provide the graph execution ID
     */
    final public function getCurrent(array $response = []): array
    {
        $uri = 'projects/automation/job-executions/current';

        return $this->client->get($this->buildUrl($uri), [], $response);
    }
}
