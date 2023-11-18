<?php

namespace Swe\SpaceSDK\TeamDirectory\Profiles;

use Swe\SpaceSDK\AbstractApi;
use Swe\SpaceSDK\TeamDirectory\Profiles\TwoFa\Requirements;
use Swe\SpaceSDK\TeamDirectory\Profiles\TwoFa\Status;
use Swe\SpaceSDK\TeamDirectory\Profiles\TwoFa\Totp;

/**
 * Class TwoFa
 * Generated at 2023-11-18 04:46
 *
 * @package Swe\SpaceSDK\TeamDirectory\Profiles
 * @author Luca Braun <l.braun@s-w-e.com>
 */
final class TwoFa extends AbstractApi
{
    /**
     * @return Requirements
     */
    final public function requirements(): Requirements
    {
        return new Requirements($this->client);
    }

    /**
     * @return Status
     */
    final public function status(): Status
    {
        return new Status($this->client);
    }

    /**
     * @return Totp
     */
    final public function totp(): Totp
    {
        return new Totp($this->client);
    }
}
