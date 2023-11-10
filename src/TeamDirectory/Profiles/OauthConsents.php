<?php

namespace Swe\SpaceSDK\TeamDirectory\Profiles;

use GuzzleHttp\Exception\GuzzleException;
use Swe\SpaceSDK\AbstractApi;
use Swe\SpaceSDK\TeamDirectory\Profiles\OauthConsents\Applications;
use Swe\SpaceSDK\TeamDirectory\Profiles\OauthConsents\ApprovedScopes;
use Swe\SpaceSDK\TeamDirectory\Profiles\OauthConsents\InternalApplications;
use Swe\SpaceSDK\TeamDirectory\Profiles\OauthConsents\Me;
use Swe\SpaceSDK\TeamDirectory\Profiles\OauthConsents\RefreshTokens;

/**
 * Class OauthConsents
 * Generated at 2023-11-10 04:08
 *
 * @package Swe\SpaceSDK\TeamDirectory\Profiles
 * @author Luca Braun <l.braun@s-w-e.com>
 */
final class OauthConsents extends AbstractApi
{
    /**
     * Get all OAuth consents for a given profile ID
     *
     * @param string $owner
     * @param array $response
     * @return array
     * @throws GuzzleException
     */
    final public function getOauthConsents(string $owner, array $response = []): array
    {
        $uri = 'team-directory/profiles/oauth-consents/{owner}';
        $uriArguments = [
            'owner' => $owner,
        ];

        return $this->client->get($this->buildUrl($uri, $uriArguments), [], $response);
    }

    /**
     * @return Me
     */
    final public function me(): Me
    {
        return new Me($this->client);
    }

    /**
     * @return Applications
     */
    final public function applications(): Applications
    {
        return new Applications($this->client);
    }

    /**
     * @return ApprovedScopes
     */
    final public function approvedScopes(): ApprovedScopes
    {
        return new ApprovedScopes($this->client);
    }

    /**
     * @return InternalApplications
     */
    final public function internalApplications(): InternalApplications
    {
        return new InternalApplications($this->client);
    }

    /**
     * @return RefreshTokens
     */
    final public function refreshTokens(): RefreshTokens
    {
        return new RefreshTokens($this->client);
    }
}
