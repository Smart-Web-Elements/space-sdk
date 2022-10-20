<?php

namespace Swe\SpaceSDK\TeamDirectory\Profiles;

use GuzzleHttp\Exception\GuzzleException;
use Swe\SpaceSDK\AbstractApi;
use Swe\SpaceSDK\Exception\MissingArgumentException;

/**
 * Class SpokenLanguages
 *
 * @package Swe\SpaceSDK\TeamDirectory\Profiles
 * @author Luca Braun <l.braun@s-w-e.com>
 */
class SpokenLanguages extends AbstractApi
{
    /**
     * Update spoken language for a profile. Optionally, firstName and lastName can be specified to add a localized name
     * to the profile.
     *
     * Permissions that may be checked: Profile.Languages.Edit
     *
     * @param string $profile
     * @param array $data
     * @param array $response
     * @return array
     * @throws GuzzleException
     * @throws MissingArgumentException
     */
    public function createSpokenLanguage(string $profile, array $data, array $response = []): array
    {
        $uri = 'team-directory/profiles/{profile}/spoken-languages';
        $required = [
            'language' => self::TYPE_STRING,
        ];
        $this->throwIfInvalid($required, $data);
        $uriArguments = [
            'profile' => $profile,
        ];

        return $this->client->post($this->buildUrl($uri, $uriArguments), $data, $response);
    }

    /**
     * Get spoken language of a profile.
     *
     * Permissions that may be checked: Profile.Locations.View
     *
     * @param string $profile
     * @param array $response
     * @return array
     * @throws GuzzleException
     */
    public function getAllSpokenLanguages(string $profile, array $response = []): array
    {
        $uri = 'team-directory/profiles/{profile}/spoken-languages';
        $uriArguments = [
            'profile' => $profile,
        ];

        return $this->client->get($this->buildUrl($uri, $uriArguments), $response);
    }

    /**
     * Delete spoken language for a profile.
     *
     * Permissions that may be checked: Profile.Languages.Edit
     *
     * @param string $profile
     * @param string $language
     * @return void
     * @throws GuzzleException
     */
    public function deleteSpokenLanguage(string $profile, string $language): void
    {
        $uri = 'team-directory/profiles/{profile}/spoken-languages/{language}';
        $uriArguments = [
            'profile' => $profile,
            'language' => $language,
        ];

        $this->client->delete($this->buildUrl($uri, $uriArguments));
    }
}