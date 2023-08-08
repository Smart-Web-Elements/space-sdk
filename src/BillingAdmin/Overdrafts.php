<?php

namespace Swe\SpaceSDK\BillingAdmin;

use GuzzleHttp\Exception\GuzzleException;
use Swe\SpaceSDK\AbstractApi;
use Swe\SpaceSDK\Exception\MissingArgumentException;
use Swe\SpaceSDK\Type;

/**
 * Class Overdrafts
 * Generated at 2023-08-08 02:41
 *
 * @package Swe\SpaceSDK\BillingAdmin
 * @author Luca Braun <l.braun@s-w-e.com>
 */
final class Overdrafts extends AbstractApi
{
    /**
     * Permissions that may be checked: Organization.ViewUsageData
     *
     * @param array $response
     * @return array
     * @throws GuzzleException
     */
    final public function getOverdrafts(array $response = []): array
    {
        $uri = 'billing-admin/overdrafts';

        return $this->client->get($this->buildUrl($uri), [], $response);
    }

    /**
     * Permissions that may be checked: Organization.UpdateOverdrafts
     *
     * @param array $data
     * @return void
     * @throws GuzzleException
     * @throws MissingArgumentException
     */
    final public function setOverdrafts(array $data): void
    {
        $uri = 'billing-admin/overdrafts';
        $required = [
            'storage' => Type::Integer,
            'bandwidth' => Type::Integer,
            'ciCredits' => Type::Integer,
        ];
        $this->throwIfInvalid($required, $data);

        $this->client->put($this->buildUrl($uri), $data);
    }
}
