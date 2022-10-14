<?php

namespace Swe\SpaceSDK\Project;


use Swe\SpaceSDK\AbstractApi;
use Swe\SpaceSDK\Project\Automation\GraphExecutions;
use Swe\SpaceSDK\Project\Automation\Jobs;

/**
 * Class Automation
 *
 * @package Swe\SpaceSDK\Project
 * @author Luca Braun <l.braun@s-w-e.com>
 */
class Automation extends AbstractApi
{
    /**
     * @return Jobs
     */
    public function jobs(): Jobs
    {
        return new Jobs($this->client);
    }

    /**
     * @return GraphExecutions
     */
    public function graphExecutions(): GraphExecutions
    {
        return new GraphExecutions($this->client);
    }
}