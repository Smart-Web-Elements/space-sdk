<?php

namespace Swe\SpaceSDK\PermissionRoles;

use GuzzleHttp\Exception\GuzzleException;
use Swe\SpaceSDK\AbstractApi;

/**
 * Class Profiles
 * Generated at 2023-01-11 02:01
 *
 * @package Swe\SpaceSDK\PermissionRoles
 * @author Luca Braun <l.braun@s-w-e.com>
 */
final class Profiles extends AbstractApi
{
    /**
     * Assign permission role to the profile
     *
     * Permissions that may be checked: Superadmin, Project.Admin, Channel.Admin
     *
     * @param string $roleId
     * @param string $profile
     * @return void
     * @throws GuzzleException
     */
    final public function addRoleMember(string $roleId, string $profile): void
    {
        $uri = 'permission-roles/{roleId}/profiles/{profile}';
        $uriArguments = [
            'roleId' => $roleId,
            'profile' => $profile,
        ];

        $this->client->post($this->buildUrl($uri, $uriArguments));
    }

    /**
     * Get list of profiles with the specified role
     *
     * Permissions that may be checked: Superadmin, Project.View, Channel.ViewChannel
     *
     * @param string $roleId
     * @param array $response
     * @return array
     * @throws GuzzleException
     */
    final public function getRoleMembers(string $roleId, array $response = []): array
    {
        $uri = 'permission-roles/{roleId}/profiles';
        $uriArguments = [
            'roleId' => $roleId,
        ];

        return $this->client->get($this->buildUrl($uri, $uriArguments), [], $response);
    }

    /**
     * Remove permission role from the profile
     *
     * Permissions that may be checked: Superadmin, Project.Admin, Channel.Admin
     *
     * @param string $roleId
     * @param string $profile
     * @return void
     * @throws GuzzleException
     */
    final public function removeRoleMember(string $roleId, string $profile): void
    {
        $uri = 'permission-roles/{roleId}/profiles/{profile}';
        $uriArguments = [
            'roleId' => $roleId,
            'profile' => $profile,
        ];

        $this->client->delete($this->buildUrl($uri, $uriArguments));
    }
}
