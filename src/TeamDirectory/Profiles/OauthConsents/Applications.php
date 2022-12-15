<?php

namespace Swe\SpaceSDK\TeamDirectory\Profiles\OauthConsents;

use GuzzleHttp\Exception\GuzzleException;
use Swe\SpaceSDK\AbstractApi;

/**
 * Class Applications
 * Generated at 2022-12-15 02:00
 *
 * @package Swe\SpaceSDK\TeamDirectory\Profiles\OauthConsents
 * @author Luca Braun <l.braun@s-w-e.com>
 */
final class Applications extends AbstractApi
{
    /**
     * Remove a previously approved application
     *
     * @param string $owner
     * @param string $application
     * @return void
     * @throws GuzzleException
     */
    final public function deleteApplication(string $owner, string $application): void
    {
        $uri = 'team-directory/profiles/oauth-consents/{owner}/applications/{application}';
        $uriArguments = [
            'owner' => $owner,
            'application' => $application,
        ];

        $this->client->delete($this->buildUrl($uri, $uriArguments));
    }
}
