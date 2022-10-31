<?php

namespace Swe\SpaceSDK\TeamDirectory\Profiles\Documents;

use GuzzleHttp\Exception\GuzzleException;
use Swe\SpaceSDK\AbstractApi;

/**
 * Class DeleteForever
 *
 * @package Swe\SpaceSDK\TeamDirectory\Profiles\Documents
 * @author Luca Braun <l.braun@s-w-e.com>
 */
final class DeleteForever extends AbstractApi
{
    /**
     * @param array $profile
     * @param string $documentId
     * @return void
     * @throws GuzzleException
     */
    final public function deleteDocumentForever(array $profile, string $documentId): void
    {
        $uri = 'team-directory/profiles/{profile}/documents/{documentId}/delete-forever';
        $uriArguments = [
            'profile' => $profile,
            'documentId' => $documentId,
        ];

        $this->client->delete($this->buildUrl($uri, $uriArguments));
    }
}
