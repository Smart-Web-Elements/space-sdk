<?php

namespace Swe\SpaceSDK\Projects\Automation\StepExecutions;

use Swe\SpaceSDK\AbstractApi;
use Swe\SpaceSDK\Projects\Automation\StepExecutions\UsedParameters\Param;
use Swe\SpaceSDK\Projects\Automation\StepExecutions\UsedParameters\Secret;

/**
 * Class UsedParameters
 *
 * @package Swe\SpaceSDK\Projects\Automation\StepExecutions
 * @author Luca Braun <l.braun@s-w-e.com>
 */
class UsedParameters extends AbstractApi
{
    /**
     * @return Param
     */
    public function param(): Param
    {
        return new Param($this->client);
    }

    /**
     * @return Secret
     */
    public function secret(): Secret
    {
        return new Secret($this->client);
    }
}