<p align="center">
    <a href="https://packagist.org/packages/swe/space-sdk">
        <img alt="Packagist Downloads" src="https://img.shields.io/packagist/dt/swe/space-sdk">
    </a>
    <a href="https://packagist.org/packages/swe/space-sdk">
        <img alt="Packagist Version" src="https://img.shields.io/packagist/v/swe/space-sdk">
    </a>
    <a href="https://packagist.org/packages/swe/space-sdk">
        <img alt="Packagist Version" src="https://img.shields.io/packagist/l/swe/space-sdk">
    </a>
    <a href="https://packagist.org/packages/swe/space-sdk">
        <img alt="Packagist Version" src="https://img.shields.io/packagist/php-v/swe/space-sdk">
    </a>
</p>

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