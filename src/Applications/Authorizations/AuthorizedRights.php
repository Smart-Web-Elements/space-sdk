<?php

namespace Swe\SpaceSDK\Applications\Authorizations;

use GuzzleHttp\Exception\GuzzleException;
use Swe\SpaceSDK\AbstractApi;
use Swe\SpaceSDK\Exception\MissingArgumentException;

/**
 * Class AuthorizedRights
 *
 * @package Swe\SpaceSDK\Applications\Authorizations
 * @author Luca Braun <l.braun@s-w-e.com>
 */
class AuthorizedRights extends AbstractApi
{
    /**
     * List authorized rights of an application in specified context.
     *
     * Permissions that may be checked: Applications.View
     *
     * @param string $application
     * @param array $request
     * @param array $response
     * @return array
     * @throws GuzzleException
     * @throws MissingArgumentException
     */
    public function getAllAuthorizedRights(string $application, array $request, array $response = []): array
    {
        $uri = 'applications/{application}/authorizations/authorized-rights';
        $required = [
            'contextIdentifier' => self::TYPE_STRING,
        ];
        $this->throwIfInvalid($required, $request);
        $uriArguments = [
            'application' => $application,
        ];

        return $this->client->get($this->buildUrl($uri, $uriArguments), $response, $request);
    }

    /**
     * Generic method for editing authorized right status in given context.
     *
     * @param string $application
     * @param array $data
     * @return void
     * @throws GuzzleException
     * @throws MissingArgumentException
     */
    public function updateAuthorizedRight(string $application, array $data): void
    {
        $uri = 'applications/{application}/authorizations/authorized-rights';
        $required = [
            'contextIdentifier' => self::TYPE_STRING,
            'updates' => self::TYPE_ARRAY,
        ];
        $this->throwIfInvalid($required, $data);
        $uriArguments = [
            'application' => $application,
        ];

        $this->client->patch($this->buildUrl($uri, $uriArguments), $data);
    }

    /**
     * Request rights for an application in specified context.
     *
     * Permissions that may be checked: Applications.Edit
     *
     * @param string $application
     * @param array $data
     * @return void
     * @throws GuzzleException
     * @throws MissingArgumentException
     */
    public function requestRights(string $application, array $data): void
    {
        $uri = 'applications/{application}/authorizations/authorized-rights/request-rights';
        $required = [
            'contextIdentifier' => self::TYPE_STRING,
            'rightCodes' => self::TYPE_ARRAY,
        ];
        $this->throwIfInvalid($required, $data);
        $uriArguments = [
            'application' => $application,
        ];

        $this->client->patch($this->buildUrl($uri, $uriArguments), $data);
    }

    /**
     * Remove application authorization in specified context.
     *
     * @param string $application
     * @param array $request
     * @return void
     * @throws GuzzleException
     * @throws MissingArgumentException
     */
    public function deleteAuthorizedRight(string $application, array $request): void
    {
        $uri = 'applications/{application}/authorizations/authorized-rights';
        $required = [
            'contextIdentifier' => self::TYPE_STRING,
        ];
        $this->throwIfInvalid($required, $request);
        $uriArguments = [
            'application' => $application,
        ];

        $this->client->delete($this->buildUrl($uri, $uriArguments), $request);
    }
}