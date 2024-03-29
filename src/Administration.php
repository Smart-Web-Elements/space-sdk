<?php

namespace Swe\SpaceSDK;

use Swe\SpaceSDK\Administration\Support;
use Swe\SpaceSDK\Administration\UserAgreement;

/**
 * Class Administration
 * Generated at 2024-03-16 02:07
 *
 * @package Swe\SpaceSDK
 * @author Luca Braun <l.braun@s-w-e.com>
 */
final class Administration extends AbstractApi
{
    /**
     * @return Support
     */
    final public function support(): Support
    {
        return new Support($this->client);
    }

    /**
     * @return UserAgreement
     */
    final public function userAgreement(): UserAgreement
    {
        return new UserAgreement($this->client);
    }
}
