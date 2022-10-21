<?php

namespace Swe\SpaceSDK;

use GuzzleHttp\Exception\GuzzleException;
use Swe\SpaceSDK\BillingAdmin\Overdrafts;
use Swe\SpaceSDK\BillingAdmin\Reports;

/**
 * Class BillingAdmin
 *
 * @package Swe\SpaceSDK
 * @author Luca Braun <l.braun@s-w-e.com>
 */
class BillingAdmin extends AbstractApi
{
    /**
     * Permissions that may be checked: Superadmin
     *
     * @param string $trailTier
     * @return void
     * @throws GuzzleException
     */
    public function activateTrial(string $trailTier): void
    {
        $uri = 'billing-admin/trail';
        $data = [
            'trailTier' => $trailTier,
        ];

        $this->client->post($this->buildUrl($uri), $data);
    }

    /**
     * @return Overdrafts
     */
    public function overdrafts(): Overdrafts
    {
        return new Overdrafts($this->client);
    }

    /**
     * @return Reports
     */
    public function reports(): Reports
    {
        return new Reports($this->client);
    }
}