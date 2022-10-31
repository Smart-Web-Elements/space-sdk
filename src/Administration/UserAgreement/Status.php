<?php

namespace Swe\SpaceSDK\Administration\UserAgreement;

use GuzzleHttp\Exception\GuzzleException;
use Swe\SpaceSDK\AbstractApi;

/**
 * Class Status
 *
 * @package Swe\SpaceSDK\Administration\UserAgreement
 * @author Luca Braun <l.braun@s-w-e.com>
 */
final class Status extends AbstractApi
{
    /**
     * Permissions that may be checked: Superadmin
     *
     * @param array $request
     * @param array $response
     * @return array
     * @throws GuzzleException
     */
    final public function getAllUserAgreementStatuses(array $request = [], array $response = []): array
    {
        $uri = 'administration/user-agreement/status';

        return $this->client->get($this->buildUrl($uri), $request, $response);
    }

    /**
     * Permissions that may be checked: Superadmin
     *
     * @param string $profile
     * @param array $response
     * @return array
     * @throws GuzzleException
     */
    final public function getUserAgreementStatusForAProfile(string $profile, array $response = []): array
    {
        $uri = 'administration/user-agreement/status/{profile}';
        $uriArguments = [
            'profile' => $profile,
        ];

        return $this->client->get($this->buildUrl($uri, $uriArguments), [], $response);
    }
}
