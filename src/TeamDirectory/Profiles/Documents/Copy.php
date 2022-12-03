<?php

namespace Swe\SpaceSDK\TeamDirectory\Profiles\Documents;

use GuzzleHttp\Exception\GuzzleException;
use Swe\SpaceSDK\AbstractApi;
use Swe\SpaceSDK\Exception\MissingArgumentException;
use Swe\SpaceSDK\Type;

/**
 * Class Copy
 * Generated at 2022-12-03 02:00
 *
 * @package Swe\SpaceSDK\TeamDirectory\Profiles\Documents
 * @author Luca Braun <l.braun@s-w-e.com>
 */
final class Copy extends AbstractApi
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
    final public function copyDocument(string $profile, string $documentId, array $data, array $response = []): array
    {
        $uri = 'team-directory/profiles/{profile}/documents/{documentId}/copy';
        $required = [
            'name' => Type::String,
            'folder' => Type::String,
        ];
        $this->throwIfInvalid($required, $data);
        $uriArguments = [
            'profile' => $profile,
            'documentId' => $documentId,
        ];

        return $this->client->post($this->buildUrl($uri, $uriArguments), $data, [], $response);
    }
}
