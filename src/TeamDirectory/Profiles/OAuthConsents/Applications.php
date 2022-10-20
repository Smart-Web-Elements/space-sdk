<?php

namespace Swe\SpaceSDK\TeamDirectory\Profiles\OAuthConsents;

use GuzzleHttp\Exception\GuzzleException;
use Swe\SpaceSDK\AbstractApi;

/**
 * Class Applications
 *
 * @package Swe\SpaceSDK\TeamDirectory\Profiles\OAuthConsents
 * @author Luca Braun <l.braun@s-w-e.com>
 */
class Applications extends AbstractApi
{
    /**
     * Remove a previously approved application.
     *
     * @param string $owner
     * @param string $application
     * @return void
     * @throws GuzzleException
     */
    public function deleteApplication(string $owner, string $application): void
    {
        $uri = 'team-directory/profiles/oauth-consents/{owner}/applications/{application}';
        $uriArguments = [
            'owner' => $owner,
            'application' => $application,
        ];

        $this->client->delete($this->buildUrl($uri, $uriArguments));
    }
}