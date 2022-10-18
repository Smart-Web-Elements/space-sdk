<?php

namespace Swe\SpaceSDK\Organization;

use GuzzleHttp\Exception\GuzzleException;
use Swe\SpaceSDK\AbstractApi;

/**
 * Class JetSales
 *
 * @package Swe\SpaceSDK\Organization
 * @author Luca Braun <l.braun@s-w-e.com>
 */
class JetSales extends AbstractApi
{
    /**
     * @return string|null
     * @throws GuzzleException
     */
    public function checkDomainAvailability(): ?string
    {
        $uri = 'organization/jet-sales/url';

        return $this->client->get($this->buildUrl($uri))[0];
    }
}