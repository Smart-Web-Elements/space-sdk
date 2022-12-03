<?php

namespace Swe\SpaceSDK\Projects\Documents;

use GuzzleHttp\Exception\GuzzleException;
use Swe\SpaceSDK\AbstractApi;
use Swe\SpaceSDK\Exception\MissingArgumentException;
use Swe\SpaceSDK\Type;

/**
 * Class Copy
 * Generated at 2022-12-03 02:00
 *
 * @package Swe\SpaceSDK\Projects\Documents
 * @author Luca Braun <l.braun@s-w-e.com>
 */
final class Copy extends AbstractApi
{
    /**
     * @param string $project
     * @param string $documentId
     * @param array $data
     * @param array $response
     * @return array
     * @throws GuzzleException
     * @throws MissingArgumentException
     */
    final public function copyDocument(string $project, string $documentId, array $data, array $response = []): array
    {
        $uri = 'projects/{project}/documents/{documentId}/copy';
        $required = [
            'name' => Type::String,
            'folder' => Type::String,
        ];
        $this->throwIfInvalid($required, $data);
        $uriArguments = [
            'project' => $project,
            'documentId' => $documentId,
        ];

        return $this->client->post($this->buildUrl($uri, $uriArguments), $data, [], $response);
    }
}
