<?php

namespace Swe\SpaceSDK\ExternalIssues;

use GuzzleHttp\Exception\GuzzleException;
use Swe\SpaceSDK\AbstractApi;
use Swe\SpaceSDK\Exception\MissingArgumentException;
use Swe\SpaceSDK\Type;

/**
 * Class ExternalTrackerProjects
 * Generated at 2024-01-17 02:00
 *
 * @package Swe\SpaceSDK\ExternalIssues
 * @author Luca Braun <l.braun@s-w-e.com>
 */
final class ExternalTrackerProjects extends AbstractApi
{
    /**
     * @param array $data
     * @param array $response
     * @return array
     * @throws GuzzleException
     * @throws MissingArgumentException
     */
    final public function connectExternalIssueTrackerProjects(array $data, array $response = []): array
    {
        $uri = 'external-issues/external-tracker-projects';
        $required = [
            'projects' => Type::Array,
        ];
        $this->throwIfInvalid($required, $data);

        return $this->client->post($this->buildUrl($uri), $data, [], $response);
    }

    /**
     * @param array $request
     * @param array $response
     * @return array
     * @throws GuzzleException
     * @throws MissingArgumentException
     */
    final public function getAllConnectedExternalIssueTrackerProjects(array $request, array $response = []): array
    {
        $uri = 'external-issues/external-tracker-projects';
        $required = [
            'application' => Type::String,
        ];
        $this->throwIfInvalid($required, $request);

        return $this->client->get($this->buildUrl($uri), $request, $response);
    }

    /**
     * @param array $request
     * @return void
     * @throws GuzzleException
     * @throws MissingArgumentException
     */
    final public function disconnectExternalIssueTrackerProject(array $request): void
    {
        $uri = 'external-issues/external-tracker-projects';
        $required = [
            'issuePrefix' => Type::String,
        ];
        $this->throwIfInvalid($required, $request);

        $this->client->delete($this->buildUrl($uri), $request);
    }
}
