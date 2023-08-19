<?php

namespace Swe\SpaceSDK\PermissionRoles;

use GuzzleHttp\Exception\GuzzleException;
use Swe\SpaceSDK\AbstractApi;

/**
 * Class Teams
 * Generated at 2023-08-19 02:00
 *
 * @package Swe\SpaceSDK\PermissionRoles
 * @author Luca Braun <l.braun@s-w-e.com>
 */
final class Teams extends AbstractApi
{
    /**
     * Assign permission role to the team
     *
     * Permissions that may be checked: Superadmin, Project.Admin, Channel.Admin
     *
     * @param string $roleId
     * @param string $team
     * @return void
     * @throws GuzzleException
     */
    final public function addRoleTeam(string $roleId, string $team): void
    {
        $uri = 'permission-roles/{roleId}/teams/{team}';
        $uriArguments = [
            'roleId' => $roleId,
            'team' => $team,
        ];

        $this->client->post($this->buildUrl($uri, $uriArguments));
    }

    /**
     * Get list of teams with the specified role
     *
     * Permissions that may be checked: Superadmin, Project.View, Channel.ViewChannel
     *
     * @param string $roleId
     * @param array $response
     * @return array
     * @throws GuzzleException
     */
    final public function getRoleTeams(string $roleId, array $response = []): array
    {
        $uri = 'permission-roles/{roleId}/teams';
        $uriArguments = [
            'roleId' => $roleId,
        ];

        return $this->client->get($this->buildUrl($uri, $uriArguments), [], $response);
    }

    /**
     * Remove permission role from the team
     *
     * Permissions that may be checked: Superadmin, Project.Admin, Channel.Admin
     *
     * @param string $roleId
     * @param string $team
     * @return void
     * @throws GuzzleException
     */
    final public function removeRoleTeam(string $roleId, string $team): void
    {
        $uri = 'permission-roles/{roleId}/teams/{team}';
        $uriArguments = [
            'roleId' => $roleId,
            'team' => $team,
        ];

        $this->client->delete($this->buildUrl($uri, $uriArguments));
    }
}
