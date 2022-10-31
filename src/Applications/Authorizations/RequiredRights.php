<?php

namespace Swe\SpaceSDK\Applications\Authorizations;

use GuzzleHttp\Exception\GuzzleException;
use Swe\SpaceSDK\AbstractApi;
use Swe\SpaceSDK\Exception\MissingArgumentException;
use Swe\SpaceSDK\Type;

/**
 * Class RequiredRights
 *
 * @package Swe\SpaceSDK\Applications\Authorizations
 * @author Luca Braun <l.braun@s-w-e.com>
 */
final class RequiredRights extends AbstractApi
{
    /**
     * List required rights for an application
     *
     * Permissions that may be checked: Applications.View
     *
     * @param array $application
     * @param array $response
     * @return array
     * @throws GuzzleException
     */
    final public function getAllRequiredRights(array $application, array $response = []): array
    {
        $uri = 'applications/{application}/authorizations/required-rights';
        $uriArguments = [
            'application' => $application,
        ];

        return $this->client->get($this->buildUrl($uri, $uriArguments), [], $response);
    }

    /**
     * Update list of required rights for an application
     *
     * Permissions that may be checked: Applications.Edit
     *
     * @param array $application
     * @param array $data
     * @return void
     * @throws GuzzleException
     * @throws MissingArgumentException
     */
    final public function updateRequiredRight(array $application, array $data): void
    {
        $uri = 'applications/{application}/authorizations/required-rights';
        $required = [
            'rightCodesToAdd' => Type::Array,
            'rightCodesToRemove' => Type::Array,
            'requestRightsInAuthorizedContexts' => Type::Boolean,
        ];
        $this->throwIfInvalid($required, $data);
        $uriArguments = [
            'application' => $application,
        ];

        $this->client->patch($this->buildUrl($uri, $uriArguments), $data);
    }
}
