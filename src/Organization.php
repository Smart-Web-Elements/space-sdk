<?php

namespace Swe\SpaceSDK;

use GuzzleHttp\Exception\GuzzleException;
use Swe\SpaceSDK\Exception\MissingArgumentException;
use Swe\SpaceSDK\Organization\Domains;
use Swe\SpaceSDK\Organization\JetSales;

/**
 * Class Organization
 * Generated at 2024-03-16 02:07
 *
 * @package Swe\SpaceSDK
 * @author Luca Braun <l.braun@s-w-e.com>
 */
final class Organization extends AbstractApi
{
    /**
     * @param array $response
     * @return array
     * @throws GuzzleException
     */
    final public function getOrganization(array $response = []): array
    {
        $uri = 'organization';

        return $this->client->get($this->buildUrl($uri), [], $response);
    }

    /**
     * @param array $data
     * @return void
     * @throws GuzzleException
     * @throws MissingArgumentException
     */
    final public function updateOrganization(array $data): void
    {
        $uri = 'organization';
        $required = [
            'orgData' => [
            ],
        ];
        $this->throwIfInvalid($required, $data);

        $this->client->patch($this->buildUrl($uri), $data);
    }

    /**
     * @return Domains
     */
    final public function domains(): Domains
    {
        return new Domains($this->client);
    }

    /**
     * @return JetSales
     */
    final public function jetSales(): JetSales
    {
        return new JetSales($this->client);
    }
}
