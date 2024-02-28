# Space SDK Changelog

## Space SDK 15.0.0

- Removed method `calls` from `Swe\SpaceSDK\Space`
- Added method `rd` in `Swe\SpaceSDK\Space`
- Removed method `widgetSettings` from `Swe\SpaceSDK\TeamDirectory\Profiles`
- Removed method `dashboards` from `Swe\SpaceSDK\TeamDirectory\Profiles`
- Added method `grammarDictionary` in `Swe\SpaceSDK\TeamDirectory\Profiles`
- Added method `deleteForever` in `Swe\SpaceSDK\TeamDirectory\Profiles\Documents`
- Added class `Swe\SpaceSDK\TeamDirectory\Profiles\Documents\DeleteForever`
  - Added method `deleteDocumentForever` in `DeleteForever`
- Removed method `starred` from `Swe\SpaceSDK\TeamDirectory\Profiles\Checklists`
- Removed method `getAllChecklists` from `Swe\SpaceSDK\TeamDirectory\Profiles\Checklists`
- Added method `me` in `Swe\SpaceSDK\TeamDirectory\Profiles\OauthConsents`
- Added class `Swe\SpaceSDK\TeamDirectory\Profiles\OauthConsents\Me`
  - Added method `refreshTokens` in `Me`
- Added class `Swe\SpaceSDK\TeamDirectory\Profiles\OauthConsents\Me\RefreshTokens`
  - Added method `classSelf` in `RefreshTokens`
- Added class `Swe\SpaceSDK\TeamDirectory\Profiles\OauthConsents\Me\RefreshTokens\ClassSelf`
  - Added method `deleteSelf` in `ClassSelf`
- Added class `Swe\SpaceSDK\TeamDirectory\Profiles\GrammarDictionary`
  - Added method `remove` in `GrammarDictionary`
  - Added method `add` in `GrammarDictionary`
  - Added method `getThePersonalDictionaryEntries` in `GrammarDictionary`
- Added class `Swe\SpaceSDK\TeamDirectory\Profiles\GrammarDictionary\Remove`
  - Added method `removeTheEntryFromThePersonalDictionary` in `Remove`
- Added class `Swe\SpaceSDK\TeamDirectory\Profiles\GrammarDictionary\Add`
  - Added method `addTheEntryToThePersonalDictionary` in `Add`
- Added class `Swe\SpaceSDK\Rd`
  - Added method `getAvailableWarmupExecutions` in `Rd`
- Added method `branches` in `Swe\SpaceSDK\Projects\Planning\Issues`
- Added class `Swe\SpaceSDK\Projects\Planning\Issues\Branches`
  - Added method `removeBranchLinks` in `Branches`
  - Added method `addBranchLinks` in `Branches`
- Added method `deleteForever` in `Swe\SpaceSDK\Projects\Documents`
- Added class `Swe\SpaceSDK\Projects\Documents\DeleteForever`
  - Added method `deleteDocumentForever` in `DeleteForever`
- Added method `sarif` in `Swe\SpaceSDK\Projects\CodeReviews`
- Added method `waitAuthorReply` in `Swe\SpaceSDK\Projects\CodeReviews`
- Added method `resumeReview` in `Swe\SpaceSDK\Projects\CodeReviews`
- Added method `changeAuthorState` in `Swe\SpaceSDK\Projects\CodeReviews`
- Added method `acceptChanges` in `Swe\SpaceSDK\Projects\CodeReviews`
- Added class `Swe\SpaceSDK\Projects\CodeReviews\Sarif`
  - Added method `uploadSarifReport` in `Sarif`
- Added method `getFileTextContent` in `Swe\SpaceSDK\Projects\Repositories`
- Added method `parseHeadPrefix` in `Swe\SpaceSDK\Projects\Repositories`
- Added method `getAdditionalRepositoryInfo` in `Swe\SpaceSDK\Projects\Repositories`
- Added method `secrets` in `Swe\SpaceSDK\Projects\Automation\StepExecutions`
- Added class `Swe\SpaceSDK\Projects\Automation\StepExecutions\Secrets`
  - Added method `setReference` in `Secrets`
- Added class `Swe\SpaceSDK\Projects\Automation\StepExecutions\Secrets\SetReference`
  - Added method `update` in `SetReference`

## Space SDK 8.0.0

