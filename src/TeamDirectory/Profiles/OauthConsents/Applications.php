<?php

namespace Swe\SpaceSDK\TeamDirectory\Profiles\OauthConsents;

use GuzzleHttp\Exception\GuzzleException;
use Swe\SpaceSDK\AbstractApi;

/**
 * Class Applications
 *
 * @package Swe\SpaceSDK\TeamDirectory\Profiles\OauthConsents
 * @author Luca Braun <l.braun@s-w-e.com>
 */
final class Applications extends AbstractApi
{
    /**
     * Remove a previously approved application
     *
     * @param array $owner
     * @param array $application
     * @return void
     * @throws GuzzleException
     */
    final public function deleteApplication(array $owner, array $application): void
    {
        $uri = 'team-directory/profiles/oauth-consents/{owner}/applications/{application}';
        $uriArguments = [
            'owner' => $owner,
            'application' => $application,
        ];

        $this->client->delete($this->buildUrl($uri, $uriArguments));
    }
}
