<?php

namespace Swe\SpaceSDK\Projects\Packages;

use GuzzleHttp\Exception\GuzzleException;
use Swe\SpaceSDK\AbstractApi;
use Swe\SpaceSDK\Exception\MissingArgumentException;

/**
 * Class Search
 *
 * @package Swe\SpaceSDK\Projects\Packages
 * @author Luca Braun <l.braun@s-w-e.com>
 */
class Search extends AbstractApi
{
    /**
     * Executes a package search for a given project ID.
     *
     * Permissions that may be checked: PackageRepository.Read
     *
     * @param string $project
     * @param array $request
     * @param array $response
     * @return array
     * @throws GuzzleException
     * @throws MissingArgumentException
     */
    public function findPackagesInRepository(string $project, array $request, array $response = []): array
    {
        $uri = 'projects/{project}/packages/search';
        $required = [
            'type' => self::TYPE_STRING,
            'query' => self::TYPE_STRING,
        ];
        $this->throwIfInvalid($required, $request);
        $uriArguments = [
            'project' => $project,
        ];

        return $this->client->get($this->buildUrl($uri, $uriArguments), $response, $request);
    }
}