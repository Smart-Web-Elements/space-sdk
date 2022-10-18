<?php

namespace Swe\SpaceSDK\Administration;

use GuzzleHttp\Exception\GuzzleException;
use Swe\SpaceSDK\AbstractApi;
use Swe\SpaceSDK\Administration\UserAgreement\Enabled;
use Swe\SpaceSDK\Administration\UserAgreement\Status;
use Swe\SpaceSDK\Exception\MissingArgumentException;

/**
 * Class UserAgreement
 *
 * @package Swe\SpaceSDK\Administration
 * @author Luca Braun <l.braun@s-w-e.com>
 */
class UserAgreement extends AbstractApi
{
    /**
     * This endpoint doesn't require any permissions.
     *
     * @param array $response
     * @return array
     * @throws GuzzleException
     */
    public function getUserAgreement(array $response = []): array
    {
        $uri = 'administration/user-agreement';

        return $this->client->get($this->buildUrl($uri), $response);
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
    public function uploadNewUserAgreement(array $data, array $response = []): array
    {
        $uri = 'administration/user-agreement';
        $required = [
            'newContent' => self::TYPE_STRING,
            'invalidate' => self::TYPE_BOOLEAN,
        ];
        $this->throwIfInvalid($required, $data);

        return $this->client->patch($this->buildUrl($uri), $data, $response);
    }

    /**
     * @return Enabled
     */
    public function enabled(): Enabled
    {
        return new Enabled($this->client);
    }

    /**
     * @return Status
     */
    public function status(): Status
    {
        return new Status($this->client);
    }
}