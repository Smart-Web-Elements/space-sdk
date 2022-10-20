<?php

namespace Swe\SpaceSDK\TeamDirectory\Profiles\OAuthConsents;

use GuzzleHttp\Exception\GuzzleException;
use Swe\SpaceSDK\AbstractApi;

/**
 * Class InternalApplications
 *
 * @package Swe\SpaceSDK\TeamDirectory\Profiles\OAuthConsents
 * @author Luca Braun <l.braun@s-w-e.com>
 */
class InternalApplications extends AbstractApi
{
    /**
     * Remove a previously approved internal application.
     *
     * @param string $owner
     * @param string $clientId
     * @return void
     * @throws GuzzleException
     */
    public function deleteInternalApplication(string $owner, string $clientId): void
    {
        $uri = 'team-directory/profiles/oauth-consents/{owner}/internal-applications/{clientId}';
        $uriArguments = [
            'owner' => $owner,
            'clientId' => $clientId,
        ];

        $this->client->delete($this->buildUrl($uri, $uriArguments));
    }
}