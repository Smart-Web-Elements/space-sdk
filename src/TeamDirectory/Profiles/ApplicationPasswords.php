<?php

namespace Swe\SpaceSDK\TeamDirectory\Profiles;

use GuzzleHttp\Exception\GuzzleException;
use Swe\SpaceSDK\AbstractApi;
use Swe\SpaceSDK\Exception\MissingArgumentException;
use Swe\SpaceSDK\Type;

/**
 * Class ApplicationPasswords
 *
 * @package Swe\SpaceSDK\TeamDirectory\Profiles
 * @author Luca Braun <l.braun@s-w-e.com>
 */
final class ApplicationPasswords extends AbstractApi
{
    /**
     * @param array $profile
     * @param array $data
     * @param array $response
     * @return array
     * @throws GuzzleException
     * @throws MissingArgumentException
     */
    final public function createApplicationPassword(array $profile, array $data, array $response = []): array
    {
        $uri = 'team-directory/profiles/{profile}/application-passwords';
        $required = [
            'name' => Type::String,
            'scope' => Type::String,
        ];
        $this->throwIfInvalid($required, $data);
        $uriArguments = [
            'profile' => $profile,
        ];

        return $this->client->post($this->buildUrl($uri, $uriArguments), $data, [], $response);
    }

    /**
     * @param array $profile
     * @param array $request
     * @param array $response
     * @return array
     * @throws GuzzleException
     */
    final public function getAllApplicationPasswords(array $profile, array $request = [], array $response = []): array
    {
        $uri = 'team-directory/profiles/{profile}/application-passwords';
        $uriArguments = [
            'profile' => $profile,
        ];

        return $this->client->get($this->buildUrl($uri, $uriArguments), $request, $response);
    }

    /**
     * @param array $profile
     * @param string $passwordId
     * @param array $data
     * @return void
     * @throws GuzzleException
     */
    final public function updateApplicationPassword(array $profile, string $passwordId, array $data = []): void
    {
        $uri = 'team-directory/profiles/{profile}/application-passwords/{passwordId}';
        $uriArguments = [
            'profile' => $profile,
            'passwordId' => $passwordId,
        ];

        $this->client->patch($this->buildUrl($uri, $uriArguments), $data);
    }

    /**
     * @param array $profile
     * @param string $passwordId
     * @return void
     * @throws GuzzleException
     */
    final public function deleteApplicationPassword(array $profile, string $passwordId): void
    {
        $uri = 'team-directory/profiles/{profile}/application-passwords/{passwordId}';
        $uriArguments = [
            'profile' => $profile,
            'passwordId' => $passwordId,
        ];

        $this->client->delete($this->buildUrl($uri, $uriArguments));
    }
}
