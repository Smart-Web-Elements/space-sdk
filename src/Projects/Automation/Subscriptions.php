<?php

namespace Swe\SpaceSDK\Projects\Automation;

use Swe\SpaceSDK\AbstractApi;
use Swe\SpaceSDK\Projects\Automation\Subscriptions\LegacyChannels;

/**
 * Class Subscriptions
 *
 * @package Swe\SpaceSDK\Projects\Automation
 * @author Luca Braun <l.braun@s-w-e.com>
 */
class Subscriptions extends AbstractApi
{
    /**
     * @return LegacyChannels
     */
    public function legacyChannels(): LegacyChannels
    {
        return new LegacyChannels($this->client);
    }
}