<?php

namespace Swe\SpaceSDK\TeamDirectory;

use GuzzleHttp\Exception\GuzzleException;
use Swe\SpaceSDK\AbstractApi;
use Swe\SpaceSDK\Exception\MissingArgumentException;

/**
 * Class InvitationLinks
 *
 * @package Swe\SpaceSDK\TeamDirectory
 * @author Luca Braun <l.braun@s-w-e.com>
 */
class InvitationLinks extends AbstractApi
{
    /**
     * Create an organization-wide invitation link.
     *
     * @param array $data
     * @param array $response
     * @return array
     * @throws GuzzleException
     * @throws MissingArgumentException
     */
    public function createInvitationLink(array $data, array $response = []): array
    {
        $uri = 'team-directory/invitation-links';
        $required = [
            'name' => self::TYPE_STRING,
            'expiresAt' => self::TYPE_DATETIME,
            'inviteeLimit' => self::TYPE_INTEGER,
        ];
        $this->throwIfInvalid($required, $data);

        return $this->client->post($this->buildUrl($uri), $data, $response);
    }

    /**
     * Get organization-wide invitation links.
     *
     * @param array $request
     * @param array $response
     * @return array
     * @throws GuzzleException
     */
    public function getAllInvitationLinks(array $request = [], array $response = []): array
    {
        $uri = 'team-directory/invitation-links';

        return $this->client->get($this->buildUrl($uri), $response, $request);
    }

    /**
     * Update an organization-wide invitation link.
     *
     * @param string $invitationLinkId
     * @param array $data
     * @return void
     * @throws GuzzleException
     */
    public function updateInvitationLink(string $invitationLinkId, array $data = []): void
    {
        $uri = 'team-directory/invitation-links/{invitationLinkId}';
        $uriArguments = [
            'invitationLinkId' => $invitationLinkId,
        ];

        $this->client->patch($this->buildUrl($uri, $uriArguments), $data);
    }

    /**
     * Delete currently active organization-wide invitation link.
     *
     * @param string $invitationLinkId
     * @return void
     * @throws GuzzleException
     */
    public function deleteInvitationLink(string $invitationLinkId): void
    {
        $uri = 'team-directory/invitation-links/{invitationLinkId}';
        $uriArguments = [
            'invitationLinkId' => $invitationLinkId,
        ];

        $this->client->delete($this->buildUrl($uri, $uriArguments));
    }
}