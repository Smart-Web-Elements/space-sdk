<?php

namespace Swe\SpaceSDK\BillingAdmin\Reports;

use GuzzleHttp\Exception\GuzzleException;
use Swe\SpaceSDK\AbstractApi;
use Swe\SpaceSDK\Exception\MissingArgumentException;

/**
 * Class Today
 *
 * @package Swe\SpaceSDK\BillingAdmin\Reports
 * @author Luca Braun <l.braun@s-w-e.com>
 */
class Today extends AbstractApi
{
    /**
     * Returns a billing report for today.
     *
     * Permissions that may be checked: Organization.ViewUsageData
     *
     * @param array $request
     * @param array $response
     * @return array
     * @throws GuzzleException
     * @throws MissingArgumentException
     */
    public function getBillingReportForToday(array $request, array $response = []): array
    {
        $uri = 'billing-admin/reports/today';
        $required = [
            'data' => self::TYPE_DATE,
        ];
        $this->throwIfInvalid($required, $request);

        return $this->client->get($this->buildUrl($uri), $response, $request);
    }
}