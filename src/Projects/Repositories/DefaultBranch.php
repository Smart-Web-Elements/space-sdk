<?php

namespace Swe\SpaceSDK\Projects\Repositories;

use GuzzleHttp\Exception\GuzzleException;
use Swe\SpaceSDK\AbstractApi;
use Swe\SpaceSDK\Exception\MissingArgumentException;
use Swe\SpaceSDK\Type;

/**
 * Class DefaultBranch
 * Generated at 2023-10-24 02:15
 *
 * @package Swe\SpaceSDK\Projects\Repositories
 * @author Luca Braun <l.braun@s-w-e.com>
 */
final class DefaultBranch extends AbstractApi
{
    /**
     * @param string $project
     * @param string $repository
     * @param array $data
     * @return void
     * @throws GuzzleException
     * @throws MissingArgumentException
     */
    final public function setRepositoryDefaultBranch(string $project, string $repository, array $data): void
    {
        $uri = 'projects/{project}/repositories/{repository}/default-branch';
        $required = [
            'branch' => Type::String,
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
     * @return string
     * @throws GuzzleException
     */
    final public function getRepositoryDefaultBranch(string $project, string $repository): string
    {
        $uri = 'projects/{project}/repositories/{repository}/default-branch';
        $uriArguments = [
            'project' => $project,
            'repository' => $repository,
        ];

        return (string)$this->client->get($this->buildUrl($uri, $uriArguments))[0];
    }
}
