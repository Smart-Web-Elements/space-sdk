<?php

namespace Swe\SpaceSDK\Projects\Automation\Subscriptions;

use GuzzleHttp\Exception\GuzzleException;
use Swe\SpaceSDK\AbstractApi;

/**
 * Class LegacyChannels
 * Generated at 2023-05-17 02:00
 *
 * @package Swe\SpaceSDK\Projects\Automation\Subscriptions
 * @author Luca Braun <l.braun@s-w-e.com>
 */
final class LegacyChannels extends AbstractApi
{
    /**
     * Delete the legacy subscription channels matching the given filters (applied as AND). If no filter is provided, all subscription channels corresponding to unsubscribed jobs for the logged in user are deleted.
     *
     * @param array $request
     * @return void
     * @throws GuzzleException
     */
    final public function deleteLegacyChannels(array $request = []): void
    {
        $uri = 'projects/automation/subscriptions/legacy-channels';

        $this->client->delete($this->buildUrl($uri), $request);
    }
}
