<?php

namespace Swe\SpaceSDK;

use GuzzleHttp\Exception\GuzzleException;
use Swe\SpaceSDK\Exception\MissingArgumentException;

/**
 * Class ToDoItems
 * Generated at 2024-01-17 02:00
 *
 * @package Swe\SpaceSDK
 * @author Luca Braun <l.braun@s-w-e.com>
 */
final class ToDoItems extends AbstractApi
{
    /**
     * Create a new To-Do item, with an optional due date
     *
     * Permissions that may be checked: Todo.Task.Edit
     *
     * @param array $data
     * @param array $response
     * @return array
     * @throws GuzzleException
     * @throws MissingArgumentException
     */
    final public function createToDoItem(array $data, array $response = []): array
    {
        $uri = 'todo';
        $required = [
            'text' => Type::String,
        ];
        $this->throwIfInvalid($required, $data);

        return $this->client->post($this->buildUrl($uri), $data, [], $response);
    }

    /**
     * Get all To-Do items that match given parameters. Parameters are applied as 'AND' filters.
     *
     * Permissions that may be checked: Todo.Task.View
     *
     * @param array $request
     * @param array $response
     * @return array
     * @throws GuzzleException
     */
    final public function getAllToDoItems(array $request = [], array $response = []): array
    {
        $uri = 'todo';

        return $this->client->get($this->buildUrl($uri), $request, $response);
    }

    /**
     * Update an existing To-Do item. Optional parameters will be ignored when not specified and updated otherwise.
     *
     * Permissions that may be checked: Todo.Task.Edit
     *
     * @param string $id
     * @param array $data
     * @return void
     * @throws GuzzleException
     */
    final public function updateToDoItem(string $id, array $data = []): void
    {
        $uri = 'todo/{id}';
        $uriArguments = [
            'id' => $id,
        ];

        $this->client->patch($this->buildUrl($uri, $uriArguments), $data);
    }

    /**
     * Delete an existing To-Do item
     *
     * Permissions that may be checked: Todo.Task.Edit
     *
     * @param string $id
     * @return void
     * @throws GuzzleException
     */
    final public function deleteToDoItem(string $id): void
    {
        $uri = 'todo/{id}';
        $uriArguments = [
            'id' => $id,
        ];

        $this->client->delete($this->buildUrl($uri, $uriArguments));
    }
}
