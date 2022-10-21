<?php

namespace Swe\SpaceSDK\Projects\Documents;

use GuzzleHttp\Exception\GuzzleException;
use Swe\SpaceSDK\AbstractApi;

/**
 * Class Unarchive
 *
 * @package Swe\SpaceSDK\Projects\Documents
 * @author Luca Braun <l.braun@s-w-e.com>
 */
class Unarchive extends AbstractApi
{
    /**
     * @param string $project
     * @param string $documentId
     * @param array $response
     * @return array
     * @throws GuzzleException
     */
    public function unarchiveDocument(string $project, string $documentId, array $response = []): array
    {
        $uri = 'projects/{project}/documents/{documentId}/unarchive';
        $uriArguments = [
            'project' => $project,
            'documentId' => $documentId,
        ];

        return $this->client->patch($this->buildUrl($uri, $uriArguments), [], $response);
    }
}