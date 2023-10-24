<?php

namespace Swe\SpaceSDK\TeamDirectory\Profiles\Documents;

use GuzzleHttp\Exception\GuzzleException;
use Swe\SpaceSDK\AbstractApi;
use Swe\SpaceSDK\Exception\MissingArgumentException;

/**
 * Class Access
 * Generated at 2023-10-24 02:15
 *
 * @package Swe\SpaceSDK\TeamDirectory\Profiles\Documents
 * @author Luca Braun <l.braun@s-w-e.com>
 */
final class Access extends AbstractApi
{
    /**
     * @param string $profile
     * @param string $documentId
     * @param array $response
     * @return array
     * @throws GuzzleException
     */
    final public function documentOwnAccessPermissions(
        string $profile,
        string $documentId,
        array $response = [],
    ): array
    {
        $uri = 'team-directory/profiles/{profile}/documents/{documentId}/access';
        $uriArguments = [
            'profile' => $profile,
            'documentId' => $documentId,
        ];

        return $this->client->get($this->buildUrl($uri, $uriArguments), [], $response);
    }

    /**
     * @param string $profile
     * @param string $documentId
     * @param array $data
     * @return void
     * @throws GuzzleException
     * @throws MissingArgumentException
     */
    final public function updateDocumentAccessPermissions(string $profile, string $documentId, array $data): void
    {
        $uri = 'team-directory/profiles/{profile}/documents/{documentId}/access';
        $required = [
            'accessChange' => [
            ],
        ];
        $this->throwIfInvalid($required, $data);
        $uriArguments = [
            'profile' => $profile,
            'documentId' => $documentId,
        ];

        $this->client->patch($this->buildUrl($uri, $uriArguments), $data);
    }
}
