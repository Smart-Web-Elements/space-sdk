<?php

namespace Swe\SpaceSDK\TeamDirectory\Profiles;

use GuzzleHttp\Exception\GuzzleException;
use Swe\SpaceSDK\AbstractApi;
use Swe\SpaceSDK\TeamDirectory\Profiles\OAuthConsents\Applications;
use Swe\SpaceSDK\TeamDirectory\Profiles\OAuthConsents\ApprovedScopes;
use Swe\SpaceSDK\TeamDirectory\Profiles\OAuthConsents\InternalApplications;
use Swe\SpaceSDK\TeamDirectory\Profiles\OAuthConsents\RefreshTokens;

/**
 * Class OAuthConsents
 *
 * @package Swe\SpaceSDK\TeamDirectory\Profiles
 * @author Luca Braun <l.braun@s-w-e.com>
 */
class OAuthConsents extends AbstractApi
{
    /**
     * Get all OAuth consents for a given profile ID.
     *
     * @param string $owner
     * @param array $response
     * @return array
     * @throws GuzzleException
     */
    public function getOAuthConsents(string $owner, array $response = []): array
    {
        $uri = 'team-directory/profiles/oauth-consents/{owner}';
        $uriArguments = [
            'owner' => $owner,
        ];

        return $this->client->get($this->buildUrl($uri, $uriArguments), $response);
    }

    /**
     * @return Applications
     */
    public function applications(): Applications
    {
        return new Applications($this->client);
    }

    /**
     * @return ApprovedScopes
     */
    public function approvedScopes(): ApprovedScopes
    {
        return new ApprovedScopes($this->client);
    }

    /**
     * @return InternalApplications
     */
    public function internalApplications(): InternalApplications
    {
        return new InternalApplications($this->client);
    }

    /**
     * @return RefreshTokens
     */
    public function refreshTokens(): RefreshTokens
    {
        return new RefreshTokens($this->client);
    }
}