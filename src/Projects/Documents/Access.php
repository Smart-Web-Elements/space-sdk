<?php

namespace Swe\SpaceSDK\Projects\Documents;

use GuzzleHttp\Exception\GuzzleException;
use Swe\SpaceSDK\AbstractApi;
use Swe\SpaceSDK\Exception\MissingArgumentException;

/**
 * Class Access
 * Generated at 2024-01-17 02:00
 *
 * @package Swe\SpaceSDK\Projects\Documents
 * @author Luca Braun <l.braun@s-w-e.com>
 */
final class Access extends AbstractApi
{
    /**
     * @param string $project
     * @param string $documentId
     * @param array $response
     * @return array
     * @throws GuzzleException
     */
    final public function documentOwnAccessPermissions(
        string $project,
        string $documentId,
        array $response = [],
    ): array
    {
        $uri = 'projects/{project}/documents/{documentId}/access';
        $uriArguments = [
            'project' => $project,
            'documentId' => $documentId,
        ];

        return $this->client->get($this->buildUrl($uri, $uriArguments), [], $response);
    }

    /**
     * @param string $project
     * @param string $documentId
     * @param array $data
     * @return void
     * @throws GuzzleException
     * @throws MissingArgumentException
     */
    final public function updateDocumentAccessPermissions(string $project, string $documentId, array $data): void
    {
        $uri = 'projects/{project}/documents/{documentId}/access';
        $required = [
            'accessChange' => [
            ],
        ];
        $this->throwIfInvalid($required, $data);
        $uriArguments = [
            'project' => $project,
            'documentId' => $documentId,
        ];

        $this->client->patch($this->buildUrl($uri, $uriArguments), $data);
    }
}
