<?php

namespace Swe\SpaceSDK\Projects\Repositories;

use Swe\SpaceSDK\AbstractApi;
use Swe\SpaceSDK\Projects\Repositories\Revisions\ExternalChecks;

/**
 * Class Revisions
 *
 * @package Swe\SpaceSDK\Projects\Repositories
 * @author Luca Braun <l.braun@s-w-e.com>
 */
class Revisions extends AbstractApi
{
    /**
     * @return ExternalChecks
     */
    public function externalChecks(): ExternalChecks
    {
        return new ExternalChecks($this->client);
    }
}