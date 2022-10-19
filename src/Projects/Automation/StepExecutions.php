<?php

namespace Swe\SpaceSDK\Projects\Automation;

use Swe\SpaceSDK\AbstractApi;
use Swe\SpaceSDK\Projects\Automation\StepExecutions\Parameters;
use Swe\SpaceSDK\Projects\Automation\StepExecutions\UsedParameters;

/**
 * Class StepExecutions
 *
 * @package Swe\SpaceSDK\Projects\Automation
 * @author Luca Braun <l.braun@s-w-e.com>
 */
class StepExecutions extends AbstractApi
{
    /**
     * @return Parameters
     */
    public function parameters(): Parameters
    {
        return new Parameters($this->client);
    }

    /**
     * @return UsedParameters
     */
    public function usedParameters(): UsedParameters
    {
        return new UsedParameters($this->client);
    }
}