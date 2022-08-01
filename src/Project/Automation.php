<?php

namespace Swe\SpaceSDK\Project;


use Swe\SpaceSDK\AbstractApi;
use Swe\SpaceSDK\Project\Automation\GraphExecution;
use Swe\SpaceSDK\Project\Automation\Job;

/**
 * Class Automation
 *
 * @package Swe\SpaceSDK\Project
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