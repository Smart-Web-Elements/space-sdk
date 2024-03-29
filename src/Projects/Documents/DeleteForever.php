<?php

namespace Swe\SpaceSDK\Projects\Documents;

use GuzzleHttp\Exception\GuzzleException;
use Swe\SpaceSDK\AbstractApi;

/**
 * Class DeleteForever
 * Generated at 2024-03-16 02:07
 *
 * @package Swe\SpaceSDK\Projects\Documents
 * @author Luca Braun <l.braun@s-w-e.com>
 */
final class DeleteForever extends AbstractApi
{
    /**
     * @param string $project
     * @param string $documentId
     * @return void
     * @throws GuzzleException
     */
    final public function deleteDocumentForever(string $project, string $documentId): void
    {
        $uri = 'projects/{project}/documents/{documentId}/delete-forever';
        $uriArguments = [
            'project' => $project,
            'documentId' => $documentId,
        ];

        $this->client->delete($this->buildUrl($uri, $uriArguments));
    }
}
