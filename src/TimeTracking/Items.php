<?php

namespace Swe\SpaceSDK\TimeTracking;

use GuzzleHttp\Exception\GuzzleException;
use Swe\SpaceSDK\AbstractApi;
use Swe\SpaceSDK\Exception\MissingArgumentException;
use Swe\SpaceSDK\Type;

/**
 * Class Items
 * Generated at 2023-08-31 02:00
 *
 * @package Swe\SpaceSDK\TimeTracking
 * @author Luca Braun <l.braun@s-w-e.com>
 */
final class Items extends AbstractApi
{
    /**
     * Create work item.
     *
     * Permissions that may be checked: Project.Issues.Edit, Project.TimeTracking.EditOwn, Project.TimeTracking.EditOthers
     *
     * @param array $data
     * @param array $response
     * @return array
     * @throws GuzzleException
     * @throws MissingArgumentException
     */
    final public function createItem(array $data, array $response = []): array
    {
        $uri = 'time-tracking/items';
        $required = [
            'subject' => Type::String,
            'userId' => Type::String,
            'date' => Type::Date,
            'duration' => Type::Integer,
        ];
        $this->throwIfInvalid($required, $data);

        return $this->client->post($this->buildUrl($uri), $data, [], $response);
    }

    /**
     * Get items for subject
     *
     * Permissions that may be checked: Project.TimeTracking.View
     *
     * @param array $request
     * @param array $response
     * @return array
     * @throws GuzzleException
     * @throws MissingArgumentException
     */
    final public function getAllItems(array $request, array $response = []): array
    {
        $uri = 'time-tracking/items';
        $required = [
            'subject' => Type::String,
        ];
        $this->throwIfInvalid($required, $request);

        return $this->client->get($this->buildUrl($uri), $request, $response);
    }

    /**
     * Update a single work item.
     *
     * Permissions that may be checked: Project.TimeTracking.EditOwn, Project.TimeTracking.EditOthers
     *
     * @param string $itemId
     * @param array $data
     * @return void
     * @throws GuzzleException
     */
    final public function updateItem(string $itemId, array $data = []): void
    {
        $uri = 'time-tracking/items/{itemId}';
        $uriArguments = [
            'itemId' => $itemId,
        ];

        $this->client->patch($this->buildUrl($uri, $uriArguments), $data);
    }

    /**
     * Delete single work item
     *
     * Permissions that may be checked: Project.TimeTracking.EditOwn, Project.TimeTracking.EditOthers
     *
     * @param string $itemId
     * @return void
     * @throws GuzzleException
     */
    final public function deleteItem(string $itemId): void
    {
        $uri = 'time-tracking/items/{itemId}';
        $uriArguments = [
            'itemId' => $itemId,
        ];

        $this->client->delete($this->buildUrl($uri, $uriArguments));
    }
}
