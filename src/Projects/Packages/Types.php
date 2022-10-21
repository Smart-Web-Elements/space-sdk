<?php

namespace Swe\SpaceSDK\Projects\Packages;

use GuzzleHttp\Exception\GuzzleException;
use Swe\SpaceSDK\AbstractApi;

/**
 * Class Types
 *
 * @package Swe\SpaceSDK\Projects\Packages
 * @author Luca Braun <l.braun@s-w-e.com>
 */
class Types extends AbstractApi
{
    /**
     * Returns a list of available repository types.
     *
     * @param string $project
     * @param array $response
     * @return array
     * @throws GuzzleException
     */
    public function getAllTypes(string $project, array $response = []): array
    {
        $uri = 'projects/{project}/packages/types';
        $uriArguments = [
            'project' => $project,
        ];

        return $this->client->get($this->buildUrl($uri, $uriArguments), $response);
    }
}