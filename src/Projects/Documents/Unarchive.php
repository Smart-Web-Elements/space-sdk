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
final class Unarchive extends AbstractApi
{
    /**
     * @param array $project
     * @param string $documentId
     * @param array $response
     * @return array
     * @throws GuzzleException
     */
    final public function unarchiveDocument(array $project, string $documentId, array $response = []): array
    {
        $uri = 'projects/{project}/documents/{documentId}/unarchive';
        $uriArguments = [
            'project' => $project,
            'documentId' => $documentId,
        ];

        return $this->client->patch($this->buildUrl($uri, $uriArguments), [], [], $response);
    }
}
