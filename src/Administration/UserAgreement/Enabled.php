<?php

namespace Swe\SpaceSDK\Administration\UserAgreement;

use GuzzleHttp\Exception\GuzzleException;
use Swe\SpaceSDK\AbstractApi;
use Swe\SpaceSDK\Exception\MissingArgumentException;
use Swe\SpaceSDK\Type;

/**
 * Class Enabled
 * Generated at 2023-07-28 02:08
 *
 * @package Swe\SpaceSDK\Administration\UserAgreement
 * @author Luca Braun <l.braun@s-w-e.com>
 */
final class Enabled extends AbstractApi
{
    /**
     * Permissions that may be checked: Superadmin
     *
     * @param array $data
     * @return void
     * @throws GuzzleException
     * @throws MissingArgumentException
     */
    final public function enableDisableUserAgreement(array $data): void
    {
        $uri = 'administration/user-agreement/enabled';
        $required = [
            'enabled' => Type::Boolean,
        ];
        $this->throwIfInvalid($required, $data);

        $this->client->post($this->buildUrl($uri), $data);
    }

    /**
     * @return bool
     * @throws GuzzleException
     */
    final public function isUserAgreementEnabled(): bool
    {
        $uri = 'administration/user-agreement/enabled';

        return (bool)$this->client->get($this->buildUrl($uri))[0];
    }
}
