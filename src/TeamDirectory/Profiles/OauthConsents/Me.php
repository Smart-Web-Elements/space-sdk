<?php

namespace Swe\SpaceSDK\TeamDirectory\Profiles\OauthConsents;

use Swe\SpaceSDK\AbstractApi;
use Swe\SpaceSDK\TeamDirectory\Profiles\OauthConsents\Me\RefreshTokens;

/**
 * Class Me
 * Generated at 2023-10-06 07:26
 *
 * @package Swe\SpaceSDK\TeamDirectory\Profiles\OauthConsents
 * @author Luca Braun <l.braun@s-w-e.com>
 */
final class Me extends AbstractApi
{
    /**
     * @return RefreshTokens
     */
    final public function refreshTokens(): RefreshTokens
    {
        return new RefreshTokens($this->client);
    }
}
