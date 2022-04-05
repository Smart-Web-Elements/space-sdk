[![Packagist Downloads](https://img.shields.io/packagist/dt/swe/space-sdk)](https://packagist.org/packages/swe/space-sdk)
[![Packagist Version](https://img.shields.io/packagist/v/swe/space-sdk)](https://packagist.org/packages/swe/space-sdk)
[![License](https://img.shields.io/packagist/l/swe/space-sdk)](https://packagist.org/packages/swe/space-sdk)
[![PHP Version](https://img.shields.io/packagist/php-v/swe/space-sdk)](https://packagist.org/packages/swe/space-sdk)

## Information coming soon...

```php
use Swe\SpaceSDK\HttpClient;
use Swe\SpaceSDK\Space;

$clientId = $_ENV['CLIENT_ID'];
$clientSecret = $_ENV['CLIENT_SECRET'];
$url = $_ENV['URL'];

$client = new HttpClient($url, $clientId, $clientSecret);
$space = new Space($client);

$projectData = [
    'key' => [
        'key' => 'MY_PROJECT',
    ],
    'name' => 'My Project',
];
$projectInformation = $space->project()->createProject($projectData);
```