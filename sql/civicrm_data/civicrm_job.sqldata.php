<?php
// CRM-8358
return CRM_Core_CodeGen_SqlData::create('civicrm_job')
  ->addDefaults([
    'domain_id' => new CRM_Utils_SQL_Literal('@domainID'),
    'last_run' => NULL,
  ])
  ->addValues([
    [
      'run_frequency' => 'Daily',
      'name' => 'CiviCRM Update Check',
      'description' => 'Checks for CiviCRM version updates. Important for keeping the database secure. Also sends anonymous usage statistics to civicrm.org to to assist in prioritizing ongoing development efforts.',
      // FIXME: "to to"
      'api_entity' => 'job',
      'api_action' => 'version_check',
      'parameters' => NULL,
      'is_active' => 1,
    ],
    [
      'run_frequency' => 'Always',
      'name' => 'Send Scheduled Mailings',
      'description' => 'Sends out scheduled CiviMail mailings',
      'api_entity' => 'job',
      'api_action' => 'process_mailing',
      'parameters' => NULL,
      'is_active' => 0,
    ],
    [
      'run_frequency' => 'Hourly',
      'name' => 'Fetch Bounces',
      'description' => 'Fetches bounces from mailings and writes them to mailing statistics',
      'api_entity' => 'job',
      'api_action' => 'fetch_bounces',
      'parameters' => NULL,
      'is_active' => 0,
    ],
    [
      'run_frequency' => 'Hourly',
      'name' => 'Process Inbound Emails',
      'description' => 'Inserts activity for a contact or a case by retrieving inbound emails from a mail directory',
      'api_entity' => 'job',
      'api_action' => 'fetch_activities',
      'parameters' => NULL,
      'is_active' => 0,
    ],
    [
      'run_frequency' => 'Daily',
      'name' => 'Process Pledges',
      'description' => 'Updates pledge records and sends out reminders',
      'api_entity' => 'job',
      'api_action' => 'process_pledge',
      'parameters' => 'send_reminders=[1 or 0] optional- 1 to send payment reminders',
      'is_active' => 0,
    ],
    [
      'run_frequency' => 'Daily',
      'name' => 'Geocode and Parse Addresses',
      'description' => 'Retrieves geocodes (lat and long) and / or parses street addresses (populates street number, street name, etc.)',
      'api_entity' => 'job',
      'api_action' => 'geocode',
      'parameters' => 'geocoding=[1 or 0] required
parse=[1 or 0] required
start=[contact ID] optional-begin with this contact ID
end=[contact ID] optional-process contacts with IDs less than this
throttle=[1 or 0] optional-1 adds five second sleep',
      'is_active' => 0,
    ],
    [
      'run_frequency' => 'Daily',
      'name' => 'Update Greetings and Addressees',
      'description' => 'Goes through contact records and updates email and postal greetings, or addressee value',
      'api_entity' => 'job',
      'api_action' => 'update_greeting',
      'parameters' => 'ct=[Individual or Household or Organization] required
gt=[email_greeting or postal_greeting or addressee] required
force=[0 or 1] optional-0 update contacts with null value, 1 update all
limit=Number optional-Limit the number of contacts to update',
      'is_active' => 0,
    ],
    [
      'run_frequency' => 'Daily',
      'name' => 'Mail Reports',
      'description' => 'Generates and sends out reports via email',
      'api_entity' => 'job',
      'api_action' => 'mail_report',
      'parameters' => 'instanceId=[ID of report instance] required
format=[csv or print] optional-output CSV or print-friendly HTML, else PDF',
      'is_active' => 0,
    ],
    [
      'run_frequency' => 'Hourly',
      'name' => 'Send Scheduled Reminders',
      'description' => 'Sends out scheduled reminders via email',
      'api_entity' => 'job',
      'api_action' => 'send_reminder',
      'parameters' => NULL,
      'is_active' => 0,
    ],
    [
      'run_frequency' => 'Always',
      'name' => 'Update Participant Statuses',
      'description' => 'Updates pending event participant statuses based on time',
      'api_entity' => 'job',
      'api_action' => 'process_participant',
      'parameters' => NULL,
      'is_active' => 0,
    ],
    [
      'run_frequency' => 'Daily',
      'name' => 'Update Membership Statuses',
      'description' => 'Updates membership statuses. WARNING: Membership renewal reminders have been migrated to the Schedule Reminders functionality, which supports multiple renewal reminders.',
      'api_entity' => 'job',
      'api_action' => 'process_membership',
      'parameters' => NULL,
      'is_active' => 0,
    ],
    [
      'run_frequency' => 'Always',
      'name' => 'Process Survey Respondents',
      'description' => 'Releases reserved survey respondents when they have been reserved for longer than the Release Frequency days specified for that survey.',
      'api_entity' => 'job',
      'api_action' => 'process_respondent',
      'parameters' => NULL,
      'is_active' => 0,
    ],
    [
      'run_frequency' => 'Hourly',
      'name' => 'Clean-up Temporary Data and Files',
      'description' => 'Removes temporary data and files, and clears old data from cache tables. Recommend running this job every hour to help prevent database and file system bloat.',
      'api_entity' => 'job',
      'api_action' => 'cleanup',
      'parameters' => NULL,
      'is_active' => 0,
    ],
    [
      'run_frequency' => 'Always',
      'name' => 'Send Scheduled SMS',
      'description' => 'Sends out scheduled SMS',
      'api_entity' => 'job',
      'api_action' => 'process_sms',
      'parameters' => NULL,
      'is_active' => 0,
    ],
    [
      'run_frequency' => 'Always',
      'name' => 'Rebuild Smart Group Cache',
      'description' => 'Rebuilds the smart group cache.',
      'api_entity' => 'job',
      'api_action' => 'group_rebuild',
      'parameters' => 'limit=Number optional-Limit the number of smart groups rebuild',
      'is_active' => 0,
    ],
    [
      'run_frequency' => 'Daily',
      'name' => 'Disable expired relationships',
      'description' => 'Disables relationships that have expired (ie. those relationships whose end date is in the past).',
      'api_entity' => 'job',
      'api_action' => 'disable_expired_relationships',
      'parameters' => NULL,
      'is_active' => 0,
    ],
    [
      'run_frequency' => 'Daily',
      'name' => 'Validate Email Address from Mailings.',
      'description' => 'Updates the reset_date on an email address to indicate that there was a valid delivery to this email address.',
      'api_entity' => 'mailing',
      'api_action' => 'update_email_resetdate',
      'parameters' => 'minDays, maxDays=Consider mailings that have completed between minDays and maxDays',
      'is_active' => 0,
    ],
  ]);
