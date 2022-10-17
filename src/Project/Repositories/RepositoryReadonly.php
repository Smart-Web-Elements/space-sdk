<?php

namespace Swe\SpaceSDK\Project\Repositories;

use GuzzleHttp\Exception\GuzzleException;
use Swe\SpaceSDK\AbstractApi;

/**
 * Class Readonly
 *
 * @package Swe\SpaceSDK\Project\Repositories
 * @author Luca Braun <l.braun@s-w-e.com>
 */
class RepositoryReadonly extends AbstractApi
{
    /**
     * @param string $project
     * @param string $repository
     * @param bool $freeze
     * @return void
     * @throws GuzzleException
     */
    public function setRepositoryFrozenState(string $project, string $repository, bool $freeze): void
    {
        $uri = 'projects/{project}/repositories/{repository}/readonly';
        $uriArguments = [
            'project' => $project,
            'repository' => $repository,
        ];
        $data = [
            'freeze' => $freeze,
        ];

        $this->client->post($this->buildUrl($uri, $uriArguments), $data);
    }

    /**
     * @param string $project
     * @param string $repository
     * @return bool
     * @throws GuzzleException
     */
    public function getRepositoryFrozenState(string $project, string $repository): bool
    {
        $uri = 'projects/{project}/repositories/{repository}/readonly';
        $uriArguments = [
            'project' => $project,
            'repository' => $repository,
        ];

        return (bool)$this->client->get($this->buildUrl($uri, $uriArguments))[0];
    }
}