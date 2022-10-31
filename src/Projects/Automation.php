<?php

namespace Swe\SpaceSDK\Projects;

use Swe\SpaceSDK\AbstractApi;
use Swe\SpaceSDK\Projects\Automation\DeploymentTargets;
use Swe\SpaceSDK\Projects\Automation\Deployments;
use Swe\SpaceSDK\Projects\Automation\DslEvaluations;
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
final class Automation extends AbstractApi
{
    /**
     * @return DslEvaluations
     */
    final public function dslEvaluations(): DslEvaluations
    {
        return new DslEvaluations($this->client);
    }

    /**
     * @return GraphExecutions
     */
    final public function graphExecutions(): GraphExecutions
    {
        return new GraphExecutions($this->client);
    }

    /**
     * @return JobExecutions
     */
    final public function jobExecutions(): JobExecutions
    {
        return new JobExecutions($this->client);
    }

    /**
     * @return Jobs
     */
    final public function jobs(): Jobs
    {
        return new Jobs($this->client);
    }

    /**
     * @return StepExecutions
     */
    final public function stepExecutions(): StepExecutions
    {
        return new StepExecutions($this->client);
    }

    /**
     * @return Subscriptions
     */
    final public function subscriptions(): Subscriptions
    {
        return new Subscriptions($this->client);
    }

    /**
     * @return DeploymentTargets
     */
    final public function deploymentTargets(): DeploymentTargets
    {
        return new DeploymentTargets($this->client);
    }

    /**
     * @return Deployments
     */
    final public function deployments(): Deployments
    {
        return new Deployments($this->client);
    }
}
