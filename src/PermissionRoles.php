<?php

namespace Swe\SpaceSDK;

use GuzzleHttp\Exception\GuzzleException;
use Swe\SpaceSDK\Exception\MissingArgumentException;
use Swe\SpaceSDK\PermissionRoles\Permissions;
use Swe\SpaceSDK\PermissionRoles\Profiles;
use Swe\SpaceSDK\PermissionRoles\Teams;
use Swe\SpaceSDK\PermissionRoles\TwoFaRequirement;

/**
 * Class PermissionRoles
 *
 * @package Swe\SpaceSDK
 * @author Luca Braun <l.braun@s-w-e.com>
 */
class PermissionRoles extends AbstractApi
{
    /**
     * Create new custom permission role in specified permission context.
     *
     * Permissions that may be checked: Superadmin, Projects.Admin, Channel.Admin
     *
     * @param array $data
     * @param array $response
     * @return array
     * @throws MissingArgumentException
     * @throws GuzzleException
     */
    public function createRole(array $data, array $response = []): array
    {
        $uri = 'permission-roles/create';
        $required = [
            'contextIdentifier' => self::TYPE_STRING,
            'name' => self::TYPE_STRING,
        ];
        $this->throwIfInvalid($required, $data);

        return $this->client->post($this->buildUrl($uri), $data, $response);
    }

    /**
     * List all permission roles in permission context.
     *
     * Permissions that may be checked: Superadmin, Projects.View, Channel.ViewChannel
     *
     * @param array $data
     * @param array $response
     * @return array
     * @throws MissingArgumentException
     * @throws GuzzleException
     */
    public function getRoles(array $data, array $response = []): array
    {
        $uri = 'permission-roles/create';
        $required = [
            'contextIdentifier' => self::TYPE_STRING,
        ];
        $this->throwIfInvalid($required, $data);

        return $this->client->post($this->buildUrl($uri), $data, $response);
    }

    /**
     * Reset permissions for the role to the standard ones. Only applicable to roles with
     * PermissionRoleType = PREDEFINED, not applicable to custom roles.
     *
     * Permissions that may be checked: Superadmin, Projects.Admin, Channel.Admin
     *
     * @param string $roleId
     * @return void
     * @throws GuzzleException
     */
    public function resetRolePermissionsToDefault(string $roleId): void
    {
        $uri = 'permission-roles/{roleId}/reset-role-permissions-to-default';
        $uriArguments = [
            'roleId' => $roleId,
        ];

        $this->client->post($this->buildUrl($uri, $uriArguments));
    }

    /**
     * Update custom permission role name.
     *
     * Permissions that may be checked: Superadmin, Projects.Admin, Channel.Admin
     *
     * @param string $roleId
     * @param array $data
     * @return void
     * @throws GuzzleException
     * @throws MissingArgumentException
     */
    public function updateRole(string $roleId, array $data): void
    {
        $uri = 'permission-roles/{roleId}';
        $required = [
            'name' => self::TYPE_STRING,
        ];
        $this->throwIfInvalid($required, $data);
        $uriArguments = [
            'roleId' => $roleId,
        ];

        $this->client->patch($this->buildUrl($uri, $uriArguments), $data);
    }

    /**
     * Delete custom permission role.
     *
     * Permissions that may be checked: Superadmin, Projects.Admin, Channel.Admin
     *
     * @param string $roleId
     * @return void
     * @throws GuzzleException
     */
    public function deleteRole(string $roleId): void
    {
        $uri = 'permission-roles/{roleId}';
        $uriArguments = [
            'roleId' => $roleId,
        ];

        $this->client->delete($this->buildUrl($uri, $uriArguments));
    }

    /**
     * @return Permissions
     */
    public function permissions(): Permissions
    {
        return new Permissions($this->client);
    }

    /**
     * @return Profiles
     */
    public function profiles(): Profiles
    {
        return new Profiles($this->client);
    }

    /**
     * @return Teams
     */
    public function teams(): Teams
    {
        return new Teams($this->client);
    }

    /**
     * @return TwoFaRequirement
     */
    public function twoFaRequirement(): TwoFaRequirement
    {
        return new TwoFaRequirement($this->client);
    }
}