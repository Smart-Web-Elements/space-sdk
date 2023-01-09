# JetBrains Space SDK

[![GitHub issues](https://img.shields.io/github/issues/Smart-Web-Elements/space-sdk)](https://github.com/Smart-Web-Elements/space-sdk/issues)
[![Packagist Downloads](https://img.shields.io/packagist/dt/swe/space-sdk)](https://packagist.org/packages/swe/space-sdk)
[![Packagist Version](https://img.shields.io/packagist/v/swe/space-sdk)](https://packagist.org/packages/swe/space-sdk)
[![License](https://img.shields.io/packagist/l/swe/space-sdk)](https://packagist.org/packages/swe/space-sdk)
[![PHP Version](https://img.shields.io/packagist/php-v/swe/space-sdk)](https://packagist.org/packages/swe/space-sdk)

Simplify your PHP connection to [JetBrains Space](https://www.jetbrains.com/space/) with this package. It represents
the whole [Space HTTP API](https://www.jetbrains.com/help/space/api.html) and is always up-to-date (checks every day at
3am GMT for updates).

## Installation

Install this package with `composer require swe/space-sdk` and you're done. Don't forget to create an application in
your Space Organisation for the [client credentials flow](https://www.jetbrains.com/help/space/client-credentials.html)
and grand permissions. The (most) permissions for each request are included in the comments, like so:

```php
final class Blog extends AbstractApi
{
    /**
     * Permissions that may be checked: Article.View
     *
     * @param array $request
     * @param array $response
     * @return array
     * @throws GuzzleException
     */
    final public function getAllBlogPosts(array $request = [], array $response = []): array
    {
        $uri = 'blog';

        return $this->client->get($this->buildUrl($uri), $request, $response);
    }
}
```

## Examples:

```php
use Swe\SpaceSDK\HttpClient;
use Swe\SpaceSDK\Space;

$clientId = 'Your Client ID Here';
$clientSecret = 'Your Client Secret Here';
$url = 'Your Space URL';

$space = new Space(new HttpClient($url, $clientId, $clientSecret));

// Let's create a project.
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
