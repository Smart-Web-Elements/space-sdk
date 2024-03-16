<?php

namespace Swe\SpaceSDK\TeamDirectory\Profiles;

use GuzzleHttp\Exception\GuzzleException;
use Swe\SpaceSDK\AbstractApi;
use Swe\SpaceSDK\Exception\MissingArgumentException;
use Swe\SpaceSDK\TeamDirectory\Profiles\GrammarDictionary\Add;
use Swe\SpaceSDK\TeamDirectory\Profiles\GrammarDictionary\Remove;
use Swe\SpaceSDK\Type;

/**
 * Class GrammarDictionary
 * Generated at 2024-03-16 02:07
 *
 * @package Swe\SpaceSDK\TeamDirectory\Profiles
 * @author Luca Braun <l.braun@s-w-e.com>
 */
final class GrammarDictionary extends AbstractApi
{
    /**
     * This endpoint will return user's personal grammar dictionary entries
     *
     * @param array $request
     * @param array $response
     * @return array
     * @throws GuzzleException
     * @throws MissingArgumentException
     */
    final public function getThePersonalDictionaryEntries(array $request, array $response = []): array
    {
        $uri = 'team-directory/profiles/grammar-dictionary';
        $required = [
            'profileId' => Type::String,
            'dictionaryType' => Type::String,
        ];
        $this->throwIfInvalid($required, $request);

        return $this->client->get($this->buildUrl($uri), $request, $response);
    }

    /**
     * @return Add
     */
    final public function add(): Add
    {
        return new Add($this->client);
    }

    /**
     * @return Remove
     */
    final public function remove(): Remove
    {
        return new Remove($this->client);
    }
}
