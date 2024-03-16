<?php

namespace Swe\SpaceSDK\TeamDirectory\Profiles\OauthConsents\Me\RefreshTokens;

use GuzzleHttp\Exception\GuzzleException;
use Swe\SpaceSDK\AbstractApi;

/**
 * Class ClassSelf
 * Generated at 2024-03-16 02:07
 *
 * @package Swe\SpaceSDK\TeamDirectory\Profiles\OauthConsents\Me\RefreshTokens
 * @author Luca Braun <l.braun@s-w-e.com>
 */
final class ClassSelf extends AbstractApi
{
    /**
     * Remove caller's own refresh token. This will require the client to re-authenticate.
     *
     * @return void
     * @throws GuzzleException
     */
    final public function deleteSelf(): void
    {
        $uri = 'team-directory/profiles/oauth-consents/me/refresh-tokens/self';

        $this->client->delete($this->buildUrl($uri));
    }
}
