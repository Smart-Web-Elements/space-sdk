<?php

namespace Swe\SpaceSDK\Projects\Repositories;

use Swe\SpaceSDK\AbstractApi;
use Swe\SpaceSDK\Projects\Repositories\Revisions\ExternalChecks;

/**
 * Class Revisions
 * Generated at 2024-02-07 02:00
 *
 * @package Swe\SpaceSDK\Projects\Repositories
 * @author Luca Braun <l.braun@s-w-e.com>
 */
final class Revisions extends AbstractApi
{
    /**
     * @return ExternalChecks
     */
    final public function externalChecks(): ExternalChecks
    {
        return new ExternalChecks($this->client);
    }
}
