<?php

namespace Swe\SpaceSDK\TeamDirectory\Profiles\OauthConsents;

use GuzzleHttp\Exception\GuzzleException;
use Swe\SpaceSDK\AbstractApi;

/**
 * Class ApprovedScopes
 * Generated at 2023-07-13 02:15
 *
 * @package Swe\SpaceSDK\TeamDirectory\Profiles\OauthConsents
 * @author Luca Braun <l.braun@s-w-e.com>
 */
final class ApprovedScopes extends AbstractApi
{
    /**
     * Remove a previously approved scope
     *
     * @param string $owner
     * @param string $id
     * @return void
     * @throws GuzzleException
     */
    final public function deleteApprovedScope(string $owner, string $id): void
    {
        $uri = 'team-directory/profiles/oauth-consents/{owner}/approved-scopes/{id}';
        $uriArguments = [
            'owner' => $owner,
            'id' => $id,
        ];

        $this->client->delete($this->buildUrl($uri, $uriArguments));
    }
}
