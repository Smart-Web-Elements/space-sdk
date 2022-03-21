<?php

namespace Swe\SpaceSDK\Tests;

use GuzzleHttp\Exception\GuzzleException;
use Swe\SpaceSDK\Project;
use Swe\SpaceSDK\Space;
use Swe\SpaceSDK\ToDoItem;

/**
 * Class SpaceTest
 *
 * @package Space\Test
 * @author Luca Braun <l.braun@s-w-e.com>
 */
class SpaceTest extends ClientTestCase
{
    /**
     * @var Space
     */
    protected static Space $space;

    /**
     * @throws GuzzleException
     */
    public static function setUpBeforeClass(): void
    {
        parent::setUpBeforeClass();
        static::$space = new Space(static::$client);
    }

    /**
     *
     */
    public function testProject()
    {
        $this->assertInstanceOf(Project::class, static::$space->project());
    }

    /**
     *
     */
    public function testToDoItem()
    {
        $this->assertInstanceOf(ToDoItem::class, static::$space->toDoItem());
    }
}
