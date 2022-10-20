<?php

namespace Swe\SpaceSDK\TeamDirectory\Profiles\PermanentTokens;

use GuzzleHttp\Exception\GuzzleException;
use Swe\SpaceSDK\AbstractApi;

/**
 * Class Current
 *
 * @package Swe\SpaceSDK\TeamDirectory\Profiles\PermanentTokens
 * @author Luca Braun <l.braun@s-w-e.com>
 */
class Current extends AbstractApi
{
    /**
     * Delete personal token of the given profile.
     *
     * This endpoint doesn't require any permissions.
     *
     * @param string $profile
     * @return void
     * @throws GuzzleException
     */
    public function deleteCurrentPermanentToken(string $profile): void
    {
        $uri = 'team-directory/profiles/{profile}/permanent-tokens/current';
        $uriArguments = [
            'profile' => $profile,
        ];

        $this->client->delete($this->buildUrl($uri, $uriArguments));
    }
}