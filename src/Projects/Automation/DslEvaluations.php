<?php

namespace Swe\SpaceSDK\Projects\Automation;

use GuzzleHttp\Exception\GuzzleException;
use Swe\SpaceSDK\AbstractApi;

/**
 * Class DslEvaluations
 * Generated at 2024-03-16 02:07
 *
 * @package Swe\SpaceSDK\Projects\Automation
 * @author Luca Braun <l.braun@s-w-e.com>
 */
final class DslEvaluations extends AbstractApi
{
    /**
     * @param array $response
     * @return array
     * @throws GuzzleException
     */
    final public function getDslEvaluationConfiguration(array $response = []): array
    {
        $uri = 'projects/automation/dsl-evaluations/config';

        return $this->client->get($this->buildUrl($uri), [], $response);
    }
}
