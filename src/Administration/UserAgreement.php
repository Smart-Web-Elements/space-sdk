<?php

namespace Swe\SpaceSDK\Administration;

use GuzzleHttp\Exception\GuzzleException;
use Swe\SpaceSDK\AbstractApi;
use Swe\SpaceSDK\Administration\UserAgreement\Enabled;
use Swe\SpaceSDK\Administration\UserAgreement\Status;
use Swe\SpaceSDK\Exception\MissingArgumentException;
use Swe\SpaceSDK\Type;

/**
 * Class UserAgreement
 * Generated at 2023-08-19 02:00
 *
 * @package Swe\SpaceSDK\Administration
 * @author Luca Braun <l.braun@s-w-e.com>
 */
final class UserAgreement extends AbstractApi
{
    /**
     * @param array $response
     * @return array|null
     * @throws GuzzleException
     */
    final public function getUserAgreement(array $response = []): ?array
    {
        $uri = 'administration/user-agreement';

        return $this->client->get($this->buildUrl($uri), [], $response);
    }

    /**
     * Permissions that may be checked: Superadmin
     *
     * @param array $data
     * @param array $response
     * @return array
     * @throws GuzzleException
     * @throws MissingArgumentException
     */
    final public function uploadNewUserAgreement(array $data, array $response = []): array
    {
        $uri = 'administration/user-agreement';
        $required = [
            'newContent' => Type::String,
            'invalidate' => Type::Boolean,
        ];
        $this->throwIfInvalid($required, $data);

        return $this->client->patch($this->buildUrl($uri), $data, [], $response);
    }

    /**
     * @return Enabled
     */
    final public function enabled(): Enabled
    {
        return new Enabled($this->client);
    }

    /**
     * @return Status
     */
    final public function status(): Status
    {
        return new Status($this->client);
    }
}
