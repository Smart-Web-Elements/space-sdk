<?php

namespace Swe\SpaceSDK\TeamDirectory\Profiles\Documents;

use GuzzleHttp\Exception\GuzzleException;
use Swe\SpaceSDK\AbstractApi;

/**
 * Class Unarchive
 *
 * @package Swe\SpaceSDK\TeamDirectory\Profiles\Documents
 * @author Luca Braun <l.braun@s-w-e.com>
 */
class Unarchive extends AbstractApi
{
    /**
     * @param string $profile
     * @param string $documentId
     * @param array $response
     * @return array
     * @throws GuzzleException
     */
    public function unarchiveDocument(string $profile, string $documentId, array $response = []): array
    {
        $uri = 'team-directory/profiles/{profile}/documents/{documentId}/unarchive';
        $uriArguments = [
            'profile' => $profile,
            'documentId' => $documentId,
        ];

        return $this->client->patch($this->buildUrl($uri, $uriArguments), [], $response);
    }
}