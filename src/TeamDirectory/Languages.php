<?php

namespace Swe\SpaceSDK\TeamDirectory;

use GuzzleHttp\Exception\GuzzleException;
use Swe\SpaceSDK\AbstractApi;

/**
 * Class Languages
 *
 * @package Swe\SpaceSDK\TeamDirectory
 * @author Luca Braun <l.braun@s-w-e.com>
 */
class Languages extends AbstractApi
{
    /**
     * Get all languages.
     *
     * @param array $response
     * @return array
     * @throws GuzzleException
     */
    public function getAllLanguages(array $response = []): array
    {
        $uri = 'team-directory/languages';

        return $this->client->get($this->buildUrl($uri), $response);
    }
}