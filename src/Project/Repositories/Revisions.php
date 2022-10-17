<?php

namespace Swe\SpaceSDK\Project\Repositories;

use Swe\SpaceSDK\AbstractApi;
use Swe\SpaceSDK\Project\Repositories\Revisions\ExternalChecks;

/**
 * Class Revisions
 *
 * @package Swe\SpaceSDK\Project\Repositories
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