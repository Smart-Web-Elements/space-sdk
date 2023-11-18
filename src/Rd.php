<?php

namespace Swe\SpaceSDK;

use GuzzleHttp\Exception\GuzzleException;
use Swe\SpaceSDK\Exception\MissingArgumentException;

/**
 * Class Rd
 * Generated at 2023-11-18 04:46
 *
 * @package Swe\SpaceSDK
 * @author Luca Braun <l.braun@s-w-e.com>
 */
final class Rd extends AbstractApi
{
    /**
     * Permissions that may be checked: Rd.Workspaces.Create
     *
     * @param array $request
     * @param array $response
     * @return array
     * @throws GuzzleException
     * @throws MissingArgumentException
     */
    final public function getAvailableWarmupExecutions(array $request, array $response = []): array
    {
        $uri = 'rd/warmups';
        $required = [
            'projectIdentifier' => Type::String,
            'repositoryName' => Type::String,
        ];
        $this->throwIfInvalid($required, $request);

        return $this->client->get($this->buildUrl($uri), $request, $response);
    }
}
