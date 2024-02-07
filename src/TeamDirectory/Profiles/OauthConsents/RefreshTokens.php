<?php

namespace Swe\SpaceSDK\TeamDirectory\Profiles\OauthConsents;

use GuzzleHttp\Exception\GuzzleException;
use Swe\SpaceSDK\AbstractApi;

/**
 * Class RefreshTokens
 * Generated at 2024-02-07 02:00
 *
 * @package Swe\SpaceSDK\TeamDirectory\Profiles\OauthConsents
 * @author Luca Braun <l.braun@s-w-e.com>
 */
final class RefreshTokens extends AbstractApi
{
    /**
     * Remove a refresh token. This will require the client to re-authenticate.
     *
     * @param string $owner
     * @param string $id
     * @return void
     * @throws GuzzleException
     */
    final public function deleteRefreshToken(string $owner, string $id): void
    {
        $uri = 'team-directory/profiles/oauth-consents/{owner}/refresh-tokens/{id}';
        $uriArguments = [
            'owner' => $owner,
            'id' => $id,
        ];

        $this->client->delete($this->buildUrl($uri, $uriArguments));
    }
}
