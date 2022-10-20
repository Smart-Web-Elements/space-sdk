<?php

namespace Swe\SpaceSDK\TeamDirectory;

use GuzzleHttp\Exception\GuzzleException;
use Swe\SpaceSDK\AbstractApi;
use Swe\SpaceSDK\Exception\MissingArgumentException;

/**
 * Class Invitations
 *
 * @package Swe\SpaceSDK\TeamDirectory
 * @author Luca Braun <l.braun@s-w-e.com>
 */
class Invitations extends AbstractApi
{
    /**
     * Create an invitation to join the current organization. Optionally, the team and/or role to join when accepting
     * the invitation can be specified.
     *
     * @param array $data
     * @param array $response
     * @return array
     * @throws GuzzleException
     * @throws MissingArgumentException
     */
    public function createInvitation(array $data, array $response = []): array
    {
        $uri = 'team-directory/invitations';
        $required = [
            'inviteeEmail' => self::TYPE_STRING,
        ];
        $this->throwIfInvalid($required, $data);

        return $this->client->post($this->buildUrl($uri), $data, $response);
    }

    /**
     * Get a list of invitations.
     *
     * @param array $request
     * @param array $response
     * @return array
     * @throws GuzzleException
     */
    public function getAllInvitations(array $request = [], array $response = []): array
    {
        $uri = 'team-directory/invitations';

        return $this->client->get($this->buildUrl($uri), $response, $request);
    }

    /**
     * Update an invitation. Optional parameters will be ignored when not specified and updated otherwise.
     *
     * @param string $id
     * @param array $data
     * @return void
     * @throws GuzzleException
     */
    public function updateInvitation(string $id, array $data = []): void
    {
        $uri = 'team-directory/invitations/{id}';
        $uriArguments = [
            'id' => $id,
        ];

        $this->client->patch($this->buildUrl($uri, $uriArguments), $data);
    }

    /**
     * Delete an invitation. Deleted invitations can no longer be used to join the organization.
     *
     * @param string $id
     * @return void
     * @throws GuzzleException
     */
    public function deleteInvitation(string $id): void
    {
        $uri = 'team-directory/invitations/{id}';
        $uriArguments = [
            'id' => $id,
        ];

        $this->client->delete($this->buildUrl($uri, $uriArguments));
    }
}