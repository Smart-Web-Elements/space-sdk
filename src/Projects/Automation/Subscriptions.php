<?php

namespace Swe\SpaceSDK\Projects\Automation;

use Swe\SpaceSDK\AbstractApi;
use Swe\SpaceSDK\Projects\Automation\Subscriptions\LegacyChannels;

/**
 * Class Subscriptions
 * Generated at 2022-12-15 02:00
 *
 * @package Swe\SpaceSDK\Projects\Automation
 * @author Luca Braun <l.braun@s-w-e.com>
 */
final class Subscriptions extends AbstractApi
{
    /**
     * @return LegacyChannels
     */
    final public function legacyChannels(): LegacyChannels
    {
        return new LegacyChannels($this->client);
    }
}
