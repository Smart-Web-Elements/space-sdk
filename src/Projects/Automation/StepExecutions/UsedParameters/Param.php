<?php

namespace Swe\SpaceSDK\Projects\Automation\StepExecutions\UsedParameters;

use GuzzleHttp\Exception\GuzzleException;
use Swe\SpaceSDK\AbstractApi;

/**
 * Class Param
 *
 * @package Swe\SpaceSDK\Projects\Automation\StepExecutions\UsedParameters
 * @author Luca Braun <l.braun@s-w-e.com>
 */
class Param extends AbstractApi
{
    /**
     * @param string $parameterId
     * @param array $response
     * @return array
     * @throws GuzzleException
     */
    public function getParam(string $parameterId, array $response = []): array
    {
        $uri = 'projects/automation/step-executions/used-parameters/param/{parameterId}';
        $uriArguments = [
            'parameterId' => $parameterId,
        ];

        return $this->client->get($this->buildUrl($uri, $uriArguments), $response);
    }
}