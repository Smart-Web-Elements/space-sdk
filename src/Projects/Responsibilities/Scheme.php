<?php

namespace Swe\SpaceSDK\Projects\Responsibilities;

use GuzzleHttp\Exception\GuzzleException;
use Swe\SpaceSDK\AbstractApi;

/**
 * Class Scheme
 *
 * @package Swe\SpaceSDK\Projects\Responsibilities
 * @author Luca Braun <l.braun@s-w-e.com>
 */
final class Scheme extends AbstractApi
{
    /**
     * Get the responsibilities schema for a given project ID
     *
     * @param array $project
     * @param array $response
     * @return array
     * @throws GuzzleException
     */
    final public function getProjectResponsibilityScheme(array $project, array $response = []): array
    {
        $uri = 'projects/{project}/responsibilities/scheme';
        $uriArguments = [
            'project' => $project,
        ];

        return $this->client->get($this->buildUrl($uri, $uriArguments), [], $response);
    }
}
