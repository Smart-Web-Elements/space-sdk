<?php

namespace Swe\SpaceSDK\Projects\Responsibilities;

use GuzzleHttp\Exception\GuzzleException;
use Swe\SpaceSDK\AbstractApi;

/**
 * Class Assignees
 * Generated at 2023-08-08 02:41
 *
 * @package Swe\SpaceSDK\Projects\Responsibilities
 * @author Luca Braun <l.braun@s-w-e.com>
 */
final class Assignees extends AbstractApi
{
    /**
     * Assign a responsible person for a given project ID and responsibility ID
     *
     * @param string $project
     * @param string $responsibilityId
     * @param string $profileId
     * @param array $data
     * @return void
     * @throws GuzzleException
     */
    final public function assignResponsible(
        string $project,
        string $responsibilityId,
        string $profileId,
        array $data = [],
    ): void
    {
        $uri = 'projects/{project}/responsibilities/{responsibilityId}/assignees/{profileId}';
        $uriArguments = [
            'project' => $project,
            'responsibilityId' => $responsibilityId,
            'profileId' => $profileId,
        ];

        $this->client->post($this->buildUrl($uri, $uriArguments), $data);
    }

    /**
     * Remove a responsible person for a given project ID and responsibility ID
     *
     * @param string $project
     * @param string $responsibilityId
     * @param string $profileId
     * @param array $request
     * @return void
     * @throws GuzzleException
     */
    final public function removeResponsible(
        string $project,
        string $responsibilityId,
        string $profileId,
        array $request = [],
    ): void
    {
        $uri = 'projects/{project}/responsibilities/{responsibilityId}/assignees/{profileId}';
        $uriArguments = [
            'project' => $project,
            'responsibilityId' => $responsibilityId,
            'profileId' => $profileId,
        ];

        $this->client->delete($this->buildUrl($uri, $uriArguments), $request);
    }
}
