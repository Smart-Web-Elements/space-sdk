<?php

namespace Swe\SpaceSDK\Applications\Unfurls;

use GuzzleHttp\Exception\GuzzleException;
use Swe\SpaceSDK\AbstractApi;
use Swe\SpaceSDK\Exception\MissingArgumentException;

/**
 * Class Patterns
 *
 * @package Swe\SpaceSDK\Applications\Unfurls
 * @author Luca Braun <l.braun@s-w-e.com>
 */
class Patterns extends AbstractApi
{
    /**
     * Update list of external ID prefixes for unfurling by the application. Method is to be called by the application
     * providing unfurls.
     *
     * Permissions that may be checked: Applications.Edit
     *
     * @param array $data
     * @return void
     * @throws GuzzleException
     * @throws MissingArgumentException
     */
    public function updateUnfurledPatterns(array $data): void
    {
        $uri = 'applications/unfurls/patterns';
        $required = [
            'patterns' => self::TYPE_ARRAY,
        ];
        $this->throwIfInvalid($required, $data);

        $this->client->patch($this->buildUrl($uri), $data);
    }
}