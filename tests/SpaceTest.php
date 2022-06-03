<?php

namespace Swe\SpaceSDK\Tests;

use Swe\SpaceSDK\Project;
use Swe\SpaceSDK\ToDoItem;

/**
 * Class SpaceTest
 *
 * @package Swe\SpaceSDK\Tests
 * @author Luca Braun <l.braun@s-w-e.com>
 */
class SpaceTest extends SpaceTestCase
{

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
