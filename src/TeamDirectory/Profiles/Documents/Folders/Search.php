<?php

namespace Swe\SpaceSDK\TeamDirectory\Profiles\Documents\Folders;

use GuzzleHttp\Exception\GuzzleException;
use Swe\SpaceSDK\AbstractApi;
use Swe\SpaceSDK\Exception\MissingArgumentException;
use Swe\SpaceSDK\Type;

/**
 * Class Search
 * Generated at 2023-11-18 04:46
 *
 * @package Swe\SpaceSDK\TeamDirectory\Profiles\Documents\Folders
 * @author Luca Braun <l.braun@s-w-e.com>
 */
final class Search extends AbstractApi
{
    /**
     * Executes search for personal documents and folders in specified folder
     *
     * @param string $profile
     * @param string $folder
     * @param array $request
     * @param array $response
     * @return array
     * @throws GuzzleException
     * @throws MissingArgumentException
     */
    final public function searchDocumentsAndFolders(
        string $profile,
        string $folder,
        array $request,
        array $response = [],
    ): array
    {
        $uri = 'team-directory/profiles/{profile}/documents/folders/{folder}/search';
        $required = [
            'query' => Type::String,
        ];
        $this->throwIfInvalid($required, $request);
        $uriArguments = [
            'profile' => $profile,
            'folder' => $folder,
        ];

        return $this->client->get($this->buildUrl($uri, $uriArguments), $request, $response);
    }
}
