<?php

namespace Swe\SpaceSDK\BillingAdmin;

use GuzzleHttp\Exception\GuzzleException;
use Swe\SpaceSDK\AbstractApi;
use Swe\SpaceSDK\Exception\MissingArgumentException;

/**
 * Class Overdrafts
 *
 * @package Swe\SpaceSDK\BillingAdmin
 * @author Luca Braun <l.braun@s-w-e.com>
 */
class Overdrafts extends AbstractApi
{
    /**
     * Permissions that may be checked: Organization.ViewUsageData
     *
     * @param array $response
     * @return array
     * @throws GuzzleException
     */
    public function getOverdrafts(array $response = []): array
    {
        $uri = 'billing-admin/overdrafts';

        return $this->client->get($this->buildUrl($uri), $response);
    }

    /**
     * Permissions that may be checked: Organization.UpdateOverdrafts
     *
     * @param array $data
     * @return void
     * @throws GuzzleException
     * @throws MissingArgumentException
     */
    public function setOverdrafts(array $data): void
    {
        $uri = 'billing-admin/overdrafts';
        $required = [
            'storage' => self::TYPE_INTEGER,
            'bandwidth' => self::TYPE_INTEGER,
            'ciCredits' => self::TYPE_INTEGER,
        ];
        $this->throwIfInvalid($required, $data);

        $this->client->post($this->buildUrl($uri), $data);
    }
}