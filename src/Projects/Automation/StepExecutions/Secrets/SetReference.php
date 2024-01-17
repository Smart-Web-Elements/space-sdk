<?php

namespace Swe\SpaceSDK\Projects\Automation\StepExecutions\Secrets;

use GuzzleHttp\Exception\GuzzleException;
use Swe\SpaceSDK\AbstractApi;
use Swe\SpaceSDK\Exception\MissingArgumentException;
use Swe\SpaceSDK\Type;

/**
 * Class SetReference
 * Generated at 2024-01-17 02:00
 *
 * @package Swe\SpaceSDK\Projects\Automation\StepExecutions\Secrets
 * @author Luca Braun <l.braun@s-w-e.com>
 */
final class SetReference extends AbstractApi
{
    /**
     * @param string $stepExecId
     * @param string $key
     * @param array $data
     * @return void
     * @throws GuzzleException
     * @throws MissingArgumentException
     */
    final public function update(string $stepExecId, string $key, array $data): void
    {
        $uri = 'projects/automation/step-executions/{stepExecId}/secrets/{key}/set-reference';
        $required = [
            'reference' => Type::String,
        ];
        $this->throwIfInvalid($required, $data);
        $uriArguments = [
            'stepExecId' => $stepExecId,
            'key' => $key,
        ];

        $this->client->patch($this->buildUrl($uri, $uriArguments), $data);
    }
}