- Added method `issues` in `Swe\SpaceSDK\Space`
- Added method `favorites` in `Swe\SpaceSDK\TeamDirectory\Profiles`
- Added class `Swe\SpaceSDK\TeamDirectory\Profiles\Favorites`
  - Added method `removeFavorite` in `Favorites`
  - Added method `getFavoriteTeams` in `Favorites`
  - Added method `getFavoriteRepositories` in `Favorites`
  - Added method `getFavoriteProjects` in `Favorites`
  - Added method `getFollowedProfiles` in `Favorites`
  - Added method `getFavoriteLocations` in `Favorites`
  - Added method `getFavoriteJobs` in `Favorites`
  - Added method `getFavoriteDocuments` in `Favorites`
  - Added method `getFavoriteDeploymentTargets` in `Favorites`
  - Added method `addFavorite` in `Favorites`
- Removed method `topics` from `Swe\SpaceSDK\Projects`
- Added method `attachment` in `Swe\SpaceSDK\Projects\Planning\Issues`
- Added class `Swe\SpaceSDK\Projects\Planning\Issues\Attachment`
  - Added method `removeAttachment` in `Attachment`
  - Added method `addAttachment` in `Attachment`
- Removed method `mergeDiff` from `Swe\SpaceSDK\Projects\Repositories`
- Added method `getInlineMergeDiff` in `Swe\SpaceSDK\Projects\Repositories`
- Removed method `deleteParameter` from `Swe\SpaceSDK\Projects\Automation\StepExecutions\Parameters`
- Added class `Swe\SpaceSDK\Issues`
  - Added method `getIssue` in `Issues`
  - Added method `getIssuesByIdentifiers` in `Issues`
- Added method `parameters` in `Swe\SpaceSDK\Applications`
- Added class `Swe\SpaceSDK\Applications\Parameters`
  - Added method `profile` in `Parameters`
  - Added method `removeParameter` in `Parameters`
  - Added method `setParameter` in `Parameters`
  - Added method `getParameter` in `Parameters`
  - Added method `getAllParameters` in `Parameters`
- Added class `Swe\SpaceSDK\Applications\Parameters\Profile`
  - Added method `removeProfileParameter` in `Profile`
  - Added method `setProfileParameter` in `Profile`
  - Added method `getProfileParameter` in `Profile`
  - Added method `getAllProfileParameters` in `Profile`

## Space SDK 6.2.0

- Added method `mergePreviewStatus` in `Swe\SpaceSDK\Projects\Repositories`
- Added method `mergePreview` in `Swe\SpaceSDK\Projects\Repositories`
- Added method `gpgKeys` in `Swe\SpaceSDK\Applications`
- Added method `reportApplicationAsHealthy` in `Swe\SpaceSDK\Applications`
- Added method `setErrorMessage` in `Swe\SpaceSDK\Applications`
- Added class `Swe\SpaceSDK\Applications\GpgKeys`
  - Added method `deleteGpgKey` in `GpgKeys`
  - Added method `revokeGpgKey` in `GpgKeys`
  - Added method `getGpgKeys` in `GpgKeys`
  - Added method `addGpgKey` in `GpgKeys`

## Space SDK 6.1.0

- Added class `Swe\SpaceSDK\Projects\Repositories\MergeDiff`
  - Added method `getInlineDiff` in `MergeDiff`
- Added method `mergeDiff` in `Swe\SpaceSDK\Projects\Repositories`
- Added method `auditLog` in `Swe\SpaceSDK\Projects\Automation\DeploymentTargets`
- Added class `Swe\SpaceSDK\Projects\Automation\DeploymentTargets\AuditLog`
  - Added method `auditLog` in `AuditLog`

## Space SDK 6.0.0

- Added method `externalIssues` in `Swe\SpaceSDK\Space`
- Added method `getSyncBatch` in `Swe\SpaceSDK\TeamDirectory\Teams`
- Removed method `deleteForever` from `Swe\SpaceSDK\TeamDirectory\Profiles\Documents`
- Added method `search` in `Swe\SpaceSDK\TeamDirectory\Profiles\Documents\Folders`
- Added class `Swe\SpaceSDK\TeamDirectory\Profiles\Documents\Folders\Search`
  - Added method `searchDocumentsAndFolders` in `Search`
- Added method `getSyncBatch` in `Swe\SpaceSDK\TeamDirectory\Memberships`
- Added method `personalFeaturePins` in `Swe\SpaceSDK\Projects`
- Added method `people` in `Swe\SpaceSDK\Projects`
- Added method `featurePins` in `Swe\SpaceSDK\Projects`
- Added method `getSyncBatch` in `Swe\SpaceSDK\Projects\Planning\Issues`
- Added class `Swe\SpaceSDK\Projects\PersonalFeaturePins`
  - Added method `updatePersonalFeaturePin` in `PersonalFeaturePins`
