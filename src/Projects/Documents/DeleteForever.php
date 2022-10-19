<?php

namespace Swe\SpaceSDK\Projects\Documents;

use GuzzleHttp\Exception\GuzzleException;
use Swe\SpaceSDK\AbstractApi;

/**
 * Class DeleteForever
 *
 * @package Swe\SpaceSDK\Projects\Documents
 * @author Luca Braun <l.braun@s-w-e.com>
 */
class DeleteForever extends AbstractApi
{
    /**
     * @param string $project
     * @param string $documentId
     * @return void
     * @throws GuzzleException
     */
    public function deleteDocumentForever(string $project, string $documentId): void
    {
        $uri = 'projects/{project}/documents/{documentId}/delete-forever';
        $uriArguments = [
            'project' => $project,
            'documentId' => $documentId,
        ];

        $this->client->delete($this->buildUrl($uri, $uriArguments));
    }
}