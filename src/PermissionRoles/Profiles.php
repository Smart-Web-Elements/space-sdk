<?php

namespace Swe\SpaceSDK\PermissionRoles;

use GuzzleHttp\Exception\GuzzleException;
use Swe\SpaceSDK\AbstractApi;

/**
 * Class Profiles
 *
 * @package Swe\SpaceSDK\PermissionRoles
 * @author Luca Braun <l.braun@s-w-e.com>
 */
class Profiles extends AbstractApi
{
    /**
     * Assign permission role to the profile.
     *
     * Permissions that may be checked: Superadmin, Projects.Admin, Channel.Admin
     *
     * @param string $roleId
     * @param string $profile
     * @return void
     * @throws GuzzleException
     */
    public function addRoleMember(string $roleId, string $profile): void
    {
        $uri = 'permission-roles/{roleId}/profiles/{profile}';
        $uriArguments = [
            'roleId' => $roleId,
            'profile' => $profile,
        ];

        $this->client->post($this->buildUrl($uri, $uriArguments));
    }

    /**
     * Get list of profiles with the specified role.
     *
     * Permissions that may be checked: Superadmin, Projects.View, Channel.ViewChannel
     *
     * @param string $roleId
     * @param array $response
     * @return array
     * @throws GuzzleException
     */
    public function getRoleMembers(string $roleId, array $response = []): array
    {
        $uri = 'permission-roles/{roleId}/profiles';
        $uriArguments = [
            'roleId' => $roleId,
        ];

        return $this->client->get($this->buildUrl($uri, $uriArguments), $response);
    }

    /**
     * Remove permission role from the profile.
     *
     * Permissions that may be checked: Superadmin, Projects.Admin, Channel.Admin
     *
     * @param string $roleId
     * @param string $profile
     * @return void
     * @throws GuzzleException
     */
    public function removeRoleMember(string $roleId, string $profile): void
    {
        $uri = 'permission-roles/{roleId}/profiles/{profile}';
        $uriArguments = [
            'roleId' => $roleId,
            'profile' => $profile,
        ];

        $this->client->delete($this->buildUrl($uri, $uriArguments));
    }
}