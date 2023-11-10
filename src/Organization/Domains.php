<?php

namespace Swe\SpaceSDK\Organization;

use GuzzleHttp\Exception\GuzzleException;
use Swe\SpaceSDK\AbstractApi;
use Swe\SpaceSDK\Exception\MissingArgumentException;
use Swe\SpaceSDK\Type;

/**
 * Class Domains
 * Generated at 2023-11-10 04:08
 *
 * @package Swe\SpaceSDK\Organization
 * @author Luca Braun <l.braun@s-w-e.com>
 */
final class Domains extends AbstractApi
{
    /**
     * @param array $response
     * @return array
     * @throws GuzzleException
     */
    final public function getAllDomains(array $response = []): array
    {
        $uri = 'organization/domains';

        return $this->client->get($this->buildUrl($uri), [], $response);
    }

    /**
     * @param array $request
     * @return string
     * @throws GuzzleException
     * @throws MissingArgumentException
     */
    final public function checkDomainAvailability(array $request): string
    {
        $uri = 'organization/domains/check';
        $required = [
            'domain' => Type::String,
        ];
        $this->throwIfInvalid($required, $request);

        return (string)$this->client->get($this->buildUrl($uri), $request)[0];
    }

    /**
     * @param array $data
     * @return void
     * @throws GuzzleException
     * @throws MissingArgumentException
     */
    final public function updateOrganizationDomain(array $data): void
    {
        $uri = 'organization/domains';
        $required = [
            'domain' => Type::String,
        ];
        $this->throwIfInvalid($required, $data);

        $this->client->patch($this->buildUrl($uri), $data);
    }
}
