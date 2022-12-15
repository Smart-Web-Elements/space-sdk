<?php

namespace Swe\SpaceSDK\Organization;

use GuzzleHttp\Exception\GuzzleException;
use Swe\SpaceSDK\AbstractApi;

/**
 * Class JetSales
 * Generated at 2022-12-15 02:00
 *
 * @package Swe\SpaceSDK\Organization
 * @author Luca Braun <l.braun@s-w-e.com>
 */
final class JetSales extends AbstractApi
{
    /**
     * @param array $response
     * @return string|null
     * @throws GuzzleException
     */
    final public function checkDomainAvailability(): ?string
    {
        $uri = 'organization/jet-sales/url';

        return (string)$this->client->get($this->buildUrl($uri))[0];
    }
}
