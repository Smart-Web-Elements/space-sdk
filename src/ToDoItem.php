<?php

namespace Swe\SpaceSDK;


use GuzzleHttp\Exception\GuzzleException;
use Swe\SpaceSDK\Exception\MissingArgumentException;

/**
 * Class ToDoItem
 *
 * @package Swe\SpaceSDK
 * @author Luca Braun <l.braun@s-w-e.com>
 */
class ToDoItem extends AbstractApi
{
    /**
     * Create a new To-Do item, with an optional due date.
     *
     * Permissions that may be checked: Todo.Task.Edit
     *
     * @param array $data
     * @param array $response
     * @return array
     * @throws MissingArgumentException
     * @throws GuzzleException
     */
    public function createToDoItem(array $data, array $response = []): array
    {
        $url = 'todo';
        $requiredField = [
            'text' => 'string',
        ];

        $this->throwIfInvalid($requiredField, $data);

        return $this->client->post($this->buildUrl($url), $data, $response);
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
    public function getAllToDoItems(array $request = [], array $response = []): array
    {
        $url = 'todo';
        return $this->client->get($this->buildUrl($url), $response, $request);
    }

    /**
     * Update an existing To-Do item. Optional parameters will be ignored when not specified and updated otherwise.
     *
     * Permissions that may be checked: Todo.Task.Edit
     *
     * @param array $request
     * @param array $data
     * @param array $response
     * @return array
     * @throws GuzzleException
     * @throws MissingArgumentException
     */
    public function updateToDoItem(array $request, array $data, array $response = []): array
    {
        $url = 'todo/{id}';
        $id = $this->throwIfIdMissing($request);

        return $this->client->patch($this->buildUrl($url, ['id' => $id]), $data, $response);
    }

    /**
     * Delete an existing To-Do item.
     *
     * Permissions that may be checked: Todo.Task.Edit
     *
     * @param array $request
     * @return bool
     * @throws GuzzleException
     * @throws MissingArgumentException
     */
    public function deleteToDoItem(array $request): bool
    {
        $url = 'todo/{id}';
        $id = $this->throwIfIdMissing($request);

        return $this->client->delete($this->buildUrl($url, ['id' => $id]));
    }
}