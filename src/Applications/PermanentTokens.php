<?php

namespace Swe\SpaceSDK\Applications;

use GuzzleHttp\Exception\GuzzleException;
use Swe\SpaceSDK\AbstractApi;
use Swe\SpaceSDK\Applications\PermanentTokens\Current;
use Swe\SpaceSDK\Exception\MissingArgumentException;
use Swe\SpaceSDK\Type;

/**
 * Class PermanentTokens
 *
 * @package Swe\SpaceSDK\Applications
 * @author Luca Braun <l.braun@s-w-e.com>
 */
final class PermanentTokens extends AbstractApi
{
    /**
     * Create a permanent token for the given application that can be used to access the current organization
     *
     * Permissions that may be checked: Applications.Edit
     *
     * @param array $application
     * @param array $data
     * @param array $response
     * @return array
     * @throws GuzzleException
     * @throws MissingArgumentException
     */
    final public function createPermanentToken(array $application, array $data, array $response = []): array
    {
        $uri = 'applications/{application}/permanent-tokens';
        $required = [
            'name' => Type::String,
            'scope' => Type::String,
        ];
        $this->throwIfInvalid($required, $data);
        $uriArguments = [
            'application' => $application,
        ];

        return $this->client->post($this->buildUrl($uri, $uriArguments), $data, [], $response);
    }

    /**
     * Get permanent tokens used to access the current organization by the given application
     *
     * Permissions that may be checked: Applications.ViewSecrets
     *
     * @param array $application
     * @param array $request
     * @param array $response
     * @return array
     * @throws GuzzleException
     */
    final public function getAllPermanentTokens(array $application, array $request = [], array $response = []): array
    {
        $uri = 'applications/{application}/permanent-tokens';
        $uriArguments = [
            'application' => $application,
        ];

        return $this->client->get($this->buildUrl($uri, $uriArguments), $request, $response);
    }

    /**
     * Update an existing personal token used to access the current organization. The permanent token's name and/or scope can be updated.
     *
     * Permissions that may be checked: Applications.Edit
     *
     * @param array $application
     * @param string $tokenId
     * @param array $data
     * @return void
     * @throws GuzzleException
     */
    final public function updatePermanentToken(array $application, string $tokenId, array $data = []): void
    {
        $uri = 'applications/{application}/permanent-tokens/{tokenId}';
        $uriArguments = [
            'application' => $application,
            'tokenId' => $tokenId,
        ];

        $this->client->patch($this->buildUrl($uri, $uriArguments), $data);
    }

    /**
     * Delete a personal token used to access the current organization
     *
     * Permissions that may be checked: Applications.Edit
     *
     * @param array $application
     * @param string $tokenId
     * @return void
     * @throws GuzzleException
     */
    final public function deletePermanentToken(array $application, string $tokenId): void
    {
        $uri = 'applications/{application}/permanent-tokens/{tokenId}';
        $uriArguments = [
            'application' => $application,
            'tokenId' => $tokenId,
        ];

        $this->client->delete($this->buildUrl($uri, $uriArguments));
    }

    /**
     * @return Current
     */
    final public function current(): Current
    {
        return new Current($this->client);
    }
}
