<?php

namespace Swe\SpaceSDK\Projects\Planning\Issues\Fields;

use GuzzleHttp\Exception\GuzzleException;
use Swe\SpaceSDK\AbstractApi;
use Swe\SpaceSDK\Exception\MissingArgumentException;
use Swe\SpaceSDK\Type;

/**
 * Class Visibility
 * Generated at 2023-05-17 02:00
 *
 * @package Swe\SpaceSDK\Projects\Planning\Issues\Fields
 * @author Luca Braun <l.braun@s-w-e.com>
 */
final class Visibility extends AbstractApi
{
    /**
     * Query visibility for built-in issue fields
     *
     * Permissions that may be checked: Project.Issues.View
     *
     * @param string $project
     * @param array $response
     * @return array
     * @throws GuzzleException
     */
    final public function getIssueFieldVisibility(string $project, array $response = []): array
    {
        $uri = 'projects/{project}/planning/issues/fields/visibility';
        $uriArguments = [
            'project' => $project,
        ];

        return $this->client->get($this->buildUrl($uri, $uriArguments), [], $response);
    }

    /**
     * Set visibility for a built-in issue field
     *
     * Permissions that may be checked: Project.Issues.Manage
     *
     * @param string $project
     * @param array $data
     * @return void
     * @throws GuzzleException
     * @throws MissingArgumentException
     */
    final public function updateIssueFieldVisibility(string $project, array $data): void
    {
        $uri = 'projects/{project}/planning/issues/fields/visibility';
        $required = [
            'field' => Type::String,
            'visible' => Type::Boolean,
        ];
        $this->throwIfInvalid($required, $data);
        $uriArguments = [
            'project' => $project,
        ];

        $this->client->patch($this->buildUrl($uri, $uriArguments), $data);
    }
}
