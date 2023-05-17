<?php

namespace Swe\SpaceSDK\TeamDirectory;

use GuzzleHttp\Exception\GuzzleException;
use Swe\SpaceSDK\AbstractApi;
use Swe\SpaceSDK\Exception\MissingArgumentException;
use Swe\SpaceSDK\TeamDirectory\Profiles\ApplicationPasswords;
use Swe\SpaceSDK\TeamDirectory\Profiles\AuthenticationSessions;
use Swe\SpaceSDK\TeamDirectory\Profiles\Checklists;
use Swe\SpaceSDK\TeamDirectory\Profiles\Dashboards;
use Swe\SpaceSDK\TeamDirectory\Profiles\Documents;
use Swe\SpaceSDK\TeamDirectory\Profiles\GpgKeys;
use Swe\SpaceSDK\TeamDirectory\Profiles\Leads;
use Swe\SpaceSDK\TeamDirectory\Profiles\NavBarMenuItems;
use Swe\SpaceSDK\TeamDirectory\Profiles\NavBarProjects;
use Swe\SpaceSDK\TeamDirectory\Profiles\NotificationSettings;
use Swe\SpaceSDK\TeamDirectory\Profiles\OauthConsents;
use Swe\SpaceSDK\TeamDirectory\Profiles\PermanentTokens;
use Swe\SpaceSDK\TeamDirectory\Profiles\Settings;
use Swe\SpaceSDK\TeamDirectory\Profiles\SpokenLanguages;
use Swe\SpaceSDK\TeamDirectory\Profiles\SshKeys;
use Swe\SpaceSDK\TeamDirectory\Profiles\Timezone;
use Swe\SpaceSDK\TeamDirectory\Profiles\TwoFa;
use Swe\SpaceSDK\TeamDirectory\Profiles\WidgetSettings;
use Swe\SpaceSDK\TeamDirectory\Profiles\WorkingDays;
use Swe\SpaceSDK\Type;

/**
 * Class Profiles
 * Generated at 2023-05-17 02:00
 *
 * @package Swe\SpaceSDK\TeamDirectory
 * @author Luca Braun <l.braun@s-w-e.com>
 */
final class Profiles extends AbstractApi
{
    /**
     * Create a profile
     *
     * Permissions that may be checked: Profile.Create, Profile.CreateGuest
     *
     * @param array $data
     * @param array $response
     * @return array
     * @throws GuzzleException
     * @throws MissingArgumentException
     */
    final public function createProfile(array $data, array $response = []): array
    {
        $uri = 'team-directory/profiles';
        $required = [
            'username' => Type::String,
            'firstName' => Type::String,
            'lastName' => Type::String,
        ];
        $this->throwIfInvalid($required, $data);

        return $this->client->post($this->buildUrl($uri), $data, [], $response);
    }

    /**
     * Get/search all profiles. Parameters are applied as 'AND' filters.
     *
     * Permissions that may be checked: Profile.View
     *
     * @param array $request
     * @param array $response
     * @return array
     * @throws GuzzleException
     */
    final public function getAllProfiles(array $request = [], array $response = []): array
    {
        $uri = 'team-directory/profiles';

        return $this->client->get($this->buildUrl($uri), $request, $response);
    }

    /**
     * Get profile information by email address
     *
     * Permissions that may be checked: Profile.View
     *
     * @param string $email
     * @param array $request
     * @param array $response
     * @return array
     * @throws GuzzleException
     */
    final public function getProfileByEmail(string $email, array $request = [], array $response = []): array
    {
        $uri = 'team-directory/profiles/email:{email}';
        $uriArguments = [
            'email' => $email,
        ];

        return $this->client->get($this->buildUrl($uri, $uriArguments), $request, $response);
    }

    /**
     * Get profile information
     *
     * Permissions that may be checked: Profile.View
     *
     * @param string $profile
     * @param array $response
     * @return array
     * @throws GuzzleException
     */
    final public function getProfile(string $profile, array $response = []): array
    {
        $uri = 'team-directory/profiles/{profile}';
        $uriArguments = [
            'profile' => $profile,
        ];

        return $this->client->get($this->buildUrl($uri, $uriArguments), [], $response);
    }

