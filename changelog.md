# Space SDK Changelog

## Space SDK v2.2.0

- Removed method `migrate` from `Swe\SpaceSDK\Projects\Repositories`
- Added method `migrateRepository` in `Swe\SpaceSDK\Projects\Repositories`
- Added method `setHead` in `Swe\SpaceSDK\Projects\Repositories`

## Space SDK v2.1.7

- Added method `suspendUserProfile` in `Swe\SpaceSDK\TeamDirectory\Profiles`
- Added method `restoreSuspendedUserProfile` in `Swe\SpaceSDK\TeamDirectory\Profiles`
- Added method `convertGuestUserIntoOrganizationMember` in `Swe\SpaceSDK\TeamDirectory\Profiles`
- Added method `convertOrganizationMemberIntoGuestUser` in `Swe\SpaceSDK\TeamDirectory\Profiles`
- Added class `Swe\SpaceSDK\Projects\Repositories\Migrate`
  - Added method `migrateRepository` in `Migrate`
- Added method `migrate` in `Swe\SpaceSDK\Projects\Repositories`
- Added method `testRemoteConnection` in `Swe\SpaceSDK\Projects\Repositories`
- Added method `forceRemoveApplication` in `Swe\SpaceSDK\Applications`

## Space SDK v2.1.7

- Added method `rebaseBranch` in `Swe\SpaceSDK\Projects\Repositories`
- Added method `mergeBranch` in `Swe\SpaceSDK\Projects\Repositories`
- Added method `deleteBranch` in `Swe\SpaceSDK\Projects\Repositories`
- Added method `cherryPickCommit` in `Swe\SpaceSDK\Projects\Repositories`
- Removed method `checkDomainAvailability` from `Swe\SpaceSDK\Organization\JetSales`
- Added method `getJetsalesUrl` in `Swe\SpaceSDK\Organization\JetSales`
- Added method `getLicenseActivationUrl` in `Swe\SpaceSDK\Organization\JetSales`
- Removed method `activateTrial` from `Swe\SpaceSDK\BillingAdmin`
- Added method `activateTrialNotAvailableForOnPremisesInstallations` in `Swe\SpaceSDK\BillingAdmin`

## Space SDK v2.0.7

- Fixed changelog.md

## Space SDK v2.0.6

- Updated changelog.md

## Space SDK v2.0.5

- Added class `Swe\SpaceSDK\Projects\Repositories\Settings`
    - Added method `getSettings` in `Settings`
    - Added method `setSettings` in `Settings`
- Added method `settings` in `Swe\SpaceSDK\Projects\Repositories`

## Space SDK v2.0.4

- Added class `Swe\SpaceSDK\Projects\CodeReviews\CodeDiscussions\SuggestedEdit`
    - Added method `alterSuggestedEdit` in `SuggestedEdit`
- Added class `Swe\SpaceSDK\Projects\CodeReviews\CodeDiscussions`
    - Added method `createCodeDiscussion` in `CodeDiscussions`
    - Added method `acceptSuggestedEdit` in `CodeDiscussions`
    - Added method `rejectSuggestedEdit` in `CodeDiscussions`
    - Added method `reopenSuggestedEdit` in `CodeDiscussions`
    - Added method `suggestedEdit` in `CodeDiscussions`
- Added method `codeDiscussions` in `Swe\SpaceSDK\Projects\CodeReviews`
- Added method `editReviewDescription` in `Swe\SpaceSDK\Projects\CodeReviews`
- Removed method `createCodeDiscussion` from `Swe\SpaceSDK\Projects\CodeReviews`

## Space SDK v2.0.3

- Added method `removeReviewParticiopant` in `Swe\SpaceSDK\Projects\CodeReviews\Participants`
- Removed method `removeReviewParticipant` from `Swe\SpaceSDK\Projects\CodeReviews\Participants`
- Added method `deleteFolder` in `Swe\SpaceSDK\Projects\Packages\Repositories\Files`
- Added method `findRepositories` in `Swe\SpaceSDK\Projects\Repositories\Find`
- Removed method `getAllFind` from `Swe\SpaceSDK\Projects\Repositories\Find`
- Added method `mergeMergeRequest` in `Swe\SpaceSDK\Projects\CodeReviews`
- Removed method `mergeAMergeRequest` from `Swe\SpaceSDK\Projects\CodeReviews`
- Added method `rebaseMergeRequest` in `Swe\SpaceSDK\Projects\CodeReviews`
- Removed method `rebaseAMergeRequest` from `Swe\SpaceSDK\Projects\CodeReviews`
- Moved `Swe\SpaceSDK\Exception\MissingArgumentException` in correct directory
- Added generation date in all generated classes

## Space SDK v2.0.2

- Updated readme

## Space SDK v2.0.1

- Fixed some issues

## Space SDK v2.0.0

- Rebuilt package by auto generation

## Space SDK v1.0.2

- Fixed some missing class relations

## Space SDK v1.0.1

- Fixed some issues with switched response and request fields

## Space SDK v1.0.0 [BREAKING]

- Added missing classes and methods
- **[BREAKING]** Renamed methods
- **[BREAKING]** Changed parameters in a lot of methods for easier handling

## Space SDK v0.0.8

- Added PHP 8.1 support

## Space SDK v0.0.7

- Added method `getChannel` in `Channels`
- Added method `deleteChannel` in `Channels`
- Added method `listAllChannels` in `Channels`
- Added method `restoreArchivedChannel` in `Channels`
- Added method `archiveChannel` in `Channels`

## Space SDK v0.0.6

- Added method `addUsers` in `Channels`

## Space SDK v0.0.5

- Improved missing validation
- Added method `getMessage` in `Messages`

## Space SDK v0.0.4

- Added method `isNameFree` in `Channels`

## Space SDK v0.0.3

- Fixed missing chat relation to space

## Space SDK v0.0.2

- Changed structure
- Added `Automation` in `Project`
- Added `Chats`
- Added `Channels` in `Chats`
- Added `Messages` in `Chats`

## Space SDK v0.0.1

- Initiate