<?php

namespace Swe\SpaceSDK\Projects\Automation;

use Swe\SpaceSDK\AbstractApi;
use Swe\SpaceSDK\Projects\Automation\StepExecutions\Parameters;
use Swe\SpaceSDK\Projects\Automation\StepExecutions\Secrets;
use Swe\SpaceSDK\Projects\Automation\StepExecutions\UsedParameters;

/**
 * Class StepExecutions
 * Generated at 2024-03-16 02:07
 *
 * @package Swe\SpaceSDK\Projects\Automation
 * @author Luca Braun <l.braun@s-w-e.com>
 */
final class StepExecutions extends AbstractApi
{
    /**
     * @return UsedParameters
     */
    final public function usedParameters(): UsedParameters
    {
        return new UsedParameters($this->client);
    }

    /**
     * @return Parameters
     */
    final public function parameters(): Parameters
    {
        return new Parameters($this->client);
    }

    /**
     * @return Secrets
     */
    final public function secrets(): Secrets
    {
        return new Secrets($this->client);
    }
}