    /**
     * Check if a user profile is a member of one or more teams
     *
     * @param string $profile
     * @param array $request
     * @return bool
     * @throws GuzzleException
     * @throws MissingArgumentException
     */
    final public function checkIfProfileIsTeamMember(string $profile, array $request): bool
    {
        $uri = 'team-directory/profiles/{profile}/is-team-member';
        $required = [
            'teamIds' => Type::Array,
        ];
        $this->throwIfInvalid($required, $request);
        $uriArguments = [
            'profile' => $profile,
        ];

        return (bool)$this->client->get($this->buildUrl($uri, $uriArguments), $request)[0];
    }

    /**
     * Update a profile. Optional parameters will be ignored when null and updated otherwise.
     *
     * Permissions that may be checked: Profile.Edit.2
     *
     * @param string $profile
     * @param array $data
     * @param array $response
     * @return array
     * @throws GuzzleException
     */
    final public function updateProfile(string $profile, array $data = [], array $response = []): array
    {
        $uri = 'team-directory/profiles/{profile}';
        $uriArguments = [
            'profile' => $profile,
        ];

        return $this->client->patch($this->buildUrl($uri, $uriArguments), $data, [], $response);
    }

    /**
     * Convert to guest profile
     *
     * Permissions that may be checked: Profile.Edit.2
     *
     * @param string $profile
     * @param array $data
     * @param array $response
     * @return array
     * @throws GuzzleException
     * @throws MissingArgumentException
     */
    final public function convertOrganizationMemberIntoGuestUser(
        string $profile,
        array $data,
        array $response = [],
    ): array {
        $uri = 'team-directory/profiles/{profile}/convert-to-guest';
        $required = [
            'dryrun' => Type::Boolean,
        ];
        $this->throwIfInvalid($required, $data);
        $uriArguments = [
            'profile' => $profile,
        ];

        return $this->client->patch($this->buildUrl($uri, $uriArguments), $data, [], $response);
    }

    /**
     * Convert to organization member
     *
     * Permissions that may be checked: Profile.Edit.2
     *
     * @param string $profile
     * @param array $data
     * @param array $response
     * @return array
     * @throws GuzzleException
     * @throws MissingArgumentException
     */
    final public function convertGuestUserIntoOrganizationMember(
        string $profile,
        array $data,
        array $response = [],
    ): array {
        $uri = 'team-directory/profiles/{profile}/convert-to-member';
        $required = [
            'dryrun' => Type::Boolean,
        ];
        $this->throwIfInvalid($required, $data);
        $uriArguments = [
            'profile' => $profile,
        ];

        return $this->client->patch($this->buildUrl($uri, $uriArguments), $data, [], $response);
    }

    /**
     * Reactivate a user profile
     *
     * Permissions that may be checked: Profile.Edit.2
     *
     * @param string $profile
     * @param array $data
     * @param array $response
     * @return array
     * @throws GuzzleException
     */
    final public function reactivateUserProfile(string $profile, array $data = [], array $response = []): array
    {
        $uri = 'team-directory/profiles/{profile}/reactivate';
        $uriArguments = [
            'profile' => $profile,
        ];

        return $this->client->patch($this->buildUrl($uri, $uriArguments), $data, [], $response);
    }

    /**
     * Restore a suspended user profile
     *
     * Permissions that may be checked: Profile.Edit.2
     *
     * @param string $profile
     * @param array $response
     * @return array
     * @throws GuzzleException
     */
    final public function restoreSuspendedUserProfile(string $profile, array $response = []): array
    {
        $uri = 'team-directory/profiles/{profile}/restore';
        $uriArguments = [
            'profile' => $profile,
        ];

        return $this->client->patch($this->buildUrl($uri, $uriArguments), [], [], $response);
    }

    /**
     * Suspend a user profile
     *
     * Permissions that may be checked: Profile.Edit.2
     *
     * @param string $profile
     * @param array $data
     * @param array $response
     * @return array
     * @throws GuzzleException
     */
    final public function suspendUserProfile(string $profile, array $data = [], array $response = []): array
    {
        $uri = 'team-directory/profiles/{profile}/suspend';
        $uriArguments = [
            'profile' => $profile,
        ];

        return $this->client->patch($this->buildUrl($uri, $uriArguments), $data, [], $response);
    }

