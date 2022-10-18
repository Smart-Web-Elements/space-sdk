<?php

namespace Swe\SpaceSDK\Applications\PermanentTokens;

use GuzzleHttp\Exception\GuzzleException;
use Swe\SpaceSDK\AbstractApi;

/**
 * Class Current
 *
 * @package Swe\SpaceSDK\Applications\PermanentTokens
 * @author Luca Braun <l.braun@s-w-e.com>
 */
class Current extends AbstractApi
{
    /**
     * Delete personal token of the given application.
     *
     * @param string $application
     * @return void
     * @throws GuzzleException
     */
    public function deleteCurrentPermanentToken(string $application): void
    {
        $uri = 'applications/{application}/permanent-tokens/current';
        $uriArguments = [
            'application' => $application,
        ];

        $this->client->delete($this->buildUrl($uri, $uriArguments));
    }
}