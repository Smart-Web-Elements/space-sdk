<?php

namespace Swe\SpaceSDK\Projects\Automation\StepExecutions;

use Swe\SpaceSDK\AbstractApi;
use Swe\SpaceSDK\Projects\Automation\StepExecutions\Secrets\SetReference;

/**
 * Class Secrets
 * Generated at 2024-03-16 02:07
 *
 * @package Swe\SpaceSDK\Projects\Automation\StepExecutions
 * @author Luca Braun <l.braun@s-w-e.com>
 */
final class Secrets extends AbstractApi
{
    /**
     * @return SetReference
     */
    final public function setReference(): SetReference
    {
        return new SetReference($this->client);
    }
}