- Added class `Swe\SpaceSDK\Projects\People`
  - Added method `teams` in `People`
  - Added method `members` in `People`
- Added class `Swe\SpaceSDK\Projects\People\Teams`
  - Added method `removeParticipant` in `Teams`
  - Added method `getParticipantsByTeams` in `Teams`
  - Added method `getAllParticipants` in `Teams`
  - Added method `updateParticipantRoles` in `Teams`
- Added class `Swe\SpaceSDK\Projects\People\Members`
  - Added method `removeParticipant` in `Members`
  - Added method `getParticipantsByProfiles` in `Members`
  - Added method `getAllParticipants` in `Members`
  - Added method `updateParticipantRoles` in `Members`
- Added method `access` in `Swe\SpaceSDK\Projects\Packages\Repositories`
- Added class `Swe\SpaceSDK\Projects\Packages\Repositories\Access`
  - Added method `updateRepositoryOwnAccess` in `Access`
  - Added method `getRepositoryOwnAccess` in `Access`
- Added class `Swe\SpaceSDK\Projects\FeaturePins`
  - Added method `updateFeaturePin` in `FeaturePins`
- Removed method `deleteForever` from `Swe\SpaceSDK\Projects\Documents`
- Added method `search` in `Swe\SpaceSDK\Projects\Documents\Folders`
- Added class `Swe\SpaceSDK\Projects\Documents\Folders\Search`
  - Added method `searchDocumentsAndFolders` in `Search`
- Added method `makeReviewReadOnly` in `Swe\SpaceSDK\Projects\CodeReviews`
- Removed method `addTeam` from `Swe\SpaceSDK\Projects\Access\Members\Teams`
- Removed method `secrets` from `Swe\SpaceSDK\Projects\Automation\StepExecutions`
- Added class `Swe\SpaceSDK\ExternalIssues`
  - Added method `issues` in `ExternalIssues`
  - Added method `externalTrackerProjects` in `ExternalIssues`
  - Added method `getExternalIssueEventQueueItems` in `ExternalIssues`
  - Added method `markExternalIssuesAsDeleted` in `ExternalIssues`
  - Added method `provideAllPossibleStatusesForExternalIssues` in `ExternalIssues`
  - Added method `postExternalIssueData` in `ExternalIssues`
  - Added method `setDefaultTargetIssueStatusForMergeRequestMerge` in `ExternalIssues`
- Added class `Swe\SpaceSDK\ExternalIssues\Issues`
  - Added method `commits` in `Issues`
  - Added method `codeReviews` in `Issues`
- Added class `Swe\SpaceSDK\ExternalIssues\Issues\Commits`
  - Added method `unlinkCommitsFromExternalIssue` in `Commits`
  - Added method `linkCommitsToExternalIssue` in `Commits`
- Added class `Swe\SpaceSDK\ExternalIssues\Issues\CodeReviews`
  - Added method `unlinkCodeReviewsFromExternalIssue` in `CodeReviews`
  - Added method `linkCodeReviewsToExternalIssue` in `CodeReviews`
- Added class `Swe\SpaceSDK\ExternalIssues\ExternalTrackerProjects`
  - Added method `disconnectExternalIssueTrackerProject` in `ExternalTrackerProjects`
  - Added method `getAllConnectedExternalIssueTrackerProjects` in `ExternalTrackerProjects`
  - Added method `connectExternalIssueTrackerProjects` in `ExternalTrackerProjects`
- Added method `getSyncBatch` in `Swe\SpaceSDK\Emojis`
- Added method `syncBatch` in `Swe\SpaceSDK\Chats\Messages`
- Added class `Swe\SpaceSDK\Chats\Messages\SyncBatch`
  - Added method `currentEtag` in `SyncBatch`
  - Added method `getSyncBatch` in `SyncBatch`
- Added class `Swe\SpaceSDK\Chats\Messages\SyncBatch\CurrentEtag`
  - Added method `getCurrentSyncEtag` in `CurrentEtag`

## Space SDK 3.5.0

- Added method `getHeads` in `Swe\SpaceSDK\Projects\Repositories`

## Space SDK 3.4.0

- Added method `search` in `Swe\SpaceSDK\Projects\Automation\DeploymentTargets`

## Space SDK 3.3.0

- Added method `safeMerge` in `Swe\SpaceSDK\Projects\CodeReviews`
- Added class `Swe\SpaceSDK\Projects\CodeReviews\SafeMerge`
  - Added method `stopSafeMerge` in `SafeMerge`
  - Added method `getSafeMerge` in `SafeMerge`
  - Added method `startSafeMerge` in `SafeMerge`
