<?php

namespace Swe\SpaceSDK\Applications;

use GuzzleHttp\Exception\GuzzleException;
use Swe\SpaceSDK\AbstractApi;
use Swe\SpaceSDK\Applications\Authorizations\AuthorizedRights;
use Swe\SpaceSDK\Applications\Authorizations\RequiredRights;
use Swe\SpaceSDK\Exception\MissingArgumentException;

/**
 * Class Authorizations
 *
 * @package Swe\SpaceSDK\Applications
 * @author Luca Braun <l.braun@s-w-e.com>
 */
class Authorizations extends AbstractApi
{
    /**
     * List applications authorized in specified context.
     *
     * Permissions that may be checked: Applications.View
     *
     * @param array $request
     * @param array $response
     * @return array
     * @throws GuzzleException
     * @throws MissingArgumentException
     */
    public function getApplicationsAuthorizedInContext(array $request, array $response = []): array
    {
        $uri = 'applications/authorizations/authorized-applications';
        $required = [
            'contextIdentifier' => self::TYPE_STRING,
        ];
        $this->throwIfInvalid($required, $request);

        return $this->client->get($this->buildUrl($uri), $response, $request);
    }

    /**
     * List authorized contexts of an application.
     *
     * Permissions that may be checked: Applications.View
     *
     * @param string $application
     * @param array $response
     * @return array
     * @throws GuzzleException
     */
    public function getAllAuthorizedContexts(string $application, array $response = []): array
    {
        $uri = 'applications/{application}/authorizations/authorized-contexts';
        $uriArguments = [
            'application' => $application,
        ];

        return $this->client->get($this->buildUrl($uri, $uriArguments), $response);
    }

    /**
     * @return AuthorizedRights
     */
    public function authorizedRights(): AuthorizedRights
    {
        return new AuthorizedRights($this->client);
    }

    /**
     * @return RequiredRights
     */
    public function requiredRights(): RequiredRights
    {
        return new RequiredRights($this->client);
    }
}