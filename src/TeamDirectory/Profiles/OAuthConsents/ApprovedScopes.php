<?php

namespace Swe\SpaceSDK\TeamDirectory\Profiles\OAuthConsents;

use GuzzleHttp\Exception\GuzzleException;
use Swe\SpaceSDK\AbstractApi;

/**
 * Class ApprovedScopes
 *
 * @package Swe\SpaceSDK\TeamDirectory\Profiles\OAuthConsents
 * @author Luca Braun <l.braun@s-w-e.com>
 */
class ApprovedScopes extends AbstractApi
{
    /**
     * Remove a previously approved scope.
     *
     * @param string $owner
     * @param string $id
     * @return void
     * @throws GuzzleException
     */
    public function deleteApprovedScope(string $owner, string $id): void
    {
        $uri = 'team-directory/profiles/oauth-consents/{owner}/approved-scopes/{id}';
        $uriArguments = [
            'owner' => $owner,
            'id' => $id,
        ];

        $this->client->delete($this->buildUrl($uri, $uriArguments));
    }
}