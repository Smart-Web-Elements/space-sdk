<?php

namespace Swe\SpaceSDK;

use Swe\SpaceSDK\Administration\Support;
use Swe\SpaceSDK\Administration\UserAgreement;

/**
 * Class Administration
 * Generated at 2023-10-06 07:26
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
