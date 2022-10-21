<?php

namespace Swe\SpaceSDK\Projects;


use Swe\SpaceSDK\AbstractApi;
use Swe\SpaceSDK\Projects\Automation\Deployments;
use Swe\SpaceSDK\Projects\Automation\DeploymentTargets;
use Swe\SpaceSDK\Projects\Automation\DSLEvaluations;
use Swe\SpaceSDK\Projects\Automation\GraphExecutions;
use Swe\SpaceSDK\Projects\Automation\JobExecutions;
use Swe\SpaceSDK\Projects\Automation\Jobs;
use Swe\SpaceSDK\Projects\Automation\StepExecutions;
use Swe\SpaceSDK\Projects\Automation\Subscriptions;

/**
 * Class Automation
 *
 * @package Swe\SpaceSDK\Projects
 * @author Luca Braun <l.braun@s-w-e.com>
 */
class Automation extends AbstractApi
{
    /**
     * @return DSLEvaluations
     */
    public function dslEvaluations(): DSLEvaluations
    {
        return new DSLEvaluations($this->client);
    }

    /**
     * @return DeploymentTargets
     */
    public function deploymentTargets(): DeploymentTargets
    {
        return new DeploymentTargets($this->client);
    }

    /**
     * @return Deployments
     */
    public function deployments(): Deployments
    {
        return new Deployments($this->client);
    }

    /**
     * @return GraphExecutions
     */
    public function graphExecutions(): GraphExecutions
    {
        return new GraphExecutions($this->client);
    }

    /**
     * @return JobExecutions
     */
    public function jobExecutions(): JobExecutions
    {
        return new JobExecutions($this->client);
    }

    /**
     * @return Jobs
     */
    public function jobs(): Jobs
    {
        return new Jobs($this->client);
    }

    /**
     * @return StepExecutions
     */
    public function stepExecutions(): StepExecutions
    {
        return new StepExecutions($this->client);
    }

    /**
     * @return Subscriptions
     */
    public function subscriptions(): Subscriptions
    {
        return new Subscriptions($this->client);
    }
}