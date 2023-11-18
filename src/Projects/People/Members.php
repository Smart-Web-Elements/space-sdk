<?php

namespace Swe\SpaceSDK\Projects\People;

use GuzzleHttp\Exception\GuzzleException;
use Swe\SpaceSDK\AbstractApi;
use Swe\SpaceSDK\Exception\MissingArgumentException;
use Swe\SpaceSDK\Type;

/**
 * Class Members
 * Generated at 2023-11-18 04:46
 *
 * @package Swe\SpaceSDK\Projects\People
 * @author Luca Braun <l.braun@s-w-e.com>
 */
final class Members extends AbstractApi
{
    /**
     * Adds or removes project participant roles
     *
     * Permissions that may be checked: Project.Admin
     *
     * @param string $project
     * @param array $data
     * @return void
     * @throws GuzzleException
     * @throws MissingArgumentException
     */
    final public function updateParticipantRoles(string $project, array $data): void
    {
        $uri = 'projects/{project}/people/members/update';
        $required = [
            'profile' => Type::String,
            'addRoles' => Type::Array,
            'removeRoles' => Type::Array,
        ];
        $this->throwIfInvalid($required, $data);
        $uriArguments = [
            'project' => $project,
        ];

        $this->client->post($this->buildUrl($uri, $uriArguments), $data);
    }

    /**
     * Returns all project participants
     *
     * Permissions that may be checked: Project.View
     *
     * @param string $project
     * @param array $request
     * @param array $response
     * @return array
     * @throws GuzzleException
     */
    final public function getAllParticipants(string $project, array $request = [], array $response = []): array
    {
        $uri = 'projects/{project}/people/members';
        $uriArguments = [
            'project' => $project,
        ];

        return $this->client->get($this->buildUrl($uri, $uriArguments), $request, $response);
    }

    /**
     * Returns project participants by provided profiles
     *
     * Permissions that may be checked: Project.View
     *
     * @param string $project
     * @param array $request
     * @param array $response
     * @return array
     * @throws GuzzleException
     * @throws MissingArgumentException
     */
    final public function getParticipantsByProfiles(string $project, array $request, array $response = []): array
    {
        $uri = 'projects/{project}/people/members/by-ids';
        $required = [
            'profiles' => Type::Array,
        ];
        $this->throwIfInvalid($required, $request);
        $uriArguments = [
            'project' => $project,
        ];

        return $this->client->get($this->buildUrl($uri, $uriArguments), $request, $response);
    }

    /**
     * Removes participant
     *
     * Permissions that may be checked: Project.Admin
     *
     * @param string $project
     * @param string $profile
     * @return void
     * @throws GuzzleException
     */
    final public function removeParticipant(string $project, string $profile): void
    {
        $uri = 'projects/{project}/people/members/{profile}';
        $uriArguments = [
            'project' => $project,
            'profile' => $profile,
        ];

        $this->client->delete($this->buildUrl($uri, $uriArguments));
    }
}
