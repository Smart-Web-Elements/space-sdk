<?php

namespace Swe\SpaceSDK;

use GuzzleHttp\Exception\GuzzleException;
use Swe\SpaceSDK\Organization\Domains;
use Swe\SpaceSDK\Organization\JetSales;

/**
 * Class Organization
 *
 * @package Swe\SpaceSDK
 * @author Luca Braun <l.braun@s-w-e.com>
 */
class Organization extends AbstractApi
{
    /**
     * @param array $response
     * @return array
     * @throws GuzzleException
     */
    public function getOrganization(array $response = []): array
    {
        $uri = 'organization';

        return $this->client->get($this->buildUrl($uri), $response);
    }

    /**
     * @param array $data
     * @return void
     * @throws Exception\MissingArgumentException
     * @throws GuzzleException
     */
    public function updateOrganization(array $data): void
    {
        $uri = 'organization';
        $required = [
            'orgData' => [
                'name' => self::TYPE_STRING,
            ],
        ];
        $this->throwIfInvalid($required, $data);

        $this->client->patch($this->buildUrl($uri), $data);
    }

    /**
     * @return Domains
     */
    public function domains(): Domains
    {
        return new Domains($this->client);
    }

    /**
     * @return JetSales
     */
    public function jetSales(): JetSales
    {
        return new JetSales($this->client);
    }
}