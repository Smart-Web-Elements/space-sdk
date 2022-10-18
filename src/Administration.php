<?php

namespace Swe\SpaceSDK;

use Swe\SpaceSDK\Administration\Support;
use Swe\SpaceSDK\Administration\UserAgreement;

/**
 * Class Administration
 *
 * @package Swe\SpaceSDK
 * @author Luca Braun <l.braun@s-w-e.com>
 */
class Administration extends AbstractApi
{
    /**
     * @return Support
     */
    public function support(): Support
    {
        return new Support($this->client);
    }

    /**
     * @return UserAgreement
     */
    public function userAgreement(): UserAgreement
    {
        return new UserAgreement($this->client);
    }
}