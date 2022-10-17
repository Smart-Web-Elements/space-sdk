# JetBrains Space SDK

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

## Information

The classes and methods are named like in the Space API defined.
This package uses [Semantic Versioning](https://semver.org/lang/) as soon as reaching v1.

## Status Space API

- [ ] Absences
  - [ ] Absences
  - [ ] Absence Reasons
- [ ] Administration
  - [ ] Support
  - [ ] User Agreement
    - [ ] User Agreement
    - [ ] Enabled
    - [ ] Status
- [ ] Applications
  - [ ] Applications
  - [ ] Authorizations
    - [ ] Authorizations
    - [ ] Authorized Rights
    - [ ] Required Rights
  - [ ] Client Secret
  - [ ] Permanent Tokens
    - [ ] Permanent Tokens
    - [ ] Current
  - [ ] Signing Key
  - [ ] Ssh Keys
  - [ ] Ui Extensions
  - [ ] Unfurl Domains
  - [ ] Unfurl Patterns
  - [ ] Unfurls
    - [ ] Domains
    - [ ] Patterns
    - [ ] Queue
  - [ ] Verification Token
  - [ ] Webhooks
    - [ ] Webhooks
    - [ ] Custom Headers
    - [ ] Signing Key
    - [ ] Subscriptions
- [ ] Auth Modules
  - [ ] Auth Modules
  - [ ] Config
  - [ ] Logins
  - [ ] Test
  - [ ] Throttled Logins
    - [ ] Throttled Logins
    - [ ] Org Status
  - [ ] Usages
- [ ] Billing Admin
  - [ ] Billing Admin
  - [ ] Overdrafts
  - [ ] Reports
    - [ ] Reports
    - [ ] Today
- [ ] Blog
- [ ] Calendars
  - [ ] Absence Events
  - [ ] Birthday Events
    - [ ] Birthday Events
    - [ ] Starred
  - [ ] Event Participations
  - [ ] Events
  - [ ] Holidays
  - [ ] Meetings
    - [ ] Meetings
    - [ ] Participation Status
  - [ ] Membership Events
  - [ ] Non Working Day Events
- [x] **Calls**
- [x] **Chats**
  - [x] **Channels**
    - [x] **Channels**
    - [x] **Administrator**
    - [x] **Attachments**
      - [x] **Attachments**
      - [x] **Files**
      - [x] **Images**
      - [x] **Links**
      - [x] **Videos**
    - [x] **Conversations**
      - [x] **Conversations**
      - [x] **Subject**
    - [x] **Description**
    - [x] **Icon**
    - [x] **Name**
    - [x] **Subscribers**
      - [x] **Teams**
      - [x] **Users**
  - [x] **Messages**
    - [x] **Messages**
    - [x] **Pinned Messages**
- [x] **Checklists**
  - [x] **Items**
- [ ] Custom Fields
  - [ ] Fields
    - [ ] Fields
    - [ ] Enum Values
  - [ ] Values
- [ ] Emojis
- [x] **External Link Patterns**
- [x] **HTTP API Model**
- [ ] Notifications
  - [ ] Notifications
  - [ ] Channel Subscriptions
  - [ ] Personal Custom Subscriptions
  - [ ] Personal Subscriptions
  - [ ] Private Feeds
- [ ] Organization
  - [ ] Organization
  - [ ] Domains
  - [ ] Jet Sales
- [ ] Permission Roles
  - [ ] Permission Roles
  - [ ] 2 Fa Requirement
  - [ ] Permissions
  - [ ] Profiles
  - [ ] Teams
- [ ] Permissions
- [ ] Projects
  - [ ] Projects *(WIP)*
  - [ ] Access
    - [ ] Admins
      - [ ] Admins
      - [ ] Profiles
      - [ ] Teams
    - [ ] Collaborators
      - [ ] Collaborators
      - [ ] Profiles
      - [ ] Teams
    - [ ] Member Profiles
    - [ ] Members
      - [ ] Profiles
      - [ ] Teams
    - [ ] Viewers
  - [ ] Automation
    - [ ] DSL Evaluations
    - [ ] Deployment Targets
    - [ ] Deployments
    - [x] **Graph Executions**
    - [ ] Job Executions
    - [x] **Jobs**
    - [ ] Step Executions
      - [ ] Parameters
      - [ ] Used Parameters
        - [ ] Param
        - [ ] Secret
    - [ ] Subscriptions
      - [ ] Legacy Channels
  - [ ] Code Reviews
    - [ ] Code Reviews
    - [ ] Participants
    - [ ] Revisions
  - [ ] Documents
    - [ ] Documents
    - [ ] Copy
    - [ ] Delete Forever
    - [ ] Folders
      - [ ] Folders
      - [ ] Documents
      - [ ] Introduction
      - [ ] Move
      - [ ] Subfolders
    - [ ] Move
    - [ ] Unarchive
  - [ ] Packages
    - [ ] Repositories
      - [ ] Repositories
      - [ ] Cleanup
        - [ ] Cleanup
        - [ ] Dry
      - [ ] Connections
        - [ ] Connections
        - [ ] Publish
      - [ ] Files
      - [ ] Packages
        - [ ] Metadata
        - [ ] Versions
      - [ ] Url
    - [ ] Search
    - [ ] Types
  - [ ] Params
    - [ ] Params
    - [ ] Default Bundle
  - [ ] Planning
    - [ ] Boards
    - [ ] Checklists
    - [ ] Issues
      - [ ] Issues
      - [ ] Attachments
      - [ ] Checklists
      - [ ] Code Reviews
      - [ ] Comments
      - [ ] Commits
      - [ ] Statuses
        - [ ] Statuses
        - [ ] Auto Update On Merge Request Merge
        - [ ] Distribution
      - [ ] Tags
    - [ ] Tags
  - [ ] Private Projects
  - [ ] Repositories
    - [ ] Repositories *(WIP)*
    - [ ] Find
    - [ ] Readonly
    - [ ] Revisions
      - [ ] External Checks
  - [ ] Responsibilities
    - [ ] Responsibilities
    - [ ] Assignees
    - [ ] Scheme
    - [ ] Subjects
  - [ ] Secrets
    - [ ] Secrets
    - [ ] Default Bundle
  - [ ] Tags
  - [ ] Topics
  - [ ] Vault
- [ ] Public Holidays
  - [ ] Calendars
  - [ ] Holidays
    - [ ] Holidays
    - [ ] Profile Holidays
    - [ ] Related Holidays
- [ ] Reactions
- [ ] Rich Text
- [ ] Team Directory
  - [ ] Invitation Links
  - [ ] Invitations
  - [ ] Languages
  - [ ] Location Equipment Types
  - [ ] Location Map Member Points
  - [ ] Locations
    - [ ] Locations
    - [ ] Map
  - [ ] Locations With Timezone
  - [ ] Member Locations
  - [ ] Membership Events
  - [ ] Memberships
    - [ ] Memberships
    - [ ] Manager Candidates
    - [ ] Request Revoke
    - [ ] Requests
  - [ ] Profiles
    - [ ] Profiles
    - [ ] 2 Fa
      - [ ] Requirements
      - [ ] Status
      - [ ] Totp
    - [ ] Application Passwords
    - [ ] Authentication Sessions
    - [ ] Checklists
      - [ ] Checklists
      - [ ] Full Checklist Tree
    - [ ] Dashboards
    - [ ] Documents
      - [ ] Documents
      - [ ] Copy
      - [ ] Delete Forever
      - [ ] Folders
        - [ ] Folders
        - [ ] Documents
        - [ ] Introduction
        - [ ] Move
        - [ ] Subfolders
      - [ ] Move
      - [ ] Unarchive
    - [ ] Gpg Keys
    - [ ] Nav Bar Menu Items
    - [ ] Nav Bar Projects
    - [ ] Notification Settings
    - [ ] OAuth Consents
      - [ ] OAuth Consents
      - [ ] Applications
      - [ ] Approved Scopes
      - [ ] Internal Applications
      - [ ] Refresh Tokens
    - [ ] Permanent Tokens
      - [ ] Permanent Tokens
      - [ ] Current
    - [ ] Settings
    - [ ] Spoken Languages
    - [ ] Ssh Keys
    - [ ] Timezone
    - [ ] Working Days
  - [ ] Roles
  - [ ] Stats
  - [ ] Teams
    - [ ] Teams
    - [ ] Direct Members
- [x] **To-Do Items**
- [ ] Trusted Certificates
- [ ] Unfurls
- [ ] Uploads
  - [ ] Uploads
    - [ ] Public Urls
  - [ ] Chat
  - [ ] Image