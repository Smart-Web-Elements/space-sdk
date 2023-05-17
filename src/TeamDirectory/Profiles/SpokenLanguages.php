<?php

namespace Swe\SpaceSDK\TeamDirectory\Profiles;

use GuzzleHttp\Exception\GuzzleException;
use Swe\SpaceSDK\AbstractApi;
use Swe\SpaceSDK\Exception\MissingArgumentException;
use Swe\SpaceSDK\Type;

/**
 * Class SpokenLanguages
 * Generated at 2023-05-17 02:00
 *
 * @package Swe\SpaceSDK\TeamDirectory\Profiles
 * @author Luca Braun <l.braun@s-w-e.com>
 */
final class SpokenLanguages extends AbstractApi
{
    /**
     * Update spoken language for a profile. Optionally, firstName and lastName can be specified to add a localized name to the profile.
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
    final public function createSpokenLanguage(string $profile, array $data, array $response = []): array
    {
        $uri = 'team-directory/profiles/{profile}/spoken-languages';
        $required = [
            'language' => Type::String,
        ];
        $this->throwIfInvalid($required, $data);
        $uriArguments = [
            'profile' => $profile,
        ];

        return $this->client->post($this->buildUrl($uri, $uriArguments), $data, [], $response);
    }

    /**
     * Get spoken language of a profile
     *
     * Permissions that may be checked: Profile.Locations.View
     *
     * @param string $profile
     * @param array $response
     * @return array
     * @throws GuzzleException
     */
    final public function getAllSpokenLanguages(string $profile, array $response = []): array
    {
        $uri = 'team-directory/profiles/{profile}/spoken-languages';
        $uriArguments = [
            'profile' => $profile,
        ];

        return $this->client->get($this->buildUrl($uri, $uriArguments), [], $response);
    }

    /**
     * Delete spoken language for a profile
     *
     * Permissions that may be checked: Profile.Languages.Edit
     *
     * @param string $profile
     * @param string $language
     * @return void
     * @throws GuzzleException
     */
    final public function deleteSpokenLanguage(string $profile, string $language): void
    {
        $uri = 'team-directory/profiles/{profile}/spoken-languages/{language}';
        $uriArguments = [
            'profile' => $profile,
            'language' => $language,
        ];

        $this->client->delete($this->buildUrl($uri, $uriArguments));
    }
}
