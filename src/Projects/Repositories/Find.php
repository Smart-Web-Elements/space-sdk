<?php

namespace Swe\SpaceSDK\Projects\Repositories;

use GuzzleHttp\Exception\GuzzleException;
use Swe\SpaceSDK\AbstractApi;
use Swe\SpaceSDK\Exception\MissingArgumentException;
use Swe\SpaceSDK\Type;

/**
 * Class Find
 * Generated at 2023-08-19 02:00
 *
 * @package Swe\SpaceSDK\Projects\Repositories
 * @author Luca Braun <l.braun@s-w-e.com>
 */
final class Find extends AbstractApi
{
    /**
     * Find repositories by name substring.
     *
     * Permissions that may be checked: VcsRepository.Read
     *
     * @param array $request
     * @param array $response
     * @return array
     * @throws GuzzleException
     * @throws MissingArgumentException
     */
    final public function findRepositories(array $request, array $response = []): array
    {
        $uri = 'projects/repositories/find';
        $required = [
            'term' => Type::String,
        ];
        $this->throwIfInvalid($required, $request);

        return $this->client->get($this->buildUrl($uri), $request, $response);
    }
}
