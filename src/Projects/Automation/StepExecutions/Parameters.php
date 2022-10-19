<?php

namespace Swe\SpaceSDK\Projects\Automation\StepExecutions;

use GuzzleHttp\Exception\GuzzleException;
use Swe\SpaceSDK\AbstractApi;
use Swe\SpaceSDK\Exception\MissingArgumentException;

/**
 * Class Parameters
 *
 * @package Swe\SpaceSDK\Projects\Automation\StepExecutions
 * @author Luca Braun <l.braun@s-w-e.com>
 */
class Parameters extends AbstractApi
{
    /**
     * @param string $stepExecId
     * @param string $key
     * @return string|null
     * @throws GuzzleException
     */
    public function getParameter(string $stepExecId, string $key): ?string
    {
        $uri = 'projects/automation/step-executions/{stepExecId}/parameters/{key}';
        $uriArguments = [
            'stepExecId' => $stepExecId,
            'key' => $key,
        ];

        return $this->client->get($this->buildUrl($uri, $uriArguments))[0];
    }

    /**
     * @param string $stepExecId
     * @param string $key
     * @param array $data
     * @return void
     * @throws GuzzleException
     * @throws MissingArgumentException
     */
    public function updateParameter(string $stepExecId, string $key, array $data): void
    {
        $uri = 'projects/automation/step-executions/{stepExecId}/parameters/{key}';
        $required = [
            'value' => self::TYPE_STRING,
        ];
        $this->throwIfInvalid($required, $data);
        $uriArguments = [
            'stepExecId' => $stepExecId,
            'key' => $key,
        ];

        $this->client->patch($this->buildUrl($uri, $uriArguments), $data);
    }

    /**
     * @param string $stepExecId
     * @param string $key
     * @return void
     * @throws GuzzleException
     */
    public function deleteParameter(string $stepExecId, string $key): void
    {
        $uri = 'projects/automation/step-executions/{stepExecId}/parameters/{key}';
        $uriArguments = [
            'stepExecId' => $stepExecId,
            'key' => $key,
        ];

        $this->client->delete($this->buildUrl($uri, $uriArguments));
    }
}