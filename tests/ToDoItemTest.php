<?php

namespace Swe\SpaceSDK\Tests;

use GuzzleHttp\Exception\ClientException;
use GuzzleHttp\Exception\GuzzleException;
use Swe\SpaceSDK\Exception\MissingArgumentException;
use Swe\SpaceSDK\ToDoItem;

/**
 * Class ToDoItemTest
 *
 * @package Swe\SpaceSDK\Tests
 * @author Luca Braun <l.braun@s-w-e.com>
 */
class ToDoItemTest extends SpaceTestCase
{
    /**
     * @var string
     */
    protected static string $text = 'My todo item';

    /**
     * @var string
     */
    protected static string $updateText = 'My updated todo item';

    /**
     * @var string
     */
    protected static string $applicationForbiddenMessage = 'Only users are allowed to perform this operation';

    /**
     * @var ToDoItem
     */
    protected static ToDoItem $toDoItem;

    /**
     * @throws GuzzleException
     */
    public static function setUpBeforeClass(): void
    {
        parent::setUpBeforeClass();
        static::$toDoItem = static::$space->toDoItem();
    }

    /**
     * @return array
     * @throws GuzzleException
     * @throws MissingArgumentException
     */
    public function testCreateToDoItem(): array
    {
        $data = [
            'text' => static::$text,
        ];

        try {
            $response = static::$toDoItem->createToDoItem($data);
        } catch (ClientException $e) {
            $this->assertEquals(403, $e->getResponse()->getStatusCode());
            $response = json_decode($e->getResponse()->getBody()->getContents(), true);
            $this->assertEquals(static::$applicationForbiddenMessage, $response['error_description']);
            $this->skip('The client is an application, not an user.');
        }

        $this->assertIsArray($response);
        $this->assertArrayHasKey('id', $response);
        $this->assertSame($data['text'], $data['content']['originalText']);

        return $response;
    }

    /**
     * @depends testCreateToDoItem
     * @param array $todoItem
     * @throws GuzzleException
     * @throws MissingArgumentException
     */
    public function testUpdateToDoItem(array $todoItem)
    {
        $request = [
            'id' => $todoItem['id'],
        ];
        $data = [
            'text' => static::$updateText,
        ];
        $response = static::$toDoItem->updateToDoItem($request, $data);

        $this->assertEmpty($response);
    }

    /**
     * @depends testUpdateToDoItem
     * @throws GuzzleException
     */
    public function testGetAllToDoItems()
    {
        $response = static::$toDoItem->getAllToDoItems();

        // [02 Juni 2022] [Luca Braun] TODO: Finish this test.
        $this->assertEmpty($response);
    }

    /**
     * @depends testGetAllToDoItems
     */
    public function testDeleteToDoItem()
    {
        // [02 Juni 2022] [Luca Braun] TODO: Finish this test.
        $this->assertTrue(true);
    }
}
