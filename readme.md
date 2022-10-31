# JetBrains Space SDK

[![GitHub issues](https://img.shields.io/github/issues/Smart-Web-Elements/space-sdk)](https://github.com/Smart-Web-Elements/space-sdk/issues)
[![Packagist Downloads](https://img.shields.io/packagist/dt/swe/space-sdk)](https://packagist.org/packages/swe/space-sdk)
[![Packagist Version](https://img.shields.io/packagist/v/swe/space-sdk)](https://packagist.org/packages/swe/space-sdk)
[![License](https://img.shields.io/packagist/l/swe/space-sdk)](https://packagist.org/packages/swe/space-sdk)
[![PHP Version](https://img.shields.io/packagist/php-v/swe/space-sdk)](https://packagist.org/packages/swe/space-sdk)

## An example to use:

```php
use Swe\SpaceSDK\HttpClient;
use Swe\SpaceSDK\Space;

$clientId = $_ENV['CLIENT_ID'];
$clientSecret = $_ENV['CLIENT_SECRET'];
$url = $_ENV['URL'];

$client = new HttpClient($url, $clientId, $clientSecret);
$space = new Space($client);

// Create a new project.
$projectInformation = $space->projects()->createProject([
    'key' => [
        'key' => 'MY_PROJECT',
    ],
    'name' => 'My Project',
]);

// Create a new channel if not exist.
if ($space->chats()->channels()->isNameFree(['name' => 'General'])) {
    $channel = $space->chats()->channels()->addNewChannel([
        'name' => 'General',
        'description' => 'No specific topic..',
        'private' => false,
    ]);
}
```

## Information

All package classes are generated automatically.
Please submit your issues on [GitHub](https://github.com/Smart-Web-Elements/space-sdk/issues).
