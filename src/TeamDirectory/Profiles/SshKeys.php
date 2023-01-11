<?php

namespace Swe\SpaceSDK\TeamDirectory\Profiles;

use GuzzleHttp\Exception\GuzzleException;
use Swe\SpaceSDK\AbstractApi;
use Swe\SpaceSDK\Exception\MissingArgumentException;
use Swe\SpaceSDK\Type;

/**
 * Class SshKeys
 * Generated at 2023-01-11 02:01
 *
 * @package Swe\SpaceSDK\TeamDirectory\Profiles
 * @author Luca Braun <l.braun@s-w-e.com>
 */
final class SshKeys extends AbstractApi
{
    /**
     * Associate an SSH public key with the profile
     *
     * Permissions that may be checked: Profile.Edit.2
     *
     * @param string $profile
     * @param array $data
     * @return void
     * @throws GuzzleException
     * @throws MissingArgumentException
     */
    final public function addSshKey(string $profile, array $data): void
    {
        $uri = 'team-directory/profiles/{profile}/ssh-keys';
        $required = [
            'key' => Type::String,
        ];
        $this->throwIfInvalid($required, $data);
        $uriArguments = [
            'profile' => $profile,
        ];

        $this->client->post($this->buildUrl($uri, $uriArguments), $data);
    }

    /**
     * List SSH public keys associated with the profile
     *
     * @param string $profile
     * @param array $response
     * @return array
     * @throws GuzzleException
     */
    final public function sshKeys(string $profile, array $response = []): array
    {
        $uri = 'team-directory/profiles/{profile}/ssh-keys';
        $uriArguments = [
            'profile' => $profile,
        ];

        return $this->client->get($this->buildUrl($uri, $uriArguments), [], $response);
    }

    /**
     * Remove association between the profile and the SSH public key
     *
     * Permissions that may be checked: Profile.Edit.2
     *
     * @param string $profile
     * @param string $fingerprint
     * @return void
     * @throws GuzzleException
     */
    final public function deleteSshKey(string $profile, string $fingerprint): void
    {
        $uri = 'team-directory/profiles/{profile}/ssh-keys/{fingerprint}';
        $uriArguments = [
            'profile' => $profile,
            'fingerprint' => $fingerprint,
        ];

        $this->client->delete($this->buildUrl($uri, $uriArguments));
    }
}
