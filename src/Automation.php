<?php

namespace Swe\SpaceSDK;


use Swe\SpaceSDK\Automation\GraphExecution;
use Swe\SpaceSDK\Automation\Job;

/**
 * Class Automation
 *
 * @package Swe\SpaceSDK
 * @author Luca Braun <l.braun@s-w-e.com>
 */
class Automation extends AbstractApi
{
    /**
     * @return Job
     */
    public function job(): Job
    {
        return new Job($this->client);
    }

    /**
     * @return GraphExecution
     */
    public function graphExecution(): GraphExecution
    {
        return new GraphExecution($this->client);
    }
}