<?php

namespace Swe\SpaceSDK\BillingAdmin;

use GuzzleHttp\Exception\GuzzleException;
use Swe\SpaceSDK\AbstractApi;
use Swe\SpaceSDK\BillingAdmin\Reports\Today;

/**
 * Class Reports
 * Generated at 2024-03-06 02:53
 *
 * @package Swe\SpaceSDK\BillingAdmin
 * @author Luca Braun <l.braun@s-w-e.com>
 */
final class Reports extends AbstractApi
{
    /**
     * Returns a billing report for the given billing period
     *
     * Permissions that may be checked: Organization.ViewUsageData
     *
     * @param string $billingPeriod
     * @param array $response
     * @return array
     * @throws GuzzleException
     */
    final public function getBillingReport(string $billingPeriod, array $response = []): array
    {
        $uri = 'billing-admin/reports/{billingPeriod}';
        $uriArguments = [
            'billingPeriod' => $billingPeriod,
        ];

        return $this->client->get($this->buildUrl($uri, $uriArguments), [], $response);
    }

    /**
     * @return Today
     */
    final public function today(): Today
    {
        return new Today($this->client);
    }
}
