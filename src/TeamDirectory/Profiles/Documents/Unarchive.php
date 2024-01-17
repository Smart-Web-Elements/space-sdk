<?php

namespace Swe\SpaceSDK\TeamDirectory\Profiles\Documents;

use GuzzleHttp\Exception\GuzzleException;
use Swe\SpaceSDK\AbstractApi;

/**
 * Class Unarchive
 * Generated at 2024-01-17 02:00
 *
 * @package Swe\SpaceSDK\TeamDirectory\Profiles\Documents
 * @author Luca Braun <l.braun@s-w-e.com>
 */
final class Unarchive extends AbstractApi
{
    /**
     * @param string $profile
     * @param string $documentId
     * @param array $response
     * @return array
     * @throws GuzzleException
     */
    final public function unarchiveDocument(string $profile, string $documentId, array $response = []): array
    {
        $uri = 'team-directory/profiles/{profile}/documents/{documentId}/unarchive';
        $uriArguments = [
            'profile' => $profile,
            'documentId' => $documentId,
        ];

        return $this->client->patch($this->buildUrl($uri, $uriArguments), [], [], $response);
    }
}
