<?php

namespace Swe\SpaceSDK\Projects\Automation\DeploymentTargets;

use GuzzleHttp\Exception\GuzzleException;
use Swe\SpaceSDK\AbstractApi;
use Swe\SpaceSDK\Exception\MissingArgumentException;
use Swe\SpaceSDK\Type;

/**
 * Class AuditLog
 * Generated at 2023-09-20 02:00
 *
 * @package Swe\SpaceSDK\Projects\Automation\DeploymentTargets
 * @author Luca Braun <l.braun@s-w-e.com>
 */
final class AuditLog extends AbstractApi
{
    /**
     * Permissions that may be checked: Project.Deployments.View
     *
     * @param array $request
     * @param array $response
     * @return array
     * @throws GuzzleException
     * @throws MissingArgumentException
     */
    final public function auditLog(array $request, array $response = []): array
    {
        $uri = 'projects/automation/deployment-targets/audit-log';
        $required = [
            'targetIdentifier' => Type::String,
        ];
        $this->throwIfInvalid($required, $request);

        return $this->client->get($this->buildUrl($uri), $request, $response);
    }
}
