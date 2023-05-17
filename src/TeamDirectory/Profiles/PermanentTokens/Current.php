<?php

namespace Swe\SpaceSDK\TeamDirectory\Profiles\PermanentTokens;

use GuzzleHttp\Exception\GuzzleException;
use Swe\SpaceSDK\AbstractApi;

/**
 * Class Current
 * Generated at 2023-05-17 02:00
 *
 * @package Swe\SpaceSDK\TeamDirectory\Profiles\PermanentTokens
 * @author Luca Braun <l.braun@s-w-e.com>
 */
final class Current extends AbstractApi
{
    /**
     * Delete personal token of the given profile
     *
     * @param string $profile
     * @return void
     * @throws GuzzleException
     */
    final public function deleteCurrentPermanentToken(string $profile): void
    {
        $uri = 'team-directory/profiles/{profile}/permanent-tokens/current';
        $uriArguments = [
            'profile' => $profile,
        ];

        $this->client->delete($this->buildUrl($uri, $uriArguments));
    }
}
