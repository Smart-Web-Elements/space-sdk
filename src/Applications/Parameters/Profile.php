<?php

namespace Swe\SpaceSDK\Applications\Parameters;

use GuzzleHttp\Exception\GuzzleException;
use Swe\SpaceSDK\AbstractApi;
use Swe\SpaceSDK\Exception\MissingArgumentException;
use Swe\SpaceSDK\Type;

/**
 * Class Profile
 * Generated at 2023-11-10 04:08
 *
 * @package Swe\SpaceSDK\Applications\Parameters
 * @author Luca Braun <l.braun@s-w-e.com>
 */
final class Profile extends AbstractApi
{
    /**
     * Return all profile parameters, profile and application are derived from the access token. Only accessible with a user token, issued to an application.
     *
     * @param array $response
     * @return array
     * @throws GuzzleException
     */
    final public function getAllProfileParameters(array $response = []): array
    {
        $uri = 'applications/parameters/profile';

        return $this->client->get($this->buildUrl($uri), [], $response);
    }

    /**
     * Get profile parameter by key, profile and application are derived from the access token. Only accessible with a user token, issued to an application.
     *
     * @param string $key
     * @return string
     * @throws GuzzleException
     */
    final public function getProfileParameter(string $key): string
    {
        $uri = 'applications/parameters/profile/{key}';
        $uriArguments = [
            'key' => $key,
        ];

        return (string)$this->client->get($this->buildUrl($uri, $uriArguments))[0];
    }

    /**
     * Set profile parameter by key, profile and application are derived from the access token. Only accessible with a user token, issued to an application. There is a limit of 100 app parameters per app per profile. The key cannot be longer than 64 characters. The value cannot be longer than 1000 characters.
     *
     * @param string $key
     * @param array $data
     * @return void
     * @throws GuzzleException
     * @throws MissingArgumentException
     */
    final public function setProfileParameter(string $key, array $data): void
    {
        $uri = 'applications/parameters/profile/{key}';
        $required = [
            'value' => Type::String,
        ];
        $this->throwIfInvalid($required, $data);
        $uriArguments = [
            'key' => $key,
        ];

        $this->client->patch($this->buildUrl($uri, $uriArguments), $data);
    }

    /**
     * Remove profile parameter by key, profile and application are derived from the access token. Only accessible with a user token, issued to an application.
     *
     * @param string $key
     * @return void
     * @throws GuzzleException
     */
    final public function removeProfileParameter(string $key): void
    {
        $uri = 'applications/parameters/profile/{key}';
        $uriArguments = [
            'key' => $key,
        ];

        $this->client->delete($this->buildUrl($uri, $uriArguments));
    }
}
