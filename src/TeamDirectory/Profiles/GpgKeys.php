<?php

namespace Swe\SpaceSDK\TeamDirectory\Profiles;

use GuzzleHttp\Exception\GuzzleException;
use Swe\SpaceSDK\AbstractApi;
use Swe\SpaceSDK\Exception\MissingArgumentException;

/**
 * Class GpgKeys
 *
 * @package Swe\SpaceSDK\TeamDirectory\Profiles
 * @author Luca Braun <l.braun@s-w-e.com>
 */
class GpgKeys extends AbstractApi
{
    /**
     * Permissions that may be checked: Profile.Edit.2
     *
     * @param string $profile
     * @param array $data
     * @param array $response
     * @return array
     * @throws GuzzleException
     * @throws MissingArgumentException
     */
    public function addPublicGpgKey(string $profile, array $data, array $response = []): array
    {
        $uri = 'team-directory/profiles/{profile}/gpg-keys';
        $required = [
            'key' => self::TYPE_STRING,
        ];
        $this->throwIfInvalid($required, $data);
        $uriArguments = [
            'profile' => $profile,
        ];

        return $this->client->post($this->buildUrl($uri, $uriArguments), $data, $response);
    }

    /**
     * List GPG public keys associated with a profile.
     *
     * This endpoint doesn't require any permissions.
     *
     * @param string $profile
     * @param array $response
     * @return array
     * @throws GuzzleException
     */
    public function listPublicGpgKeys(string $profile, array $response = []): array
    {
        $uri = 'team-directory/profiles/{profile}/gpg-keys';
        $uriArguments = [
            'profile' => $profile,
        ];

        return $this->client->get($this->buildUrl($uri, $uriArguments), $response);
    }

    /**
     * Permissions that may be checked: Profile.Edit.2
     *
     * @param string $profile
     * @param string $fingerprint
     * @param array $data
     * @return void
     * @throws GuzzleException
     */
    public function revokePublicGpgKey(string $profile, string $fingerprint, array $data = []): void
    {
        $uri = 'team-directory/profiles/{profile}/gpg-keys/{fingerprint}';
        $uriArguments = [
            'profile' => $profile,
            'fingerprint' => $fingerprint,
        ];

        $this->client->patch($this->buildUrl($uri, $uriArguments), $data);
    }

    /**
     * Permissions that may be checked: Profile.Edit.2
     *
     * @param string $profile
     * @param string $fingerprint
     * @return void
     * @throws GuzzleException
     */
    public function deletePublicGpgKey(string $profile, string $fingerprint): void
    {
        $uri = 'team-directory/profiles/{profile}/gpg-keys/{fingerprint}';
        $uriArguments = [
            'profile' => $profile,
            'fingerprint' => $fingerprint,
        ];

        $this->client->delete($this->buildUrl($uri, $uriArguments));
    }
}