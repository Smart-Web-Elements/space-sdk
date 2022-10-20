<?php

namespace Swe\SpaceSDK\TeamDirectory\Profiles\OAuthConsents;

use GuzzleHttp\Exception\GuzzleException;
use Swe\SpaceSDK\AbstractApi;

/**
 * Class RefreshTokens
 *
 * @package Swe\SpaceSDK\TeamDirectory\Profiles\OAuthConsents
 * @author Luca Braun <l.braun@s-w-e.com>
 */
class RefreshTokens extends AbstractApi
{
    /**
     * Remove a refresh token. This will require the client to re-authenticate.
     *
     * @param string $owner
     * @param string $id
     * @return void
     * @throws GuzzleException
     */
    public function deleteRefreshToken(string $owner, string $id): void
    {
        $uri = 'team-directory/profiles/oauth-consents/{owner}/refresh-tokens/{id}';
        $uriArguments = [
            'owner' => $owner,
            'id' => $id,
        ];

        $this->client->delete($this->buildUrl($uri, $uriArguments));
    }
}