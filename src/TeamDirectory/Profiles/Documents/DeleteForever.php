<?php

namespace Swe\SpaceSDK\TeamDirectory\Profiles\Documents;

use GuzzleHttp\Exception\GuzzleException;
use Swe\SpaceSDK\AbstractApi;

/**
 * Class DeleteForever
 * Generated at 2024-02-07 02:00
 *
 * @package Swe\SpaceSDK\TeamDirectory\Profiles\Documents
 * @author Luca Braun <l.braun@s-w-e.com>
 */
final class DeleteForever extends AbstractApi
{
    /**
     * @param string $profile
     * @param string $documentId
     * @return void
     * @throws GuzzleException
     */
    final public function deleteDocumentForever(string $profile, string $documentId): void
    {
        $uri = 'team-directory/profiles/{profile}/documents/{documentId}/delete-forever';
        $uriArguments = [
            'profile' => $profile,
            'documentId' => $documentId,
        ];

        $this->client->delete($this->buildUrl($uri, $uriArguments));
    }
}
