<?php

namespace Swe\SpaceSDK\Applications\Unfurls;

use GuzzleHttp\Exception\GuzzleException;
use Swe\SpaceSDK\AbstractApi;
use Swe\SpaceSDK\Exception\MissingArgumentException;
use Swe\SpaceSDK\Type;

/**
 * Class Domains
 * Generated at 2023-07-13 02:15
 *
 * @package Swe\SpaceSDK\Applications\Unfurls
 * @author Luca Braun <l.braun@s-w-e.com>
 */
final class Domains extends AbstractApi
{
    /**
     * Update list of domains for unfurling by the application. Method is to be called by the application providing unfurls.
     *
     * Permissions that may be checked: Applications.Edit
     *
     * @param array $data
     * @return void
     * @throws GuzzleException
     * @throws MissingArgumentException
     */
    final public function updateUnfurledDomains(array $data): void
    {
        $uri = 'applications/unfurls/domains';
        $required = [
            'domains' => Type::Array,
        ];
        $this->throwIfInvalid($required, $data);

        $this->client->patch($this->buildUrl($uri), $data);
    }
}
