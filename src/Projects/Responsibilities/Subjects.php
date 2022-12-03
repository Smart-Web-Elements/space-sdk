<?php

namespace Swe\SpaceSDK\Projects\Responsibilities;

use GuzzleHttp\Exception\GuzzleException;
use Swe\SpaceSDK\AbstractApi;

/**
 * Class Subjects
 * Generated at 2022-12-03 02:00
 *
 * @package Swe\SpaceSDK\Projects\Responsibilities
 * @author Luca Braun <l.braun@s-w-e.com>
 */
final class Subjects extends AbstractApi
{
    /**
     * Delete an existing responsibility subject for a given project ID
     *
     * @param string $subjectId
     * @param array $request
     * @return void
     * @throws GuzzleException
     */
    final public function deleteResponsibilitySubject(string $subjectId, array $request = []): void
    {
        $uri = 'projects/responsibilities/subjects/{subjectId}';
        $uriArguments = [
            'subjectId' => $subjectId,
        ];

        $this->client->delete($this->buildUrl($uri, $uriArguments), $request);
    }

    /**
     * Add a responsibility subject for a given project ID
     *
     * @param string $project
     * @param array $data
     * @param array $response
     * @return string
     * @throws GuzzleException
     */
    final public function addResponsibilitySubject(string $project, array $data = []): string
    {
        $uri = 'projects/{project}/responsibilities/subjects';
        $uriArguments = [
            'project' => $project,
        ];

        return (string)$this->client->post($this->buildUrl($uri, $uriArguments), $data)[0];
    }

    /**
     * Update an existing responsibility subject for a given project ID
     *
     * @param string $project
     * @param string $subjectId
     * @param array $data
     * @return void
     * @throws GuzzleException
     */
    final public function editResponsibilitySubject(string $project, string $subjectId, array $data = []): void
    {
        $uri = 'projects/{project}/responsibilities/subjects/{subjectId}';
        $uriArguments = [
            'project' => $project,
            'subjectId' => $subjectId,
        ];

        $this->client->patch($this->buildUrl($uri, $uriArguments), $data);
    }
}
