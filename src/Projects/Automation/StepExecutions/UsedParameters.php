<?php

namespace Swe\SpaceSDK\Projects\Automation\StepExecutions;

use Swe\SpaceSDK\AbstractApi;
use Swe\SpaceSDK\Projects\Automation\StepExecutions\UsedParameters\Param;
use Swe\SpaceSDK\Projects\Automation\StepExecutions\UsedParameters\Secret;

/**
 * Class UsedParameters
 * Generated at 2023-07-28 02:08
 *
 * @package Swe\SpaceSDK\Projects\Automation\StepExecutions
 * @author Luca Braun <l.braun@s-w-e.com>
 */
final class UsedParameters extends AbstractApi
{
    /**
     * @return Param
     */
    final public function param(): Param
    {
        return new Param($this->client);
    }

    /**
     * @return Secret
     */
    final public function secret(): Secret
    {
        return new Secret($this->client);
    }
}
