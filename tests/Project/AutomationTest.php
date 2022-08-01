<?php

namespace Swe\SpaceSDK\Tests\Project;

use GuzzleHttp\Exception\GuzzleException;
use Swe\SpaceSDK\Project\Automation;
use Swe\SpaceSDK\Project\Automation\GraphExecution;
use Swe\SpaceSDK\Project\Automation\Job;
use Swe\SpaceSDK\Tests\SpaceTestCase;

/**
 * Class AutomationTest
 *
 * @package Swe\SpaceSDK\Tests\Project
 * @author Luca Braun <l.braun@s-w-e.com>
 */
class AutomationTest extends SpaceTestCase
{
    /**
     * @var Automation
     */
    protected static Automation $automation;

    /**
     * @throws GuzzleException
     */
    public static function setUpBeforeClass(): void
    {
        parent::setUpBeforeClass();
        static::$automation = static::$space->project()->automation();
    }

    /**
     *
     */
    public function testJob()
    {
        $this->assertInstanceOf(Job::class, static::$automation->job());
    }

    /**
     *
     */
    public function testGraphExecution()
    {
        $this->assertInstanceOf(GraphExecution::class, static::$automation->graphExecution());
    }
}
