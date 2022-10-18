<?php

namespace Swe\SpaceSDK\Applications\Authorizations;

use GuzzleHttp\Exception\GuzzleException;
use Swe\SpaceSDK\AbstractApi;
use Swe\SpaceSDK\Exception\MissingArgumentException;

/**
 * Class RequiredRights
 *
 * @package Swe\SpaceSDK\Applications\Authorizations
 * @author Luca Braun <l.braun@s-w-e.com>
 */
class RequiredRights extends AbstractApi
{
    /**
     * List required rights for an application.
     *
     * Permissions that may be checked: Applications.View
     *
     * @param string $application
     * @param array $response
     * @return array
     * @throws GuzzleException
     */
    public function getAllRequiredRights(string $application, array $response = []): array
    {
        $uri = 'applications/{application}/authorizations/required-rights';
        $uriArguments = [
            'application' => $application,
        ];

        return $this->client->get($this->buildUrl($uri, $uriArguments), $response);
    }

    /**
     * Update list of required rights for an application.
     *
     * Permissions that may be checked: Applications.Edit
     *
     * @param string $application
     * @param array $data
     * @return void
     * @throws GuzzleException
     * @throws MissingArgumentException
     */
    public function updateRequiredRight(string $application, array $data): void
    {
        $uri = 'applications/{application}/authorizations/required-rights';
        $required = [
            'rightCodesToAdd' => self::TYPE_ARRAY,
            'rightCodesToRemove' => self::TYPE_ARRAY,
            'requestRightsInAuthorizedContexts' => self::TYPE_BOOLEAN,
        ];
        $this->throwIfInvalid($required, $data);
        $uriArguments = [
            'application' => $application,
        ];

        $this->client->patch($this->buildUrl($uri, $uriArguments), $data);
    }
}