    /**
     * Delete a profile
     *
     * Permissions that may be checked: Profile.Delete
     *
     * @param string $profile
     * @param array $response
     * @return array
     * @throws GuzzleException
     */
    final public function deleteProfile(string $profile, array $response = []): array
    {
        $uri = 'team-directory/profiles/{profile}';
        $uriArguments = [
            'profile' => $profile,
        ];

        return $this->client->delete($this->buildUrl($uri, $uriArguments), [], $response);
    }

    /**
     * Deactivate a user profile
     *
     * Permissions that may be checked: Profile.Edit.2
     *
     * @param string $profile
     * @param array $request
     * @param array $response
     * @return array
     * @throws GuzzleException
     * @throws MissingArgumentException
     */
    final public function deactivateUserProfile(string $profile, array $request, array $response = []): array
    {
        $uri = 'team-directory/profiles/{profile}/deactivate';
        $required = [
            'at' => Type::DateTime,
        ];
        $this->throwIfInvalid($required, $request);
        $uriArguments = [
            'profile' => $profile,
        ];

        return $this->client->delete($this->buildUrl($uri, $uriArguments), $request, $response);
    }

    /**
     * @return AuthenticationSessions
     */
    final public function authenticationSessions(): AuthenticationSessions
    {
        return new AuthenticationSessions($this->client);
    }

    /**
     * @return Dashboards
     */
    final public function dashboards(): Dashboards
    {
        return new Dashboards($this->client);
    }

    /**
     * @return OauthConsents
     */
    final public function oauthConsents(): OauthConsents
    {
        return new OauthConsents($this->client);
    }

    /**
     * @return WidgetSettings
     */
    final public function widgetSettings(): WidgetSettings
    {
        return new WidgetSettings($this->client);
    }

    /**
     * @return WorkingDays
     */
    final public function workingDays(): WorkingDays
    {
        return new WorkingDays($this->client);
    }

    /**
     * @return TwoFa
     */
    final public function twoFa(): TwoFa
    {
        return new TwoFa($this->client);
    }

    /**
     * @return ApplicationPasswords
     */
    final public function applicationPasswords(): ApplicationPasswords
    {
        return new ApplicationPasswords($this->client);
    }

    /**
     * @return Checklists
     */
    final public function checklists(): Checklists
    {
        return new Checklists($this->client);
    }

    /**
     * @return Documents
     */
    final public function documents(): Documents
    {
        return new Documents($this->client);
    }

    /**
     * @return GpgKeys
     */
    final public function gpgKeys(): GpgKeys
    {
        return new GpgKeys($this->client);
    }

    /**
     * @return Leads
     */
    final public function leads(): Leads
    {
        return new Leads($this->client);
    }

    /**
     * @return NavBarMenuItems
     */
    final public function navBarMenuItems(): NavBarMenuItems
    {
        return new NavBarMenuItems($this->client);
    }

    /**
     * @return NavBarProjects
     */
    final public function navBarProjects(): NavBarProjects
    {
        return new NavBarProjects($this->client);
    }

    /**
     * @return NotificationSettings
     */
    final public function notificationSettings(): NotificationSettings
    {
        return new NotificationSettings($this->client);
    }

    /**
     * @return PermanentTokens
     */
    final public function permanentTokens(): PermanentTokens
    {
        return new PermanentTokens($this->client);
    }

    /**
     * @return Settings
     */
    final public function settings(): Settings
    {
        return new Settings($this->client);
    }

    /**
     * @return SpokenLanguages
     */
    final public function spokenLanguages(): SpokenLanguages
    {
        return new SpokenLanguages($this->client);
    }

    /**
     * @return SshKeys
     */
    final public function sshKeys(): SshKeys
    {
        return new SshKeys($this->client);
    }

    /**
     * @return Timezone
     */
    final public function timezone(): Timezone
    {
        return new Timezone($this->client);
    }
}
