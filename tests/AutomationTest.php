<?php

namespace Swe\SpaceSDK\Tests;

use GuzzleHttp\Exception\GuzzleException;
use Swe\SpaceSDK\Automation;
use Swe\SpaceSDK\Automation\GraphExecution;
use Swe\SpaceSDK\Automation\Job;

/**
 * Class AutomationTest
 *
 * @package Swe\SpaceSDK\Tests
 * @author Luca Braun <l.braun@s-w-e.com>
 */
class AutomationTest extends ClientTestCase
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
        static::$automation = new Automation(static::$client);
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
