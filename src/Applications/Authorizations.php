<?php

namespace Swe\SpaceSDK\Applications;

use GuzzleHttp\Exception\GuzzleException;
use Swe\SpaceSDK\AbstractApi;
use Swe\SpaceSDK\Applications\Authorizations\AuthorizedRights;
use Swe\SpaceSDK\Applications\Authorizations\RequiredRights;
use Swe\SpaceSDK\Exception\MissingArgumentException;
use Swe\SpaceSDK\Type;

/**
 * Class Authorizations
 * Generated at 2024-03-06 02:53
 *
 * @package Swe\SpaceSDK\Applications
 * @author Luca Braun <l.braun@s-w-e.com>
 */
final class Authorizations extends AbstractApi
{
    /**
     * List applications authorized in specified context
     *
     * Permissions that may be checked: Applications.View
     *
     * @param array $request
     * @param array $response
     * @return array
     * @throws GuzzleException
     * @throws MissingArgumentException
     */
    final public function getApplicationsAuthorizedInContext(array $request, array $response = []): array
    {
        $uri = 'applications/authorizations/authorized-applications';
        $required = [
            'contextIdentifier' => Type::String,
        ];
        $this->throwIfInvalid($required, $request);

        return $this->client->get($this->buildUrl($uri), $request, $response);
    }

    /**
     * List authorized contexts of an application
     *
     * Permissions that may be checked: Applications.View
     *
     * @param string $application
     * @param array $response
     * @return array
     * @throws GuzzleException
     */
    final public function getAllAuthorizedContexts(string $application, array $response = []): array
    {
        $uri = 'applications/{application}/authorizations/authorized-contexts';
        $uriArguments = [
            'application' => $application,
        ];

        return $this->client->get($this->buildUrl($uri, $uriArguments), [], $response);
    }

    /**
     * @return AuthorizedRights
     */
    final public function authorizedRights(): AuthorizedRights
    {
        return new AuthorizedRights($this->client);
    }

    /**
     * @return RequiredRights
     */
    final public function requiredRights(): RequiredRights
    {
        return new RequiredRights($this->client);
    }
}
