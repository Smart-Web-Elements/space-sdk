<?php

namespace Swe\SpaceSDK\Organization;

use GuzzleHttp\Exception\GuzzleException;
use Swe\SpaceSDK\AbstractApi;

/**
 * Class Domains
 *
 * @package Swe\SpaceSDK\Organization
 * @author Luca Braun <l.braun@s-w-e.com>
 */
class Domains extends AbstractApi
{
    /**
     * @param array $response
     * @return array
     * @throws GuzzleException
     */
    public function getAllDomains(array $response = []): array
    {
        $uri = 'organization/domains';

        return $this->client->get($this->buildUrl($uri), $response);
    }

    /**
     * @param string $domain
     * @return string
     * @throws GuzzleException
     */
    public function checkDomainAvailability(string $domain): string
    {
        $uri = 'organization/domains/check';
        $request = [
            'domain' => $domain,
        ];

        return (string)$this->client->get($this->buildUrl($uri), [], $request)[0];
    }

    /**
     * @param string $domain
     * @return void
     * @throws GuzzleException
     */
    public function updateOrganizationDomain(string $domain): void
    {
        $uri = 'organization/domains';
        $data = [
            'domain' => $domain,
        ];

        $this->client->patch($this->buildUrl($uri), $data);
    }
}