<?php

namespace Swe\SpaceSDK\BillingAdmin;

use GuzzleHttp\Exception\GuzzleException;
use Swe\SpaceSDK\AbstractApi;
use Swe\SpaceSDK\BillingAdmin\Reports\Today;

/**
 * Class Reports
 *
 * @package Swe\SpaceSDK\BillingAdmin
 * @author Luca Braun <l.braun@s-w-e.com>
 */
class Reports extends AbstractApi
{
    /**
     * Returns a billing report for the given billing period.
     *
     * Permissions that may be checked: Organization.ViewUsageData
     *
     * @param string $billingPeriod
     * @param array $response
     * @return array
     * @throws GuzzleException
     */
    public function getBillingReport(string $billingPeriod, array $response = []): array
    {
        $uri = 'billing-admin/reports/{billingPeriod}';
        $uriArguments = [
            'billingPeriod' => $billingPeriod,
        ];

        return $this->client->get($this->buildUrl($uri, $uriArguments), $response);
    }

    /**
     * @return Today
     */
    public function today(): Today
    {
        return new Today($this->client);
    }
}