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
 * Generated at 2022-11-15 07:46
 *
 * @package Swe\SpaceSDK
 * @author Luca Braun <l.braun@s-w-e.com>
 */
final class PermissionRoles extends AbstractApi
{
    /**
     * Create new custom permission role in specified permission context
     *
     * Permissions that may be checked: Superadmin, Project.Admin, Channel.Admin
     *
     * @param array $data
     * @param array $response
     * @return array
     * @throws GuzzleException
     * @throws MissingArgumentException
     */
    final public function createRole(array $data, array $response = []): array
    {
        $uri = 'permission-roles/create';
        $required = [
            'contextIdentifier' => Type::String,
            'name' => Type::String,
        ];
        $this->throwIfInvalid($required, $data);

        return $this->client->post($this->buildUrl($uri), $data, [], $response);
    }

    /**
     * List all permission roles in permission context
     *
     * Permissions that may be checked: Superadmin, Project.View, Channel.ViewChannel
     *
     * @param array $data
     * @param array $response
     * @return array
     * @throws GuzzleException
     * @throws MissingArgumentException
     */
    final public function getRoles(array $data, array $response = []): array
    {
        $uri = 'permission-roles/get';
        $required = [
            'contextIdentifier' => Type::String,
        ];
        $this->throwIfInvalid($required, $data);

        return $this->client->post($this->buildUrl($uri), $data, [], $response);
    }

    /**
     * Reset permissions for the role to the standard ones. Only applicable to roles with PermissionRoleType = PREDEFINED, not applicable to custom roles.
     *
     * Permissions that may be checked: Superadmin, Project.Admin, Channel.Admin
     *
     * @param string $roleId
     * @return void
     * @throws GuzzleException
     */
    final public function resetRolePermissionsToDefault(string $roleId): void
    {
        $uri = 'permission-roles/{roleId}/reset-role-permissions-to-default';
        $uriArguments = [
            'roleId' => $roleId,
        ];

        $this->client->post($this->buildUrl($uri, $uriArguments), []);
    }

    /**
     * Update custom permission role name
     *
     * Permissions that may be checked: Superadmin, Project.Admin, Channel.Admin
     *
     * @param string $roleId
     * @param array $data
     * @return void
     * @throws GuzzleException
     * @throws MissingArgumentException
     */
    final public function updateRole(string $roleId, array $data): void
    {
        $uri = 'permission-roles/{roleId}';
        $required = [
            'name' => Type::String,
        ];
        $this->throwIfInvalid($required, $data);
        $uriArguments = [
            'roleId' => $roleId,
        ];

        $this->client->patch($this->buildUrl($uri, $uriArguments), $data);
    }

    /**
     * Delete custom permission role
     *
     * Permissions that may be checked: Superadmin, Project.Admin, Channel.Admin
     *
     * @param string $roleId
     * @return void
     * @throws GuzzleException
     */
    final public function deleteRole(string $roleId): void
    {
        $uri = 'permission-roles/{roleId}';
        $uriArguments = [
            'roleId' => $roleId,
        ];

        $this->client->delete($this->buildUrl($uri, $uriArguments));
    }

    /**
     * @return TwoFaRequirement
     */
    final public function twoFaRequirement(): TwoFaRequirement
    {
        return new TwoFaRequirement($this->client);
    }

    /**
     * @return Permissions
     */
    final public function permissions(): Permissions
    {
        return new Permissions($this->client);
    }

    /**
     * @return Profiles
     */
    final public function profiles(): Profiles
    {
        return new Profiles($this->client);
    }

    /**
     * @return Teams
     */
    final public function teams(): Teams
    {
        return new Teams($this->client);
    }
}
