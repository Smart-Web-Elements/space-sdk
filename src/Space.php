<?php

namespace Swe\SpaceSDK;

/**
 * Generated 2022-10-31 12:44
 *
 * Class Space
 *
 * @package Swe\SpaceSDK
 * @author Luca Braun <l.braun@s-w-e.com>
 */
final class Space extends AbstractApi
{
    /**
     * @return Absences
     */
    final public function absences(): Absences
    {
        return new Absences($this->client);
    }

    /**
     * @return Administration
     */
    final public function administration(): Administration
    {
        return new Administration($this->client);
    }

    /**
     * @return Applications
     */
    final public function applications(): Applications
    {
        return new Applications($this->client);
    }

    /**
     * @return AuthModules
     */
    final public function authModules(): AuthModules
    {
        return new AuthModules($this->client);
    }

    /**
     * @return BillingAdmin
     */
    final public function billingAdmin(): BillingAdmin
    {
        return new BillingAdmin($this->client);
    }

    /**
     * @return Blog
     */
    final public function blog(): Blog
    {
        return new Blog($this->client);
    }

    /**
     * @return Calendars
     */
    final public function calendars(): Calendars
    {
        return new Calendars($this->client);
    }

    /**
     * @return Calls
     */
    final public function calls(): Calls
    {
        return new Calls($this->client);
    }

    /**
     * @return Chats
     */
    final public function chats(): Chats
    {
        return new Chats($this->client);
    }

    /**
     * @return Checklists
     */
    final public function checklists(): Checklists
    {
        return new Checklists($this->client);
    }

    /**
     * @return CustomFields
     */
    final public function customFields(): CustomFields
    {
        return new CustomFields($this->client);
    }

    /**
     * @return Emojis
     */
    final public function emojis(): Emojis
    {
        return new Emojis($this->client);
    }

    /**
     * @return ExternalLinkPatterns
     */
    final public function externalLinkPatterns(): ExternalLinkPatterns
    {
        return new ExternalLinkPatterns($this->client);
    }

    /**
     * @return HttpApiModel
     */
    final public function httpApiModel(): HttpApiModel
    {
        return new HttpApiModel($this->client);
    }

    /**
     * @return Notifications
     */
    final public function notifications(): Notifications
    {
        return new Notifications($this->client);
    }

    /**
     * @return Organization
     */
    final public function organization(): Organization
    {
        return new Organization($this->client);
    }

    /**
     * @return PermissionRoles
     */
    final public function permissionRoles(): PermissionRoles
    {
        return new PermissionRoles($this->client);
    }

    /**
     * @return Permissions
     */
    final public function permissions(): Permissions
    {
        return new Permissions($this->client);
    }

    /**
     * @return Projects
     */
    final public function projects(): Projects
    {
        return new Projects($this->client);
    }

    /**
     * @return PublicHolidays
     */
    final public function publicHolidays(): PublicHolidays
    {
        return new PublicHolidays($this->client);
    }

    /**
     * @return Reactions
     */
    final public function reactions(): Reactions
    {
        return new Reactions($this->client);
    }

    /**
     * @return RichText
     */
    final public function richText(): RichText
    {
        return new RichText($this->client);
    }

    /**
     * @return TeamDirectory
     */
    final public function teamDirectory(): TeamDirectory
    {
        return new TeamDirectory($this->client);
    }

    /**
     * @return TimeTracking
     */
    final public function timeTracking(): TimeTracking
    {
        return new TimeTracking($this->client);
    }

    /**
     * @return ToDoItems
     */
    final public function toDoItems(): ToDoItems
    {
        return new ToDoItems($this->client);
    }

    /**
     * @return TrustedCertificates
     */
    final public function trustedCertificates(): TrustedCertificates
    {
        return new TrustedCertificates($this->client);
    }

    /**
     * @return Unfurls
     */
    final public function unfurls(): Unfurls
    {
        return new Unfurls($this->client);
    }

    /**
     * @return Uploads
     */
    final public function uploads(): Uploads
    {
        return new Uploads($this->client);
    }
}
