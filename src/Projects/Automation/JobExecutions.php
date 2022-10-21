<?php

namespace Swe\SpaceSDK\Projects\Automation;

use GuzzleHttp\Exception\GuzzleException;
use Swe\SpaceSDK\AbstractApi;

/**
 * Class JobExecutions
 *
 * @package Swe\SpaceSDK\Projects\Automation
 * @author Luca Braun <l.braun@s-w-e.com>
 */
class JobExecutions extends AbstractApi
{
    /**
     * Permissions that may be checked: Automation.Execution.View
     *
     * @param array $response
     * @return array
     * @throws GuzzleException
     */
    public function getCurrent(array $response = []): array
    {
        $uri = 'projects/automation/job-executions/current';

        return $this->client->get($this->buildUrl($uri), $response);
    }
}