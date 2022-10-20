<?php

namespace Swe\SpaceSDK\TeamDirectory\Profiles\Documents;

use GuzzleHttp\Exception\GuzzleException;
use Swe\SpaceSDK\AbstractApi;
use Swe\SpaceSDK\Exception\MissingArgumentException;

/**
 * Class Move
 *
 * @package Swe\SpaceSDK\TeamDirectory\Profiles\Documents
 * @author Luca Braun <l.braun@s-w-e.com>
 */
class Move extends AbstractApi
{
    /**
     * @param string $profile
     * @param string $documentId
     * @param array $data
     * @param array $response
     * @return array
     * @throws GuzzleException
     * @throws MissingArgumentException
     */
    public function moveDocument(string $profile, string $documentId, array $data, array $response = []): array
    {
        $uri = 'team-directory/profiles/{profile}/documents/{documentId}/move';
        $required = [
            'folder' => self::TYPE_STRING,
        ];
        $this->throwIfInvalid($required, $data);
        $uriArguments = [
            'profile' => $profile,
            'documentId' => $documentId,
        ];

        return $this->client->patch($this->buildUrl($uri, $uriArguments), $data, $response);
    }
}