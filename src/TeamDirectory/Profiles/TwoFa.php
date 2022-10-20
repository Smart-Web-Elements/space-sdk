<?php

namespace Swe\SpaceSDK\TeamDirectory\Profiles;

use Swe\SpaceSDK\AbstractApi;
use Swe\SpaceSDK\TeamDirectory\Profiles\TwoFa\Requirements;
use Swe\SpaceSDK\TeamDirectory\Profiles\TwoFa\Status;
use Swe\SpaceSDK\TeamDirectory\Profiles\TwoFa\Totp;

/**
 * Class TwoFa
 *
 * @package Swe\SpaceSDK\TeamDirectory\Profiles
 * @author Luca Braun <l.braun@s-w-e.com>
 */
class TwoFa extends AbstractApi
{
    /**
     * @return Requirements
     */
    public function requirements(): Requirements
    {
        return new Requirements($this->client);
    }

    /**
     * @return Status
     */
    public function status(): Status
    {
        return new Status($this->client);
    }

    /**
     * @return Totp
     */
    public function totp(): Totp
    {
        return new Totp($this->client);
    }
}