<?php

namespace Swe\SpaceSDK\BillingAdmin\Reports;

use GuzzleHttp\Exception\GuzzleException;
use Swe\SpaceSDK\AbstractApi;
use Swe\SpaceSDK\Exception\MissingArgumentException;
use Swe\SpaceSDK\Type;

/**
 * Class Today
 * Generated at 2023-02-18 02:00
 *
 * @package Swe\SpaceSDK\BillingAdmin\Reports
 * @author Luca Braun <l.braun@s-w-e.com>
 */
final class Today extends AbstractApi
{
    /**
     * Returns a billing report for today
     *
     * Permissions that may be checked: Organization.ViewUsageData
     *
     * @param array $request
     * @param array $response
     * @return array
     * @throws GuzzleException
     * @throws MissingArgumentException
     */
    final public function getBillingReportForToday(array $request, array $response = []): array
    {
        $uri = 'billing-admin/reports/today';
        $required = [
            'date' => Type::Date,
        ];
        $this->throwIfInvalid($required, $request);

        return $this->client->get($this->buildUrl($uri), $request, $response);
    }
}
