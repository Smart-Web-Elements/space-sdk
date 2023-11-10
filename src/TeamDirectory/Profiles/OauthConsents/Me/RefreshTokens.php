<?php

namespace Swe\SpaceSDK\TeamDirectory\Profiles\OauthConsents\Me;

use Swe\SpaceSDK\AbstractApi;
use Swe\SpaceSDK\TeamDirectory\Profiles\OauthConsents\Me\RefreshTokens\ClassSelf;

/**
 * Class RefreshTokens
 * Generated at 2023-11-10 04:08
 *
 * @package Swe\SpaceSDK\TeamDirectory\Profiles\OauthConsents\Me
 * @author Luca Braun <l.braun@s-w-e.com>
 */
final class RefreshTokens extends AbstractApi
{
    /**
     * @return ClassSelf
     */
    final public function classSelf(): ClassSelf
    {
        return new ClassSelf($this->client);
    }
}