- Added method `changes` in `Swe\SpaceSDK\Projects\Repositories`

## Space SDK 3.2.0

- Added method `widgetSettings` in `Swe\SpaceSDK\TeamDirectory\Profiles`
- Added method `access` in `Swe\SpaceSDK\TeamDirectory\Profiles\Documents`
- Added class `Swe\SpaceSDK\TeamDirectory\Profiles\Documents\Access`
  - Added method `updateDocumentAccessPermissions` in `Access`
  - Added method `documentOwnAccessPermissions` in `Access`
- Added method `access` in `Swe\SpaceSDK\TeamDirectory\Profiles\Documents\Folders`
- Added class `Swe\SpaceSDK\TeamDirectory\Profiles\Documents\Folders\Access`
  - Added method `updateFolderAccessPermissions` in `Access`
  - Added method `folderOwnAccessPermissions` in `Access`
- Added class `Swe\SpaceSDK\TeamDirectory\Profiles\WidgetSettings`
  - Added method `updateWidgetSetting` in `WidgetSettings`
  - Added method `getWidgetSetting` in `WidgetSettings`
- Added method `fields` in `Swe\SpaceSDK\Projects\Planning\Issues`
- Added class `Swe\SpaceSDK\Projects\Planning\Issues\Fields`
  - Added method `visibility` in `Fields`
  - Added method `order` in `Fields`
- Added class `Swe\SpaceSDK\Projects\Planning\Issues\Fields\Visibility`
  - Added method `updateIssueFieldVisibility` in `Visibility`
  - Added method `getIssueFieldVisibility` in `Visibility`
- Added class `Swe\SpaceSDK\Projects\Planning\Issues\Fields\Order`
  - Added method `setIssueFieldOrder` in `Order`
  - Added method `getIssueFieldOrder` in `Order`
- Added method `access` in `Swe\SpaceSDK\Projects\Documents`
- Added class `Swe\SpaceSDK\Projects\Documents\Access`
  - Added method `updateDocumentAccessPermissions` in `Access`
  - Added method `documentOwnAccessPermissions` in `Access`
- Added method `access` in `Swe\SpaceSDK\Projects\Documents\Folders`
- Added class `Swe\SpaceSDK\Projects\Documents\Folders\Access`
  - Added method `updateFolderAccessPermissions` in `Access`
  - Added method `folderOwnAccessPermissions` in `Access`
- Added method `unboundDiscussions` in `Swe\SpaceSDK\Projects\CodeReviews`
- Added class `Swe\SpaceSDK\Projects\CodeReviews\UnboundDiscussions`
  - Added method `toggleUnboundDiscussionResolution` in `UnboundDiscussions`
  - Added method `getAllUnboundDiscussions` in `UnboundDiscussions`
  - Added method `createUnboundDiscussion` in `UnboundDiscussions`
- Added method `getAllDeploymentTargets` in `Swe\SpaceSDK\Projects\Automation\DeploymentTargets`

## Space SDK v3.0.1

- Added class `Swe\SpaceSDK\Projects\Repositories\DefaultBranch`
  - Added method `getRepositoryDefaultBranch` in `DefaultBranch`
  - Added method `setRepositoryDefaultBranch` in `DefaultBranch`
- Added method `defaultBranch` in `Swe\SpaceSDK\Projects\Repositories`
- Added method `getRepositoryInfo` in `Swe\SpaceSDK\Projects\Repositories`
- Added method `setRepositoryDescription` in `Swe\SpaceSDK\Projects\Repositories`
- Added method `secrets` in `Swe\SpaceSDK\Projects\Automation\StepExecutions`
- Added class `Swe\SpaceSDK\Projects\Automation\StepExecutions\Secrets`
  - Added method `setReference` in `Secrets`
- Added class `Swe\SpaceSDK\Projects\Automation\StepExecutions\Secrets\SetReference`
  - Added method `update` in `SetReference`
- Added method `getFeatures` in `Swe\SpaceSDK\BillingAdmin`

## Space SDK v3.0.1

- Fixed changelog.md

## Space SDK v3.0.0

- Removed method `migrate` from `Swe\SpaceSDK\Projects\Repositories`
- Added method `migrateRepository` in `Swe\SpaceSDK\Projects\Repositories`
- Added method `setHead` in `Swe\SpaceSDK\Projects\Repositories`

## Space SDK v2.2.0

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