<?php

namespace Swe\SpaceSDK\TeamDirectory\Profiles;

use GuzzleHttp\Exception\GuzzleException;
use Swe\SpaceSDK\AbstractApi;
use Swe\SpaceSDK\Exception\MissingArgumentException;
use Swe\SpaceSDK\TeamDirectory\Profiles\PermanentTokens\Current;

/**
 * Class PermanentTokens
 *
 * @package Swe\SpaceSDK\TeamDirectory\Profiles
 * @author Luca Braun <l.braun@s-w-e.com>
 */
class PermanentTokens extends AbstractApi
{
    /**
     * Create a personal token for the given profile that can be used to access the current organization.
     *
     * Permissions that may be checked: Profile.PermanentTokens.Create
     *
     * @param string $profile
     * @param array $data
     * @param array $response
     * @return array
     * @throws GuzzleException
     * @throws MissingArgumentException
     */
    public function createPermanentToken(string $profile, array $data, array $response = []): array
    {
        $uri = 'team-directory/profiles/{profile}/permanent-tokens';
        $required = [
            'name' => self::TYPE_STRING,
            'scope' => self::TYPE_STRING,
        ];
        $this->throwIfInvalid($required, $data);
        $uriArguments = [
            'profile' => $profile,
        ];

        return $this->client->post($this->buildUrl($uri, $uriArguments), $data, $response);
    }

    /**
     * Get personal tokens used to access the current organization for the given profile.
     *
     * Permissions that may be checked: Profile.PermanentTokens.Edit
     *
     * @param string $profile
     * @param array $request
     * @param array $response
     * @return array
     * @throws GuzzleException
     */
    public function getAllPermanentTokens(string $profile, array $request = [], array $response = []): array
    {
        $uri = 'team-directory/profiles/{profile}/permanent-tokens';
        $uriArguments = [
            'profile' => $profile,
        ];

        return $this->client->get($this->buildUrl($uri, $uriArguments), $response, $request);
    }

    /**
     * Update an existing personal token used to access the current organization. The name and/or scope of the personal
     * token can be updated.
     *
     * Permissions that may be checked: Profile.PermanentTokens.Edit
     *
     * @param string $profile
     * @param string $tokenId
     * @param array $data
     * @return void
     * @throws GuzzleException
     */
    public function updatePermanentToken(string $profile, string $tokenId, array $data = []): void
    {
        $uri = 'team-directory/profiles/{profile}/permanent-tokens/{tokenId}';
        $uriArguments = [
            'profile' => $profile,
            'tokenId' => $tokenId,
        ];

        $this->client->patch($this->buildUrl($uri, $uriArguments), $data);
    }

    /**
     * Delete a specific personal token used to access the current organization.
     *
     * Permissions that may be checked: Profile.PermanentTokens.Edit
     *
     * @param string $profile
     * @param string $tokenId
     * @return void
     * @throws GuzzleException
     */
    public function deletePermanentToken(string $profile, string $tokenId): void
    {
        $uri = 'team-directory/profiles/{profile}/permanent-tokens/{tokenId}';
        $uriArguments = [
            'profile' => $profile,
            'tokenId' => $tokenId,
        ];

        $this->client->delete($this->buildUrl($uri, $uriArguments));
    }

    /**
     * @return Current
     */
    public function current(): Current
    {
        return new Current($this->client);
    }
}