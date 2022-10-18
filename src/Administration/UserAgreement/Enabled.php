<?php

namespace Swe\SpaceSDK\Administration\UserAgreement;

use GuzzleHttp\Exception\GuzzleException;
use Swe\SpaceSDK\AbstractApi;

/**
 * Class Enabled
 *
 * @package Swe\SpaceSDK\Administration\UserAgreement
 * @author Luca Braun <l.braun@s-w-e.com>
 */
class Enabled extends AbstractApi
{
    /**
     * Permissions that may be checked: Superadmin
     *
     * @param bool $enabled
     * @return void
     * @throws GuzzleException
     */
    public function enableDisableUserAgreement(bool $enabled): void
    {
        $uri = 'administration/user-agreement/enabled';
        $data = [
            'enabled' => $enabled,
        ];

        $this->client->post($this->buildUrl($uri), $data);
    }

    /**
     * This endpoint doesn't require any permissions.
     *
     * @return bool
     * @throws GuzzleException
     */
    public function isUserAgreementEnabled(): bool
    {
        $uri = 'administration/user-agreement/enabled';

        return (bool)$this->client->get($this->buildUrl($uri))[0];
    }

    /**
     * Permissions that may be checked: Superadmin
     *
     * @return void
     * @throws GuzzleException
     */
    public function enableUserAgreement(): void
    {
        $this->enableDisableUserAgreement(true);
    }

    /**
     * Permissions that may be checked: Superadmin
     *
     * @return void
     * @throws GuzzleException
     */
    public function disableUserAgreement(): void
    {
        $this->enableDisableUserAgreement(false);
    }
}