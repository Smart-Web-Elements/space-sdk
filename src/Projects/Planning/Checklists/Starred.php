<?php

namespace Swe\SpaceSDK\Projects\Planning\Checklists;

use GuzzleHttp\Exception\GuzzleException;
use Swe\SpaceSDK\AbstractApi;

/**
 * Class Starred
 * Generated at 2023-11-18 04:46
 *
 * @package Swe\SpaceSDK\Projects\Planning\Checklists
 * @author Luca Braun <l.braun@s-w-e.com>
 */
final class Starred extends AbstractApi
{
    /**
     * Get all starred checklists in a project
     *
     * @param string $project
     * @param array $response
     * @return array
     * @throws GuzzleException
     * @deprecated This method is deprecated since 2022-04-08. [SPACE-13768]: Not implemented yet
     */
    final public function getAllStarredChecklists(string $project, array $response = []): array
    {
        $uri = 'projects/{project}/planning/checklists/starred';
        $uriArguments = [
            'project' => $project,
        ];

        return $this->client->get($this->buildUrl($uri, $uriArguments), [], $response);
    }
}
