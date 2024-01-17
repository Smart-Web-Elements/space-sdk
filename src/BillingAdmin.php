<?php

namespace Swe\SpaceSDK;

use GuzzleHttp\Exception\GuzzleException;
use Swe\SpaceSDK\BillingAdmin\Overdrafts;
use Swe\SpaceSDK\BillingAdmin\Reports;
use Swe\SpaceSDK\Exception\MissingArgumentException;

/**
 * Class BillingAdmin
 * Generated at 2024-01-17 02:00
 *
 * @package Swe\SpaceSDK
 * @author Luca Braun <l.braun@s-w-e.com>
 */
final class BillingAdmin extends AbstractApi
{
    /**
     * Permissions that may be checked: Organization.ViewOrganizationInfo
     *
     * @param array $response
     * @return array
     * @throws GuzzleException
     */
    final public function getFeatures(array $response = []): array
    {
        $uri = 'billing-admin/features';

        return $this->client->get($this->buildUrl($uri), [], $response);
    }

    /**
     * Permissions that may be checked: Superadmin
     *
     * @param array $data
     * @return void
     * @throws GuzzleException
     * @throws MissingArgumentException
     */
    final public function activateTrialNotAvailableForOnPremisesInstallations(array $data): void
    {
        $uri = 'billing-admin/trial';
        $required = [
            'trialTier' => Type::String,
        ];
        $this->throwIfInvalid($required, $data);

        $this->client->put($this->buildUrl($uri), $data);
    }

    /**
     * @return Overdrafts
     */
    final public function overdrafts(): Overdrafts
    {
        return new Overdrafts($this->client);
    }

    /**
     * @return Reports
     */
    final public function reports(): Reports
    {
        return new Reports($this->client);
    }
}
