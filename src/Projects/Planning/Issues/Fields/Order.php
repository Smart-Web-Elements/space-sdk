<?php

namespace Swe\SpaceSDK\Projects\Planning\Issues\Fields;

use GuzzleHttp\Exception\GuzzleException;
use Swe\SpaceSDK\AbstractApi;
use Swe\SpaceSDK\Exception\MissingArgumentException;
use Swe\SpaceSDK\Type;

/**
 * Class Order
 * Generated at 2023-05-05 02:00
 *
 * @package Swe\SpaceSDK\Projects\Planning\Issues\Fields
 * @author Luca Braun <l.braun@s-w-e.com>
 */
final class Order extends AbstractApi
{
    /**
     * Query order for built-in issue fields
     *
     * Permissions that may be checked: Project.Issues.View
     *
     * @param string $project
     * @param array $request
     * @param array $response
     * @return array
     * @throws GuzzleException
     */
    final public function getIssueFieldOrder(string $project, array $request = [], array $response = []): array
    {
        $uri = 'projects/{project}/planning/issues/fields/order';
        $uriArguments = [
            'project' => $project,
        ];

        return $this->client->get($this->buildUrl($uri, $uriArguments), $request, $response);
    }

    /**
     * Query order for built-in issue fields
     *
     * Permissions that may be checked: Project.Issues.Manage
     *
     * @param string $project
     * @param array $data
     * @return void
     * @throws GuzzleException
     * @throws MissingArgumentException
     */
    final public function setIssueFieldOrder(string $project, array $data): void
    {
        $uri = 'projects/{project}/planning/issues/fields/order';
        $required = [
            'fieldOrder' => Type::Array,
        ];
        $this->throwIfInvalid($required, $data);
        $uriArguments = [
            'project' => $project,
        ];

        $this->client->patch($this->buildUrl($uri, $uriArguments), $data);
    }
}
