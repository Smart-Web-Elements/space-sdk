<?php

namespace Swe\SpaceSDK\PermissionRoles;

use GuzzleHttp\Exception\GuzzleException;
use Swe\SpaceSDK\AbstractApi;

/**
 * Class TwoFaRequirement
 * Generated at 2023-07-20 02:00
 *
 * @package Swe\SpaceSDK\PermissionRoles
 * @author Luca Braun <l.braun@s-w-e.com>
 */
final class TwoFaRequirement extends AbstractApi
{
    /**
     * Get 2FA requirement for permission role
     *
     * Permissions that may be checked: Superadmin, Project.Admin, Channel.Admin
     *
     * @param string $roleId
     * @param array $response
     * @return array
     * @throws GuzzleException
     */
    final public function get2faRequirement(string $roleId, array $response = []): array
    {
        $uri = 'permission-roles/{roleId}/2-fa-requirement';
        $uriArguments = [
            'roleId' => $roleId,
        ];

        return $this->client->get($this->buildUrl($uri, $uriArguments), [], $response);
    }

    /**
     * Set 2FA requirement for permission role
     *
     * Permissions that may be checked: Superadmin, Project.Admin, Channel.Admin
     *
     * @param string $roleId
     * @param array $data
     * @return void
     * @throws GuzzleException
     */
    final public function set2faRequirement(string $roleId, array $data = []): void
    {
        $uri = 'permission-roles/{roleId}/2-fa-requirement';
        $uriArguments = [
            'roleId' => $roleId,
        ];

        $this->client->patch($this->buildUrl($uri, $uriArguments), $data);
    }
}
