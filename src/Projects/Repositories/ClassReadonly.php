<?php

namespace Swe\SpaceSDK\Projects\Repositories;

use GuzzleHttp\Exception\GuzzleException;
use Swe\SpaceSDK\AbstractApi;
use Swe\SpaceSDK\Exception\MissingArgumentException;
use Swe\SpaceSDK\Type;

/**
 * Class ClassReadonly
 * Generated at 2023-04-07 02:00
 *
 * @package Swe\SpaceSDK\Projects\Repositories
 * @author Luca Braun <l.braun@s-w-e.com>
 */
final class ClassReadonly extends AbstractApi
{
    /**
     * @param string $project
     * @param string $repository
     * @param array $data
     * @return void
     * @throws GuzzleException
     * @throws MissingArgumentException
     */
    final public function setRepositoryFrozenState(string $project, string $repository, array $data): void
    {
        $uri = 'projects/{project}/repositories/{repository}/readonly';
        $required = [
            'freeze' => Type::Boolean,
        ];
        $this->throwIfInvalid($required, $data);
        $uriArguments = [
            'project' => $project,
            'repository' => $repository,
        ];

        $this->client->post($this->buildUrl($uri, $uriArguments), $data);
    }

    /**
     * @param string $project
     * @param string $repository
     * @return bool
     * @throws GuzzleException
     */
    final public function getRepositoryFrozenState(string $project, string $repository): bool
    {
        $uri = 'projects/{project}/repositories/{repository}/readonly';
        $uriArguments = [
            'project' => $project,
            'repository' => $repository,
        ];

        return (bool)$this->client->get($this->buildUrl($uri, $uriArguments))[0];
    }
}
