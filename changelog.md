# Space SDK Changelog

## Space SDK v0.1.0 [BREAKING]

- Added class `Chats/Channels/Administrator`
- Added class `Chats/Channels/Description`
- Added method `deleteMessage` in `Messages`
- Added method `editMessage` in `Messages`
- Added method `sendMessage` in `Messages`
- Added method `getChannelMessages` in `Messages`
- Added method `pinMessages` in `Messages`
- Added method `unpinMessages` in `Messages`
- Added class `Chats/Messages/PinnedMessages`
- Added class `Chats/Channels/Subscribers/Users`
- Added class `Chats/Channels/Subscribers/Teams`
- Added class `Chats/Channels/Name`
- Added class `Chats/Channels/Icon`
- Added class `Chats/Channels/Conversations`
- Added class `Chats/Channels/Conversations/Subject`
- Added class `Chats/Channels/Attachments`
- Added class `Chats/Channels/Attachments/Files`
- Added class `Chats/Channels/Attachments/Images`
- Added class `Chats/Channels/Attachments/Links`
- Added class `Chats/Channels/Attachments/Videos`
- Added class `Calls`
- Added class `Checklists`
- Added class `Checklists/Items`
- Added class `ExternalLinkPatterns`
- Added class `HttpApiModel`
- Added class `ToDoItems`
- Added class `Blog`
- Added class `Permissions`
- Added class `RichText`
- Added class `Reactions`
- Added class `Emojis`
- **[BREAKING]** Renamed method and class `GraphExecution` to `GraphExecutions`
- **[BREAKING]** Renamed method and class `Job` to `Jobs`
- **[BREAKING]** Renamed method and class `Repository` to `Repositories`

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