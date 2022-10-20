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
use Swe\SpaceSDK\TeamDirectory\Profiles\NavBarMenuItems;
use Swe\SpaceSDK\TeamDirectory\Profiles\NavBarProjects;
use Swe\SpaceSDK\TeamDirectory\Profiles\NotificationSettings;
use Swe\SpaceSDK\TeamDirectory\Profiles\OAuthConsents;
use Swe\SpaceSDK\TeamDirectory\Profiles\PermanentTokens;
use Swe\SpaceSDK\TeamDirectory\Profiles\Settings;
use Swe\SpaceSDK\TeamDirectory\Profiles\SpokenLanguages;
use Swe\SpaceSDK\TeamDirectory\Profiles\SshKeys;
use Swe\SpaceSDK\TeamDirectory\Profiles\Timezone;
use Swe\SpaceSDK\TeamDirectory\Profiles\TwoFa;
use Swe\SpaceSDK\TeamDirectory\Profiles\WorkingDays;

/**
 * Class Profiles
 *
 * @package Swe\SpaceSDK\TeamDirectory
 * @author Luca Braun <l.braun@s-w-e.com>
 */
class Profiles extends AbstractApi
{
    /**
     * Create a profile.
     *
     * Permissions that may be checked: Profile.Create, Profile.CreateGuest
     *
     * @param array $data
     * @param array $response
     * @return array
     * @throws GuzzleException
     * @throws MissingArgumentException
     */
    public function createProfile(array $data, array $response = []): array
    {
        $uri = 'team-directory/profiles';
        $required = [
            'username' => self::TYPE_STRING,
            'firstName' => self::TYPE_STRING,
            'lastName' => self::TYPE_STRING,
        ];
        $this->throwIfInvalid($required, $data);

        return $this->client->post($this->buildUrl($uri), $data, $response);
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
    public function getAllProfiles(array $request = [], array $response = []): array
    {
        $uri = 'team-directory/profiles';

        return $this->client->get($this->buildUrl($uri), $response, $request);
    }

    /**
     * Get profile information by email address.
     *
     * Permissions that may be checked: Profile.View
     *
     * @param string $email
     * @param array $request
     * @param array $response
     * @return array
     * @throws GuzzleException
     */
    public function getProfileByEmail(string $email, array $request = [], array $response = []): array
    {
        $uri = 'team-directory/profiles/email:{email}';
        $uriArguments = [
            'email' => $email,
        ];

        return $this->client->get($this->buildUrl($uri, $uriArguments), $response, $request);
    }

    /**
     * Get profile information.
     *
     * Permissions that may be checked: Profile.View
     *
     * @param string $profile
     * @param array $response
     * @return array
     * @throws GuzzleException
     */
    public function getProfile(string $profile, array $response = []): array
    {
        $uri = 'team-directory/profiles/{profile}';
        $uriArguments = [
            'profile' => $profile,
        ];

        return $this->client->get($this->buildUrl($uri, $uriArguments), $response);
    }

    /**
     * Check if a user profile is a member of one or more teams.
     *
     * @param string $profile
     * @param array $request
     * @return bool
     * @throws GuzzleException
     * @throws MissingArgumentException
     */
    public function checkIfProfileIsTeamMember(string $profile, array $request): bool
    {
        $uri = 'team-directory/profiles/{profile}/is-team-member';
        $required = [
            'teamIds' => self::TYPE_ARRAY,
        ];
        $this->throwIfInvalid($required, $request);
        $uriArguments = [
            'profile' => $profile,
        ];

        return (bool)$this->client->get($this->buildUrl($uri, $uriArguments), [], $request)[0];
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
    public function updateProfile(string $profile, array $data = [], array $response = []): array
    {
        $uri = 'team-directory/profiles/{profile}';
        $uriArguments = [
            'profile' => $profile,
        ];

        return $this->client->patch($this->buildUrl($uri, $uriArguments), $data, $response);
    }

    /**
     * Reactivate a user profile.
     *
     * Permissions that may be checked: Profile.Edit.2
     *
     * @param string $profile
     * @param array $data
     * @param array $response
     * @return array
     * @throws GuzzleException
     */
    public function reactivateUserProfile(string $profile, array $data = [], array $response = []): array
    {
        $uri = 'team-directory/profiles/{profile}/reactivate';
        $uriArguments = [
            'profile' => $profile,
        ];

        return $this->client->patch($this->buildUrl($uri, $uriArguments), $data, $response);
    }

    /**
     * Delete a profile.
     *
     * Permissions that may be checked: Profile.Delete
     *
     * @param string $profile
     * @param array $response
     * @return array
     * @throws GuzzleException
     */
    public function deleteProfile(string $profile, array $response = []): array
    {
        $uri = 'team-directory/profiles/{profile}';
        $uriArguments = [
            'profile' => $profile,
        ];

        return $this->client->delete($this->buildUrl($uri, $uriArguments), [], $response);
    }

    /**
     * Deactivate a user profile.
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
    public function deactivateUserProfile(string $profile, array $request, array $response = []): array
    {
        $uri = 'team-directory/profiles/{profile}/deactivate';
        $required = [
            'at' => self::TYPE_DATETIME,
        ];
        $this->throwIfInvalid($required, $response);
        $uriArguments = [
            'profile' => $profile,
        ];

        return $this->client->delete($this->buildUrl($uri, $uriArguments), $request, $response);
    }

    /**
     * @return TwoFa
     */
    public function twoFa(): TwoFa
    {
        return new TwoFa($this->client);
    }

    /**
     * @return ApplicationPasswords
     */
    public function applicationPasswords(): ApplicationPasswords
    {
        return new ApplicationPasswords($this->client);
    }

    /**
     * @return AuthenticationSessions
     */
    public function authenticationSessions(): AuthenticationSessions
    {
        return new AuthenticationSessions($this->client);
    }

    /**
     * @return Checklists
     */
    public function checklists(): Checklists
    {
        return new Checklists($this->client);
    }

    /**
     * @return Dashboards
     */
    public function dashboards(): Dashboards
    {
        return new Dashboards($this->client);
    }

    /**
     * @return Documents
     */
    public function documents(): Documents
    {
        return new Documents($this->client);
    }

    /**
     * @return GpgKeys
     */
    public function gpgKeys(): GpgKeys
    {
        return new GpgKeys($this->client);
    }

    /**
     * @return NavBarMenuItems
     */
    public function navBarMenuItems(): NavBarMenuItems
    {
        return new NavBarMenuItems($this->client);
    }

    /**
     * @return NavBarProjects
     */
    public function navBarProjects(): NavBarProjects
    {
        return new NavBarProjects($this->client);
    }

    /**
     * @return NotificationSettings
     */
    public function notificationSettings(): NotificationSettings
    {
        return new NotificationSettings($this->client);
    }

    /**
     * @return OAuthConsents
     */
    public function oAuthConsents(): OAuthConsents
    {
        return new OAuthConsents($this->client);
    }

    /**
     * @return PermanentTokens
     */
    public function permanentTokens(): PermanentTokens
    {
        return new PermanentTokens($this->client);
    }

    /**
     * @return Settings
     */
    public function settings(): Settings
    {
        return new Settings($this->client);
    }

    /**
     * @return SpokenLanguages
     */
    public function spokenLanguages(): SpokenLanguages
    {
        return new SpokenLanguages($this->client);
    }

    /**
     * @return SshKeys
     */
    public function sshKeys(): SshKeys
    {
        return new SshKeys($this->client);
    }

    /**
     * @return Timezone
     */
    public function timezone(): Timezone
    {
        return new Timezone($this->client);
    }

    /**
     * @return WorkingDays
     */
    public function workingDays(): WorkingDays
    {
        return new WorkingDays($this->client);
    }
}