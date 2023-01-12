<?php

namespace Swe\SpaceSDK\TeamDirectory\Profiles\TwoFa;

use GuzzleHttp\Exception\GuzzleException;
use Swe\SpaceSDK\AbstractApi;
use Swe\SpaceSDK\Exception\MissingArgumentException;
use Swe\SpaceSDK\Type;

/**
 * Class Totp
 * Generated at 2023-01-12 02:00
 *
 * @package Swe\SpaceSDK\TeamDirectory\Profiles\TwoFa
 * @author Luca Braun <l.braun@s-w-e.com>
 */
final class Totp extends AbstractApi
{
    /**
     * Set up two-factor authentication using TOTP (Time-based One-time Password) for a given profile ID. The response will return a QR code (base64 encoded) that can be scanned with an app to setup two-factor authentication. The code that the app generates has to be confirmed in Space to enable TOTP.
     *
     * Permissions that may be checked: Profile.TwoFactorAuthentication.Create
     *
     * @param string $profile
     * @param array $response
     * @return array
     * @throws GuzzleException
     */
    final public function setUpTotpTwoFactorAuthentication(string $profile, array $response = []): array
    {
        $uri = 'team-directory/profiles/{profile}/2-fa/totp';
        $uriArguments = [
            'profile' => $profile,
        ];

        return $this->client->post($this->buildUrl($uri, $uriArguments), [], [], $response);
    }

    /**
     * Confirm two-factor authentication for a given profile ID using a TOTP (Time-based One-time Password) code from an app.
     *
     * Permissions that may be checked: Profile.TwoFactorAuthentication.Create
     *
     * @param string $profile
     * @param array $data
     * @return void
     * @throws GuzzleException
     * @throws MissingArgumentException
     */
    final public function confirmTotpTwoFactorAuthenticationSettings(string $profile, array $data): void
    {
        $uri = 'team-directory/profiles/{profile}/2-fa/totp/confirm';
        $required = [
            'code' => Type::Integer,
        ];
        $this->throwIfInvalid($required, $data);
        $uriArguments = [
            'profile' => $profile,
        ];

        $this->client->post($this->buildUrl($uri, $uriArguments), $data);
    }

    /**
     * Enable/disable two-factor authentication settings for a given profile ID
     *
     * Permissions that may be checked: Profile.TwoFactorAuthentication.Edit
     *
     * @param string $profile
     * @param array $data
     * @return void
     * @throws GuzzleException
     * @throws MissingArgumentException
     */
    final public function updateTotpTwoFactorAuthenticationSettings(string $profile, array $data): void
    {
        $uri = 'team-directory/profiles/{profile}/2-fa/totp';
        $required = [
            'enabled' => Type::Boolean,
        ];
        $this->throwIfInvalid($required, $data);
        $uriArguments = [
            'profile' => $profile,
        ];

        $this->client->patch($this->buildUrl($uri, $uriArguments), $data);
    }

    /**
     * Remove two-factor authentication settings for a given profile ID. Previously generated TOTP (Time-based One-time Password) are rendered invalid.
     *
     * Permissions that may be checked: Profile.TwoFactorAuthentication.Edit
     *
     * @param string $profile
     * @return void
     * @throws GuzzleException
     */
    final public function deleteCurrentTotpTwoFactorAuthenticationSettings(string $profile): void
    {
        $uri = 'team-directory/profiles/{profile}/2-fa/totp';
        $uriArguments = [
            'profile' => $profile,
        ];

        $this->client->delete($this->buildUrl($uri, $uriArguments));
    }
}
