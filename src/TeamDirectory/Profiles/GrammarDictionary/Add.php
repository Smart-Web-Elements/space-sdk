<?php

namespace Swe\SpaceSDK\TeamDirectory\Profiles\GrammarDictionary;

use GuzzleHttp\Exception\GuzzleException;
use Swe\SpaceSDK\AbstractApi;
use Swe\SpaceSDK\Exception\MissingArgumentException;
use Swe\SpaceSDK\Type;

/**
 * Class Add
 * Generated at 2024-03-16 02:07
 *
 * @package Swe\SpaceSDK\TeamDirectory\Profiles\GrammarDictionary
 * @author Luca Braun <l.braun@s-w-e.com>
 */
final class Add extends AbstractApi
{
    /**
     * This endpoint will try to add an entry to the user's personal grammar dictionary and return true if the value is valid for dictionary, were not present before and then added and false otherwise.
     *
     * @param array $data
     * @return bool
     * @throws GuzzleException
     * @throws MissingArgumentException
     */
    final public function addTheEntryToThePersonalDictionary(array $data): bool
    {
        $uri = 'team-directory/profiles/grammar-dictionary/add';
        $required = [
            'profileId' => Type::String,
            'dictionaryType' => Type::String,
            'entry' => [
                'entry' => Type::String,
            ],
        ];
        $this->throwIfInvalid($required, $data);

        return (bool)$this->client->post($this->buildUrl($uri), $data)[0];
    }
}
