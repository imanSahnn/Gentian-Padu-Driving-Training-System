<?php
/**
 * AccessLevel
 *
 * PHP version 7.4
 *
 * @category Class
 * @package  ElasticEmail
 * @author   OpenAPI Generator team
 * @link     https://openapi-generator.tech
 */

/**
 * Elastic Email REST API
 *
 * This API is based on the REST API architecture, allowing the user to easily manage their data with this resource-based approach.    Every API call is established on which specific request type (GET, POST, PUT, DELETE) will be used.    The API has a limit of 20 concurrent connections and a hard timeout of 600 seconds per request.    To start using this API, you will need your Access Token (available <a target=\"_blank\" href=\"https://app.elasticemail.com/marketing/settings/new/manage-api\">here</a>). Remember to keep it safe. Required access levels are listed in the given request’s description.    Downloadable library clients can be found in our Github repository <a target=\"_blank\" href=\"https://github.com/ElasticEmail?tab=repositories&q=%22rest+api%22+in%3Areadme\">here</a>
 *
 * The version of the OpenAPI document: 4.0.0
 * Contact: support@elasticemail.com
 * Generated by: https://openapi-generator.tech
 * OpenAPI Generator version: 6.3.0
 */

/**
 * NOTE: This class is auto generated by OpenAPI Generator (https://openapi-generator.tech).
 * https://openapi-generator.tech
 * Do not edit the class manually.
 */

namespace ElasticEmail\Model;
use \ElasticEmail\ObjectSerializer;

/**
 * AccessLevel Class Doc Comment
 *
 * @category Class
 * @package  ElasticEmail
 * @author   OpenAPI Generator team
 * @link     https://openapi-generator.tech
 */
class AccessLevel
{
    /**
     * Possible values of this enum
     */
    public const NONE = 'None';

    public const VIEW_ACCOUNT = 'ViewAccount';

    public const VIEW_CONTACTS = 'ViewContacts';

    public const VIEW_FORMS = 'ViewForms';

    public const VIEW_TEMPLATES = 'ViewTemplates';

    public const VIEW_CAMPAIGNS = 'ViewCampaigns';

    public const VIEW_CHANNELS = 'ViewChannels';

    public const VIEW_AUTOMATIONS = 'ViewAutomations';

    public const VIEW_SURVEYS = 'ViewSurveys';

    public const VIEW_SETTINGS = 'ViewSettings';

    public const VIEW_BILLING = 'ViewBilling';

    public const VIEW_SUB_ACCOUNTS = 'ViewSubAccounts';

    public const VIEW_USERS = 'ViewUsers';

    public const VIEW_FILES = 'ViewFiles';

    public const VIEW_REPORTS = 'ViewReports';

    public const MODIFY_ACCOUNT = 'ModifyAccount';

    public const MODIFY_CONTACTS = 'ModifyContacts';

    public const MODIFY_FORMS = 'ModifyForms';

    public const MODIFY_TEMPLATES = 'ModifyTemplates';

    public const MODIFY_CAMPAIGNS = 'ModifyCampaigns';

    public const MODIFY_CHANNELS = 'ModifyChannels';

    public const MODIFY_AUTOMATIONS = 'ModifyAutomations';

    public const MODIFY_SURVEYS = 'ModifySurveys';

    public const MODIFY_FILES = 'ModifyFiles';

    public const EXPORT = 'Export';

    public const SEND_SMTP = 'SendSmtp';

    public const SEND_SMS = 'SendSMS';

    public const MODIFY_SETTINGS = 'ModifySettings';

    public const MODIFY_BILLING = 'ModifyBilling';

    public const MODIFY_PROFILE = 'ModifyProfile';

    public const MODIFY_SUB_ACCOUNTS = 'ModifySubAccounts';

    public const MODIFY_USERS = 'ModifyUsers';

    public const SECURITY = 'Security';

    public const MODIFY_LANGUAGE = 'ModifyLanguage';

    public const VIEW_SUPPORT = 'ViewSupport';

    public const SEND_HTTP = 'SendHttp';

    public const MODIFY2_FA_EMAIL = 'Modify2FAEmail';

    public const MODIFY_SUPPORT = 'ModifySupport';

    public const VIEW_CUSTOM_FIELDS = 'ViewCustomFields';

    public const MODIFY_CUSTOM_FIELDS = 'ModifyCustomFields';

    public const MODIFY_WEB_NOTIFICATIONS = 'ModifyWebNotifications';

    public const EXTENDED_LOGS = 'ExtendedLogs';

    public const VERIFY_EMAILS = 'VerifyEmails';

    public const MODIFY2_FA_SMS = 'Modify2FASms';

    public const DISABLE_CONTACTS_STORE = 'DisableContactsStore';

    public const MODIFY_LANDING_PAGES = 'ModifyLandingPages';

    public const VIEW_LANDING_PAGES = 'ViewLandingPages';

    public const MODIFY_SUPPRESSIONS = 'ModifySuppressions';

    public const VIEW_SUPPRESSIONS = 'ViewSuppressions';

    public const VIEW_DRAG_DROP_EDITOR = 'ViewDragDropEditor';

    public const VIEW_TEMPLATE_EDITOR = 'ViewTemplateEditor';

    /**
     * Gets allowable values of the enum
     * @return string[]
     */
    public static function getAllowableEnumValues()
    {
        return [
            self::NONE,
            self::VIEW_ACCOUNT,
            self::VIEW_CONTACTS,
            self::VIEW_FORMS,
            self::VIEW_TEMPLATES,
            self::VIEW_CAMPAIGNS,
            self::VIEW_CHANNELS,
            self::VIEW_AUTOMATIONS,
            self::VIEW_SURVEYS,
            self::VIEW_SETTINGS,
            self::VIEW_BILLING,
            self::VIEW_SUB_ACCOUNTS,
            self::VIEW_USERS,
            self::VIEW_FILES,
            self::VIEW_REPORTS,
            self::MODIFY_ACCOUNT,
            self::MODIFY_CONTACTS,
            self::MODIFY_FORMS,
            self::MODIFY_TEMPLATES,
            self::MODIFY_CAMPAIGNS,
            self::MODIFY_CHANNELS,
            self::MODIFY_AUTOMATIONS,
            self::MODIFY_SURVEYS,
            self::MODIFY_FILES,
            self::EXPORT,
            self::SEND_SMTP,
            self::SEND_SMS,
            self::MODIFY_SETTINGS,
            self::MODIFY_BILLING,
            self::MODIFY_PROFILE,
            self::MODIFY_SUB_ACCOUNTS,
            self::MODIFY_USERS,
            self::SECURITY,
            self::MODIFY_LANGUAGE,
            self::VIEW_SUPPORT,
            self::SEND_HTTP,
            self::MODIFY2_FA_EMAIL,
            self::MODIFY_SUPPORT,
            self::VIEW_CUSTOM_FIELDS,
            self::MODIFY_CUSTOM_FIELDS,
            self::MODIFY_WEB_NOTIFICATIONS,
            self::EXTENDED_LOGS,
            self::VERIFY_EMAILS,
            self::MODIFY2_FA_SMS,
            self::DISABLE_CONTACTS_STORE,
            self::MODIFY_LANDING_PAGES,
            self::VIEW_LANDING_PAGES,
            self::MODIFY_SUPPRESSIONS,
            self::VIEW_SUPPRESSIONS,
            self::VIEW_DRAG_DROP_EDITOR,
            self::VIEW_TEMPLATE_EDITOR
        ];
    }
}


