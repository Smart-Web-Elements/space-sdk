<?php

namespace Swe\SpaceSDK\ExternalIssues;

use Swe\SpaceSDK\AbstractApi;
use Swe\SpaceSDK\ExternalIssues\Issues\CodeReviews;
use Swe\SpaceSDK\ExternalIssues\Issues\Commits;

/**
 * Class Issues
 * Generated at 2023-11-18 04:46
 *
 * @package Swe\SpaceSDK\ExternalIssues
 * @author Luca Braun <l.braun@s-w-e.com>
 */
final class Issues extends AbstractApi
{
    /**
     * @return CodeReviews
     */
    final public function codeReviews(): CodeReviews
    {
        return new CodeReviews($this->client);
    }

    /**
     * @return Commits
     */
    final public function commits(): Commits
    {
        return new Commits($this->client);
    }
}
