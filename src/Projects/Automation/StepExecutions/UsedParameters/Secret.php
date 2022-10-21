<?php

namespace Swe\SpaceSDK\Projects\Automation\StepExecutions\UsedParameters;

use GuzzleHttp\Exception\GuzzleException;
use Swe\SpaceSDK\AbstractApi;

/**
 * Class Secret
 *
 * @package Swe\SpaceSDK\Projects\Automation\StepExecutions\UsedParameters
 * @author Luca Braun <l.braun@s-w-e.com>
 */
class Secret extends AbstractApi
{
    /**
     * @param string $secretId
     * @param array $response
     * @return array
     * @throws GuzzleException
     */
    public function getSecret(string $secretId, array $response = []): array
    {
        $uri = 'projects/automation/step-executions/used-parameters/secret/{secretId}';
        $uriArguments = [
            'secretId' => $secretId,
        ];

        return $this->client->get($this->buildUrl($uri, $uriArguments), $response);
    }
}