<?php

namespace Swe\SpaceSDK\PermissionRoles;

use GuzzleHttp\Exception\GuzzleException;
use Swe\SpaceSDK\AbstractApi;
use Swe\SpaceSDK\Exception\MissingArgumentException;
use Swe\SpaceSDK\Type;

/**
 * Class Permissions
 * Generated at 2023-07-20 02:00
 *
 * @package Swe\SpaceSDK\PermissionRoles
 * @author Luca Braun <l.braun@s-w-e.com>
 */
final class Permissions extends AbstractApi
{
    /**
     * Grant permissions to the specified role. You can get the list of all permissions applicable to the role using "Get all" method.
     *
     * Permissions that may be checked: Superadmin, Project.Admin, Channel.Admin
     *
     * @param string $roleId
     * @param array $data
     * @return void
     * @throws GuzzleException
     * @throws MissingArgumentException
     */
    final public function grantRolePermissions(string $roleId, array $data): void
    {
        $uri = 'permission-roles/{roleId}/permissions';
        $required = [
            'rightCodes' => Type::Array,
        ];
        $this->throwIfInvalid($required, $data);
        $uriArguments = [
            'roleId' => $roleId,
        ];

        $this->client->post($this->buildUrl($uri, $uriArguments), $data);
    }

    /**
     * Get role permissions
     *
     * Permissions that may be checked: Superadmin, Project.View, Channel.ViewChannel
     *
     * @param string $roleId
     * @param array $response
     * @return array
     * @throws GuzzleException
     */
    final public function getRolePermissions(string $roleId, array $response = []): array
    {
        $uri = 'permission-roles/{roleId}/permissions';
        $uriArguments = [
            'roleId' => $roleId,
        ];

        return $this->client->get($this->buildUrl($uri, $uriArguments), [], $response);
    }

    /**
     * Revoke permissions from the specified role.
     *
     * Permissions that may be checked: Superadmin, Project.Admin, Channel.Admin
     *
     * @param string $roleId
     * @param array $request
     * @return void
     * @throws GuzzleException
     * @throws MissingArgumentException
     */
    final public function revokeRolePermissions(string $roleId, array $request): void
    {
        $uri = 'permission-roles/{roleId}/permissions';
        $required = [
            'rightCodes' => Type::Array,
        ];
        $this->throwIfInvalid($required, $request);
        $uriArguments = [
            'roleId' => $roleId,
        ];

        $this->client->delete($this->buildUrl($uri, $uriArguments), $request);
    }
}
