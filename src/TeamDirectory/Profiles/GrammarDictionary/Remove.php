<?php

namespace Swe\SpaceSDK\TeamDirectory\Profiles\GrammarDictionary;

use GuzzleHttp\Exception\GuzzleException;
use Swe\SpaceSDK\AbstractApi;
use Swe\SpaceSDK\Exception\MissingArgumentException;
use Swe\SpaceSDK\Type;

/**
 * Class Remove
 * Generated at 2024-03-06 02:53
 *
 * @package Swe\SpaceSDK\TeamDirectory\Profiles\GrammarDictionary
 * @author Luca Braun <l.braun@s-w-e.com>
 */
final class Remove extends AbstractApi
{
    /**
     * This endpoint will try to remove an entry from the user's personal grammar dictionary and return true if the value was present and removed and false otherwise.
     *
     * @param array $request
     * @return bool
     * @throws GuzzleException
     * @throws MissingArgumentException
     */
    final public function removeTheEntryFromThePersonalDictionary(array $request): bool
    {
        $uri = 'team-directory/profiles/grammar-dictionary/remove';
        $required = [
            'profileId' => Type::String,
            'dictionaryType' => Type::String,
            'entryValue' => Type::String,
        ];
        $this->throwIfInvalid($required, $request);

        return (bool)$this->client->delete($this->buildUrl($uri), $request)[0];
    }
}
