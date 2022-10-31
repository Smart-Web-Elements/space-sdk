<?php

namespace Swe\SpaceSDK\Applications\Authorizations;

use GuzzleHttp\Exception\GuzzleException;
use Swe\SpaceSDK\AbstractApi;
use Swe\SpaceSDK\Exception\MissingArgumentException;
use Swe\SpaceSDK\Type;

/**
 * Class AuthorizedRights
 *
 * @package Swe\SpaceSDK\Applications\Authorizations
 * @author Luca Braun <l.braun@s-w-e.com>
 */
final class AuthorizedRights extends AbstractApi
{
    /**
     * List authorized rights of an application in specified context
     *
     * Permissions that may be checked: Applications.View
     *
     * @param array $application
     * @param array $request
     * @param array $response
     * @return array
     * @throws GuzzleException
     * @throws MissingArgumentException
     */
    final public function getAllAuthorizedRights(array $application, array $request, array $response = []): array
    {
        $uri = 'applications/{application}/authorizations/authorized-rights';
        $required = [
            'contextIdentifier' => Type::Array,
        ];
        $this->throwIfInvalid($required, $request);
        $uriArguments = [
            'application' => $application,
        ];

        return $this->client->get($this->buildUrl($uri, $uriArguments), $request, $response);
    }

    /**
     * Generic method for editing authorized right status in given context.
     *
     * @param array $application
     * @param array $data
     * @return void
     * @throws GuzzleException
     * @throws MissingArgumentException
     */
    final public function updateAuthorizedRight(array $application, array $data): void
    {
        $uri = 'applications/{application}/authorizations/authorized-rights';
        $required = [
            'contextIdentifier' => Type::Array,
            'updates' => Type::Array,
        ];
        $this->throwIfInvalid($required, $data);
        $uriArguments = [
            'application' => $application,
        ];

        $this->client->patch($this->buildUrl($uri, $uriArguments), $data);
    }

    /**
     * Request rights for an application in specified context
     *
     * Permissions that may be checked: Applications.Edit
     *
     * @param array $application
     * @param array $data
     * @return void
     * @throws GuzzleException
     * @throws MissingArgumentException
     */
    final public function requestRights(array $application, array $data): void
    {
        $uri = 'applications/{application}/authorizations/authorized-rights/request-rights';
        $required = [
            'contextIdentifier' => Type::Array,
            'rightCodes' => Type::Array,
        ];
        $this->throwIfInvalid($required, $data);
        $uriArguments = [
            'application' => $application,
        ];

        $this->client->patch($this->buildUrl($uri, $uriArguments), $data);
    }

    /**
     * Remove application authorization in specified context
     *
     * @param array $application
     * @param array $request
     * @return void
     * @throws GuzzleException
     * @throws MissingArgumentException
     */
    final public function deleteAuthorizedRight(array $application, array $request): void
    {
        $uri = 'applications/{application}/authorizations/authorized-rights';
        $required = [
            'contextIdentifier' => Type::Array,
        ];
        $this->throwIfInvalid($required, $request);
        $uriArguments = [
            'application' => $application,
        ];

        $this->client->delete($this->buildUrl($uri, $uriArguments), $request);
    }
}
