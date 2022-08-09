# JetBrains Space SDK

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

// Create a new project.
$projectInformation = $space->project()->createProject([
    'key' => [
        'key' => 'MY_PROJECT',
    ],
    'name' => 'My Project',
]);

// Create a new channel if not exist.
if ($space->chats()->channels()->isNameFree('General')) {
    $channel = $space->chats()->channels()->addNewChannel([
        'name' => 'General',
        'description' => 'No specific topic..',
        'private' => false,
    ]);
}
```

## Status

- Absences *(ToDo)*
- Administration *(ToDo)*
- Applications *(ToDo)*
- Auth Modules *(ToDo)*
- Billing Admin *(ToDo)*
- Blog *(ToDo)*
- Calendars *(ToDo)*
- Calls *(ToDo)*
- **Chats *(WIP)***
  - **Channels *(Channels itself done)***
  - **Messages *(WIP)***
- Custom Fields *(ToDo)*
- Emojis *(ToDo)*
- External Link Patterns *(ToDo)*
- HTTP API Model *(ToDo)*
- Notifications *(ToDo)*
- Organization *(ToDo)*
- Permission Roles *(ToDo)*
- Permissions *(ToDo)*
- **Projects *(Project itself done)***
  - **Repositories (Done)**
- Public Holidays *(ToDo)*
- Rd *(ToDo)*
- Reactions *(ToDo)*
- Rich Text *(ToDo)*
- Team Directory *(ToDo)*
- ~~To-Do Items~~ *(An application is not allowed to do anything with To-Do Items)*
- Trusted Certificates *(ToDo)*
- Unfurls *(ToDo)*
- Uploads *(ToDo)*