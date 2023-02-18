<?php

namespace Swe\SpaceSDK\Organization;

use GuzzleHttp\Exception\GuzzleException;
use Swe\SpaceSDK\AbstractApi;

/**
 * Class JetSales
 * Generated at 2023-02-18 02:00
 *
 * @package Swe\SpaceSDK\Organization
 * @author Luca Braun <l.braun@s-w-e.com>
 */
final class JetSales extends AbstractApi
{
    /**
     * @return string|null
     * @throws GuzzleException
     */
    final public function getLicenseActivationUrl(): ?string
    {
        $uri = 'organization/jet-sales/license-activation-url';

        return (string)$this->client->get($this->buildUrl($uri))[0];
    }

    /**
     * @return string|null
     * @throws GuzzleException
     */
    final public function getJetsalesUrl(): ?string
    {
        $uri = 'organization/jet-sales/url';

        return (string)$this->client->get($this->buildUrl($uri))[0];
    }
}
