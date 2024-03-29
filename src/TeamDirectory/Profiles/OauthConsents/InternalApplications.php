<?php

namespace Swe\SpaceSDK\TeamDirectory\Profiles\OauthConsents;

use GuzzleHttp\Exception\GuzzleException;
use Swe\SpaceSDK\AbstractApi;

/**
 * Class InternalApplications
 * Generated at 2024-03-16 02:07
 *
 * @package Swe\SpaceSDK\TeamDirectory\Profiles\OauthConsents
 * @author Luca Braun <l.braun@s-w-e.com>
 */
final class InternalApplications extends AbstractApi
{
    /**
     * Remove a previously approved internal application
     *
     * @param string $owner
     * @param string $clientId
     * @return void
     * @throws GuzzleException
     */
    final public function deleteInternalApplication(string $owner, string $clientId): void
    {
        $uri = 'team-directory/profiles/oauth-consents/{owner}/internal-applications/{clientId}';
        $uriArguments = [
            'owner' => $owner,
            'clientId' => $clientId,
        ];

        $this->client->delete($this->buildUrl($uri, $uriArguments));
    }
}
