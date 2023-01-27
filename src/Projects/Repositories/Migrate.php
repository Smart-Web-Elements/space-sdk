<?php

namespace Swe\SpaceSDK\Projects\Repositories;

use GuzzleHttp\Exception\GuzzleException;
use Swe\SpaceSDK\AbstractApi;
use Swe\SpaceSDK\Exception\MissingArgumentException;
use Swe\SpaceSDK\Type;

/**
 * Class Migrate
 * Generated at 2023-01-27 02:00
 *
 * @package Swe\SpaceSDK\Projects\Repositories
 * @author Luca Braun <l.braun@s-w-e.com>
 */
final class Migrate extends AbstractApi
{
    /**
     * @param string $project
     * @param string $repository
     * @param array $data
     * @param array $response
     * @return array
     * @throws GuzzleException
     * @throws MissingArgumentException
     */
    final public function migrateRepository(
        string $project,
        string $repository,
        array $data,
        array $response = [],
    ): array {
        $uri = 'projects/{project}/repositories/{repository}/migrate';
        $required = [
            'description' => Type::String,
            'remote' => [
                'url' => Type::String,
            ],
        ];
        $this->throwIfInvalid($required, $data);
        $uriArguments = [
            'project' => $project,
            'repository' => $repository,
        ];

        return $this->client->post($this->buildUrl($uri, $uriArguments), $data, [], $response);
    }
}
