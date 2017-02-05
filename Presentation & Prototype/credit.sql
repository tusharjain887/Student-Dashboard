-- phpMyAdmin SQL Dump
-- version 3.4.5
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Mar 02, 2013 at 07:39 PM
-- Server version: 5.5.16
-- PHP Version: 5.3.8

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `credit`
--

-- --------------------------------------------------------

--
-- Table structure for table `acal_appointments`
--

CREATE TABLE IF NOT EXISTS `acal_appointments` (
  `id_appointment` int(11) NOT NULL AUTO_INCREMENT,
  `id_event` int(11) NOT NULL DEFAULT '0',
  `id_user` int(11) NOT NULL DEFAULT '0',
  `email` varchar(255) DEFAULT NULL,
  `access_type` tinyint(4) NOT NULL DEFAULT '0',
  `status` tinyint(4) NOT NULL DEFAULT '0',
  `hash` varchar(32) DEFAULT NULL,
  PRIMARY KEY (`id_appointment`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `acal_awm_fnbl_runs`
--

CREATE TABLE IF NOT EXISTS `acal_awm_fnbl_runs` (
  `id_run` int(11) NOT NULL AUTO_INCREMENT,
  `run_date` datetime DEFAULT NULL,
  PRIMARY KEY (`id_run`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `acal_calendars`
--

CREATE TABLE IF NOT EXISTS `acal_calendars` (
  `calendar_id` int(11) NOT NULL AUTO_INCREMENT,
  `calendar_str_id` varchar(255) DEFAULT NULL,
  `user_id` int(11) NOT NULL DEFAULT '0',
  `calendar_name` varchar(100) NOT NULL DEFAULT '',
  `calendar_description` text,
  `calendar_color` int(11) NOT NULL DEFAULT '0',
  `calendar_active` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`calendar_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `acal_cron_runs`
--

CREATE TABLE IF NOT EXISTS `acal_cron_runs` (
  `id_run` bigint(20) NOT NULL AUTO_INCREMENT,
  `run_date` datetime DEFAULT NULL,
  `latest_date` datetime DEFAULT NULL,
  PRIMARY KEY (`id_run`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `acal_eventrepeats`
--

CREATE TABLE IF NOT EXISTS `acal_eventrepeats` (
  `id_repeat` int(11) NOT NULL AUTO_INCREMENT,
  `id_event` int(11) DEFAULT NULL,
  `repeat_period` tinyint(1) NOT NULL DEFAULT '0',
  `repeat_order` tinyint(1) NOT NULL DEFAULT '1',
  `repeat_num` int(11) NOT NULL DEFAULT '0',
  `repeat_until` datetime DEFAULT NULL,
  `sun` tinyint(1) NOT NULL DEFAULT '0',
  `mon` tinyint(1) NOT NULL DEFAULT '0',
  `tue` tinyint(1) NOT NULL DEFAULT '0',
  `wed` tinyint(1) NOT NULL DEFAULT '0',
  `thu` tinyint(1) NOT NULL DEFAULT '0',
  `fri` tinyint(1) NOT NULL DEFAULT '0',
  `sat` tinyint(1) NOT NULL DEFAULT '0',
  `week_number` tinyint(1) DEFAULT NULL,
  `repeat_end` tinyint(1) NOT NULL DEFAULT '0',
  `excluded` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id_repeat`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `acal_events`
--

CREATE TABLE IF NOT EXISTS `acal_events` (
  `event_id` int(11) NOT NULL AUTO_INCREMENT,
  `event_str_id` varchar(255) DEFAULT NULL,
  `fnbl_pim_id` bigint(20) DEFAULT NULL,
  `calendar_id` int(11) DEFAULT NULL,
  `event_timefrom` datetime DEFAULT NULL,
  `event_timetill` datetime DEFAULT NULL,
  `event_allday` tinyint(1) NOT NULL DEFAULT '0',
  `event_name` varchar(100) NOT NULL DEFAULT '',
  `event_text` text,
  `event_priority` tinyint(4) DEFAULT NULL,
  `event_repeats` tinyint(1) NOT NULL DEFAULT '0',
  `event_last_modified` datetime DEFAULT NULL,
  `event_owner_email` varchar(255) NOT NULL DEFAULT '',
  `event_appointment_access` tinyint(4) NOT NULL DEFAULT '0',
  `event_deleted` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`event_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `acal_exclusions`
--

CREATE TABLE IF NOT EXISTS `acal_exclusions` (
  `id_exclusion` int(11) NOT NULL AUTO_INCREMENT,
  `id_event` int(11) DEFAULT NULL,
  `id_calendar` int(11) DEFAULT NULL,
  `id_repeat` int(11) DEFAULT NULL,
  `id_recurrence_date` datetime DEFAULT NULL,
  `event_timefrom` datetime DEFAULT NULL,
  `event_timetill` datetime DEFAULT NULL,
  `event_name` varchar(100) DEFAULT NULL,
  `event_text` text,
  `event_allday` tinyint(1) NOT NULL DEFAULT '0',
  `event_last_modified` datetime DEFAULT NULL,
  `is_deleted` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id_exclusion`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `acal_publications`
--

CREATE TABLE IF NOT EXISTS `acal_publications` (
  `id_publication` int(11) NOT NULL AUTO_INCREMENT,
  `id_user` int(11) DEFAULT NULL,
  `id_calendar` int(11) DEFAULT NULL,
  `str_md5` varchar(32) DEFAULT NULL,
  `int_access_level` tinyint(4) NOT NULL DEFAULT '1',
  `access_type` tinyint(4) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id_publication`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `acal_reminders`
--

CREATE TABLE IF NOT EXISTS `acal_reminders` (
  `id_reminder` int(11) NOT NULL AUTO_INCREMENT,
  `id_event` int(11) DEFAULT NULL,
  `id_user` int(11) DEFAULT NULL,
  `notice_type` tinyint(4) NOT NULL DEFAULT '0',
  `remind_offset` int(11) NOT NULL DEFAULT '0',
  `sent` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id_reminder`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `acal_sharing`
--

CREATE TABLE IF NOT EXISTS `acal_sharing` (
  `id_share` int(11) NOT NULL AUTO_INCREMENT,
  `id_user` int(11) DEFAULT NULL,
  `id_calendar` int(11) DEFAULT NULL,
  `id_to_user` int(11) DEFAULT NULL,
  `str_to_email` varchar(255) NOT NULL DEFAULT '',
  `int_access_level` tinyint(4) NOT NULL DEFAULT '2',
  `calendar_active` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id_share`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `acal_users_data`
--

CREATE TABLE IF NOT EXISTS `acal_users_data` (
  `settings_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL DEFAULT '0',
  `showweekends` tinyint(1) NOT NULL DEFAULT '0',
  `workdaystarts` tinyint(4) NOT NULL DEFAULT '9',
  `workdayends` tinyint(4) NOT NULL DEFAULT '17',
  `showworkday` tinyint(1) NOT NULL DEFAULT '0',
  `weekstartson` tinyint(4) NOT NULL DEFAULT '0',
  `defaulttab` tinyint(4) NOT NULL DEFAULT '2',
  PRIMARY KEY (`settings_id`),
  KEY `ACAL_USERS_DATA_USER_ID_INDEX` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `adav_addressbooks`
--

CREATE TABLE IF NOT EXISTS `adav_addressbooks` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `principaluri` varchar(255) DEFAULT NULL,
  `displayname` varchar(255) DEFAULT NULL,
  `uri` varchar(200) DEFAULT NULL,
  `description` text,
  `ctag` int(11) unsigned NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `adav_cache`
--

CREATE TABLE IF NOT EXISTS `adav_cache` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user` varchar(255) DEFAULT NULL,
  `calendaruri` varchar(255) DEFAULT NULL,
  `type` tinyint(4) DEFAULT NULL,
  `time` int(11) DEFAULT NULL,
  `starttime` int(11) DEFAULT NULL,
  `eventid` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `adav_calendarobjects`
--

CREATE TABLE IF NOT EXISTS `adav_calendarobjects` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `calendardata` text,
  `uri` varchar(255) DEFAULT NULL,
  `calendarid` int(11) unsigned NOT NULL,
  `lastmodified` int(11) DEFAULT NULL,
  `etag` varchar(32) NOT NULL DEFAULT '',
  `size` int(11) unsigned NOT NULL DEFAULT '0',
  `componenttype` varchar(8) NOT NULL DEFAULT '',
  `firstoccurence` int(11) unsigned NOT NULL DEFAULT '0',
  `lastoccurence` int(11) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `adav_calendars`
--

CREATE TABLE IF NOT EXISTS `adav_calendars` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `principaluri` varchar(100) DEFAULT NULL,
  `displayname` varchar(100) DEFAULT NULL,
  `uri` varchar(255) DEFAULT NULL,
  `ctag` int(11) unsigned NOT NULL DEFAULT '0',
  `description` text,
  `calendarorder` int(11) unsigned NOT NULL DEFAULT '0',
  `calendarcolor` varchar(10) DEFAULT NULL,
  `timezone` text,
  `components` varchar(20) DEFAULT NULL,
  `transparent` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `adav_cards`
--

CREATE TABLE IF NOT EXISTS `adav_cards` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `addressbookid` int(11) unsigned NOT NULL,
  `carddata` text,
  `uri` varchar(255) DEFAULT NULL,
  `lastmodified` int(11) unsigned DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `adav_delegates`
--

CREATE TABLE IF NOT EXISTS `adav_delegates` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `calendarid` int(11) unsigned NOT NULL,
  `principalid` int(11) unsigned NOT NULL,
  `mode` tinyint(2) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `adav_groupmembers`
--

CREATE TABLE IF NOT EXISTS `adav_groupmembers` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `principal_id` int(11) unsigned NOT NULL,
  `member_id` int(11) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `ADAV_GROUPMEMBERS_MEMBER_ID_PRINCIPAL_ID_INDEX` (`principal_id`,`member_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `adav_locks`
--

CREATE TABLE IF NOT EXISTS `adav_locks` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `owner` varchar(100) DEFAULT NULL,
  `timeout` int(11) unsigned DEFAULT NULL,
  `created` int(11) DEFAULT NULL,
  `token` varchar(100) DEFAULT NULL,
  `scope` tinyint(4) DEFAULT NULL,
  `depth` tinyint(4) DEFAULT NULL,
  `uri` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `adav_principals`
--

CREATE TABLE IF NOT EXISTS `adav_principals` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `uri` varchar(255) NOT NULL,
  `email` varchar(80) DEFAULT NULL,
  `vcardurl` varchar(80) DEFAULT NULL,
  `displayname` varchar(80) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `ADAV_PRINCIPALS_URI_INDEX` (`uri`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `adav_reminders`
--

CREATE TABLE IF NOT EXISTS `adav_reminders` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `user` varchar(100) NOT NULL,
  `calendaruri` varchar(255) DEFAULT NULL,
  `eventid` varchar(45) DEFAULT NULL,
  `time` int(11) DEFAULT NULL,
  `starttime` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE IF NOT EXISTS `admin` (
  `admin_id` varchar(10) NOT NULL,
  `password` varchar(50) NOT NULL,
  `name` varchar(65) NOT NULL,
  `email_id` varchar(50) NOT NULL,
  PRIMARY KEY (`admin_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_id`, `password`, `name`, `email_id`) VALUES
('admin', 'vjti123', 'Admin', 'tusharj887@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `awm_accounts`
--

CREATE TABLE IF NOT EXISTS `awm_accounts` (
  `id_acct` int(11) NOT NULL AUTO_INCREMENT,
  `id_user` int(11) NOT NULL DEFAULT '0',
  `id_domain` int(11) NOT NULL DEFAULT '0',
  `id_realm` int(11) NOT NULL DEFAULT '0',
  `def_acct` tinyint(1) NOT NULL DEFAULT '0',
  `deleted` tinyint(1) NOT NULL DEFAULT '0',
  `quota` int(11) unsigned NOT NULL DEFAULT '0',
  `email` varchar(255) NOT NULL DEFAULT '',
  `friendly_nm` varchar(255) DEFAULT NULL,
  `mail_protocol` tinyint(4) NOT NULL DEFAULT '1',
  `mail_inc_host` varchar(255) DEFAULT NULL,
  `mail_inc_port` int(11) NOT NULL DEFAULT '143',
  `mail_inc_login` varchar(255) DEFAULT NULL,
  `mail_inc_pass` varchar(255) DEFAULT NULL,
  `mail_inc_ssl` tinyint(1) NOT NULL DEFAULT '0',
  `mail_out_host` varchar(255) DEFAULT NULL,
  `mail_out_port` int(11) NOT NULL DEFAULT '25',
  `mail_out_login` varchar(255) DEFAULT NULL,
  `mail_out_pass` varchar(255) DEFAULT NULL,
  `mail_out_auth` tinyint(4) NOT NULL DEFAULT '0',
  `mail_out_ssl` tinyint(1) NOT NULL DEFAULT '0',
  `def_order` tinyint(4) NOT NULL DEFAULT '0',
  `getmail_at_login` tinyint(1) NOT NULL DEFAULT '0',
  `mail_mode` tinyint(4) NOT NULL DEFAULT '1',
  `mails_on_server_days` smallint(6) NOT NULL DEFAULT '7',
  `signature` text,
  `signature_type` tinyint(4) NOT NULL DEFAULT '1',
  `signature_opt` tinyint(4) NOT NULL DEFAULT '0',
  `delimiter` varchar(1) NOT NULL DEFAULT '/',
  `mailbox_size` bigint(20) NOT NULL DEFAULT '0',
  `mailing_list` tinyint(1) NOT NULL DEFAULT '0',
  `namespace` varchar(255) NOT NULL DEFAULT '',
  `custom_fields` text,
  PRIMARY KEY (`id_acct`),
  KEY `AWM_ACCOUNTS_ID_USER_INDEX` (`id_user`),
  KEY `AWM_ACCOUNTS_ID_ACCT_ID_USER_INDEX` (`id_acct`,`id_user`),
  KEY `AWM_ACCOUNTS_EMAIL_INDEX` (`email`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `awm_accounts`
--

INSERT INTO `awm_accounts` (`id_acct`, `id_user`, `id_domain`, `id_realm`, `def_acct`, `deleted`, `quota`, `email`, `friendly_nm`, `mail_protocol`, `mail_inc_host`, `mail_inc_port`, `mail_inc_login`, `mail_inc_pass`, `mail_inc_ssl`, `mail_out_host`, `mail_out_port`, `mail_out_login`, `mail_out_pass`, `mail_out_auth`, `mail_out_ssl`, `def_order`, `getmail_at_login`, `mail_mode`, `mails_on_server_days`, `signature`, `signature_type`, `signature_opt`, `delimiter`, `mailbox_size`, `mailing_list`, `namespace`, `custom_fields`) VALUES
(1, 1, 0, 0, 1, 0, 0, 'tushar@localhost', '', 1, '127.0.0.1', 143, 'tushar@localhost', '7401071c1506', 0, '127.0.0.1', 25, '', '', 2, 0, 0, 1, 3, 7, '', 1, 0, '/', 0, 0, '', ''),
(2, 2, 0, 0, 1, 0, 0, '10106@localhost', '', 1, '127.0.0.1', 143, '10106@localhost', '310302', 0, '127.0.0.1', 25, '', '', 2, 0, 0, 1, 3, 7, '', 1, 0, '/', 0, 0, '', ''),
(3, 3, 0, 0, 1, 0, 0, '101080009@localhost', '', 1, '127.0.0.1', 143, '101080009@localhost', '72131917011a', 0, '127.0.0.1', 25, '', '', 2, 0, 0, 1, 3, 7, '', 1, 0, '/', 0, 0, '', ''),
(4, 4, 0, 0, 1, 0, 0, '101080030@localhost', '', 1, '127.0.0.1', 143, '101080030@localhost', '7401071c1506', 0, '127.0.0.1', 25, '', '', 2, 0, 0, 1, 3, 7, '', 1, 0, '/', 0, 0, '', '');

-- --------------------------------------------------------

--
-- Table structure for table `awm_addr_book`
--

CREATE TABLE IF NOT EXISTS `awm_addr_book` (
  `id_addr` bigint(20) NOT NULL AUTO_INCREMENT,
  `id_user` int(11) NOT NULL DEFAULT '0',
  `str_id` varchar(255) DEFAULT NULL,
  `fnbl_pim_id` bigint(20) DEFAULT NULL,
  `deleted` tinyint(1) NOT NULL DEFAULT '0',
  `date_created` datetime DEFAULT NULL,
  `date_modified` datetime DEFAULT NULL,
  `fullname` varchar(255) DEFAULT NULL,
  `view_email` varchar(255) NOT NULL DEFAULT '',
  `use_friendly_nm` tinyint(1) NOT NULL DEFAULT '1',
  `firstname` varchar(100) NOT NULL DEFAULT '',
  `surname` varchar(100) NOT NULL DEFAULT '',
  `nickname` varchar(100) NOT NULL DEFAULT '',
  `h_email` varchar(255) DEFAULT NULL,
  `h_street` varchar(255) DEFAULT NULL,
  `h_city` varchar(200) DEFAULT NULL,
  `h_state` varchar(200) DEFAULT NULL,
  `h_zip` varchar(10) DEFAULT NULL,
  `h_country` varchar(200) DEFAULT NULL,
  `h_phone` varchar(50) DEFAULT NULL,
  `h_fax` varchar(50) DEFAULT NULL,
  `h_mobile` varchar(50) DEFAULT NULL,
  `h_web` varchar(255) DEFAULT NULL,
  `b_email` varchar(255) DEFAULT NULL,
  `b_company` varchar(200) DEFAULT NULL,
  `b_street` varchar(255) DEFAULT NULL,
  `b_city` varchar(200) DEFAULT NULL,
  `b_state` varchar(200) DEFAULT NULL,
  `b_zip` varchar(10) DEFAULT NULL,
  `b_country` varchar(200) DEFAULT NULL,
  `b_job_title` varchar(100) DEFAULT NULL,
  `b_department` varchar(200) DEFAULT NULL,
  `b_office` varchar(200) DEFAULT NULL,
  `b_phone` varchar(50) DEFAULT NULL,
  `b_fax` varchar(50) DEFAULT NULL,
  `b_web` varchar(255) DEFAULT NULL,
  `other_email` varchar(255) DEFAULT NULL,
  `primary_email` tinyint(4) DEFAULT NULL,
  `birthday_day` tinyint(4) NOT NULL DEFAULT '0',
  `birthday_month` tinyint(4) NOT NULL DEFAULT '0',
  `birthday_year` smallint(6) NOT NULL DEFAULT '0',
  `id_addr_prev` bigint(20) DEFAULT NULL,
  `tmp` tinyint(1) NOT NULL DEFAULT '0',
  `use_frequency` int(11) NOT NULL DEFAULT '11',
  `auto_create` tinyint(1) NOT NULL DEFAULT '0',
  `notes` varchar(255) DEFAULT NULL,
  `etag` varchar(100) NOT NULL DEFAULT '',
  PRIMARY KEY (`id_addr`),
  KEY `AWM_ADDR_BOOK_ID_USER_INDEX` (`id_user`),
  KEY `AWM_ADDR_BOOK_DELETED_ID_USER_INDEX` (`id_user`,`deleted`),
  KEY `AWM_ADDR_BOOK_USE_FREQUENCY_INDEX` (`use_frequency`),
  KEY `AWM_ADDR_BOOK_VIEW_EMAIL_INDEX` (`view_email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `awm_addr_groups`
--

CREATE TABLE IF NOT EXISTS `awm_addr_groups` (
  `id_group` int(11) NOT NULL AUTO_INCREMENT,
  `id_user` int(11) NOT NULL DEFAULT '0',
  `group_nm` varchar(255) DEFAULT NULL,
  `group_str_id` varchar(100) DEFAULT NULL,
  `use_frequency` int(11) NOT NULL DEFAULT '0',
  `email` varchar(255) DEFAULT NULL,
  `company` varchar(200) DEFAULT NULL,
  `street` varchar(255) DEFAULT NULL,
  `city` varchar(200) DEFAULT NULL,
  `state` varchar(200) DEFAULT NULL,
  `zip` varchar(10) DEFAULT NULL,
  `country` varchar(200) DEFAULT NULL,
  `phone` varchar(50) DEFAULT NULL,
  `fax` varchar(50) DEFAULT NULL,
  `web` varchar(255) DEFAULT NULL,
  `organization` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id_group`),
  KEY `AWM_ADDR_GROUPS_ID_USER_INDEX` (`id_user`),
  KEY `AWM_ADDR_GROUPS_USE_FREQUENCY_INDEX` (`use_frequency`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `awm_addr_groups_contacts`
--

CREATE TABLE IF NOT EXISTS `awm_addr_groups_contacts` (
  `id_addr` bigint(20) NOT NULL DEFAULT '0',
  `id_group` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `awm_channels`
--

CREATE TABLE IF NOT EXISTS `awm_channels` (
  `id_channel` int(11) NOT NULL AUTO_INCREMENT,
  `login` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id_channel`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `awm_columns`
--

CREATE TABLE IF NOT EXISTS `awm_columns` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_column` int(11) NOT NULL DEFAULT '0',
  `id_user` int(11) NOT NULL DEFAULT '0',
  `column_value` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `AWM_COLUMNS_ID_USER_INDEX` (`id_user`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `awm_domains`
--

CREATE TABLE IF NOT EXISTS `awm_domains` (
  `id_domain` int(11) NOT NULL AUTO_INCREMENT,
  `id_realm` int(11) NOT NULL DEFAULT '0',
  `name` varchar(255) DEFAULT NULL,
  `url` varchar(255) DEFAULT NULL,
  `user_quota` int(11) NOT NULL DEFAULT '0',
  `override_settings` tinyint(1) NOT NULL DEFAULT '0',
  `mail_protocol` tinyint(4) NOT NULL DEFAULT '1',
  `mail_inc_host` varchar(255) DEFAULT NULL,
  `mail_inc_port` int(11) NOT NULL DEFAULT '143',
  `mail_inc_ssl` tinyint(1) NOT NULL DEFAULT '0',
  `mail_out_host` varchar(255) DEFAULT NULL,
  `mail_out_port` int(11) NOT NULL DEFAULT '25',
  `mail_out_auth` tinyint(4) NOT NULL DEFAULT '1',
  `mail_out_login` varchar(255) DEFAULT NULL,
  `mail_out_pass` varchar(255) DEFAULT NULL,
  `mail_out_ssl` tinyint(1) NOT NULL DEFAULT '0',
  `mail_out_method` tinyint(4) NOT NULL DEFAULT '1',
  `allow_webmail` tinyint(1) NOT NULL DEFAULT '1',
  `site_name` varchar(255) DEFAULT NULL,
  `allow_change_interface_settings` tinyint(1) NOT NULL DEFAULT '0',
  `allow_users_add_acounts` tinyint(1) NOT NULL DEFAULT '0',
  `allow_change_account_settings` tinyint(1) NOT NULL DEFAULT '0',
  `allow_new_users_register` tinyint(1) NOT NULL DEFAULT '1',
  `def_user_timezone` int(11) NOT NULL DEFAULT '0',
  `def_user_timeformat` tinyint(4) NOT NULL DEFAULT '0',
  `def_user_dateformat` varchar(100) NOT NULL DEFAULT 'MM/DD/YYYY',
  `msgs_per_page` smallint(6) NOT NULL DEFAULT '20',
  `skin` varchar(255) DEFAULT NULL,
  `lang` varchar(255) DEFAULT NULL,
  `ext_imap_host` varchar(255) NOT NULL DEFAULT '',
  `ext_smtp_host` varchar(255) NOT NULL DEFAULT '',
  `ext_dav_host` varchar(255) NOT NULL DEFAULT '',
  `allow_contacts` tinyint(1) NOT NULL DEFAULT '1',
  `contacts_per_page` smallint(6) NOT NULL DEFAULT '20',
  `allow_calendar` tinyint(1) NOT NULL DEFAULT '1',
  `cal_week_starts_on` tinyint(4) NOT NULL DEFAULT '0',
  `cal_show_weekends` tinyint(1) NOT NULL DEFAULT '0',
  `cal_workday_starts` tinyint(4) NOT NULL DEFAULT '9',
  `cal_workday_ends` tinyint(4) NOT NULL DEFAULT '18',
  `cal_show_workday` tinyint(1) NOT NULL DEFAULT '0',
  `cal_default_tab` tinyint(4) NOT NULL DEFAULT '2',
  `layout` tinyint(4) NOT NULL DEFAULT '0',
  `xlist` tinyint(1) NOT NULL DEFAULT '1',
  `global_addr_book` tinyint(4) NOT NULL DEFAULT '0',
  `check_interval` int(11) NOT NULL DEFAULT '0',
  `allow_registration` tinyint(1) NOT NULL DEFAULT '0',
  `allow_pass_reset` tinyint(1) NOT NULL DEFAULT '0',
  `is_internal` tinyint(1) NOT NULL DEFAULT '0',
  `disabled` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id_domain`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `awm_fetchers`
--

CREATE TABLE IF NOT EXISTS `awm_fetchers` (
  `id_fetcher` int(11) NOT NULL AUTO_INCREMENT,
  `disabled` tinyint(1) NOT NULL DEFAULT '0',
  `inc_protocol` tinyint(4) NOT NULL DEFAULT '0',
  `inc_security` tinyint(4) NOT NULL DEFAULT '0',
  `inc_host` varchar(255) DEFAULT NULL,
  `inc_port` int(11) DEFAULT NULL,
  `inc_login` varchar(255) DEFAULT NULL,
  `inc_password` varchar(255) DEFAULT NULL,
  `local_user` varchar(255) DEFAULT NULL,
  `local_domain` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id_fetcher`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `awm_filters`
--

CREATE TABLE IF NOT EXISTS `awm_filters` (
  `id_filter` int(11) NOT NULL AUTO_INCREMENT,
  `id_acct` int(11) NOT NULL DEFAULT '0',
  `field` tinyint(4) NOT NULL DEFAULT '0',
  `condition` tinyint(4) NOT NULL DEFAULT '0',
  `filter` varchar(255) DEFAULT NULL,
  `action` tinyint(4) NOT NULL DEFAULT '0',
  `id_folder` bigint(20) NOT NULL DEFAULT '0',
  `applied` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id_filter`),
  KEY `AWM_FILTERS_ID_ACCT_ID_FOLDER_INDEX` (`id_acct`,`id_folder`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `awm_folders`
--

CREATE TABLE IF NOT EXISTS `awm_folders` (
  `id_folder` bigint(20) NOT NULL AUTO_INCREMENT,
  `id_parent` bigint(20) NOT NULL DEFAULT '0',
  `id_acct` int(11) NOT NULL DEFAULT '0',
  `type` smallint(6) NOT NULL DEFAULT '0',
  `name` varchar(255) DEFAULT NULL,
  `full_path` varchar(255) DEFAULT NULL,
  `sync_type` tinyint(4) NOT NULL DEFAULT '0',
  `hide` tinyint(1) NOT NULL DEFAULT '0',
  `fld_order` smallint(6) NOT NULL DEFAULT '1',
  `flags` varchar(100) NOT NULL DEFAULT '',
  PRIMARY KEY (`id_folder`),
  KEY `AWM_FOLDERS_ID_ACCT_ID_FOLDER_INDEX` (`id_acct`,`id_folder`),
  KEY `AWM_FOLDERS_ID_ACCT_ID_PARENT_INDEX` (`id_acct`,`id_parent`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=21 ;

--
-- Dumping data for table `awm_folders`
--

INSERT INTO `awm_folders` (`id_folder`, `id_parent`, `id_acct`, `type`, `name`, `full_path`, `sync_type`, `hide`, `fld_order`, `flags`) VALUES
(1, -1, 1, 1, 'INBOX#', 'INBOX#', 5, 0, 0, '\\noinferiors'),
(2, -1, 1, 3, 'Drafts#', 'Drafts#', 5, 0, 1, '\\noinferiors'),
(3, -1, 1, 2, 'Sent Items#', 'Sent Items#', 5, 0, 2, '\\noinferiors'),
(4, -1, 1, 5, 'Spam#', 'Spam#', 5, 0, 3, '\\noinferiors'),
(5, -1, 1, 4, 'Trash#', 'Trash#', 5, 0, 4, '\\noinferiors'),
(6, -1, 2, 1, 'INBOX#', 'INBOX#', 5, 0, 0, '\\noinferiors'),
(7, -1, 2, 3, 'Drafts#', 'Drafts#', 5, 0, 1, '\\noinferiors'),
(8, -1, 2, 2, 'Sent Items#', 'Sent Items#', 5, 0, 2, '\\noinferiors'),
(9, -1, 2, 5, 'Spam#', 'Spam#', 5, 0, 3, '\\noinferiors'),
(10, -1, 2, 4, 'Trash#', 'Trash#', 5, 0, 4, '\\noinferiors'),
(11, -1, 3, 1, 'INBOX#', 'INBOX#', 5, 0, 0, '\\noinferiors'),
(12, -1, 3, 3, 'Drafts#', 'Drafts#', 5, 0, 1, '\\noinferiors'),
(13, -1, 3, 2, 'Sent Items#', 'Sent Items#', 5, 0, 2, '\\noinferiors'),
(14, -1, 3, 5, 'Spam#', 'Spam#', 5, 0, 3, '\\noinferiors'),
(15, -1, 3, 4, 'Trash#', 'Trash#', 5, 0, 4, '\\noinferiors'),
(16, -1, 4, 1, 'INBOX#', 'INBOX#', 5, 0, 0, '\\noinferiors'),
(17, -1, 4, 3, 'Drafts#', 'Drafts#', 5, 0, 1, '\\noinferiors'),
(18, -1, 4, 2, 'Sent Items#', 'Sent Items#', 5, 0, 2, '\\noinferiors'),
(19, -1, 4, 5, 'Spam#', 'Spam#', 5, 0, 3, '\\noinferiors'),
(20, -1, 4, 4, 'Trash#', 'Trash#', 5, 0, 4, '\\noinferiors');

-- --------------------------------------------------------

--
-- Table structure for table `awm_folders_tree`
--

CREATE TABLE IF NOT EXISTS `awm_folders_tree` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_folder` bigint(20) NOT NULL DEFAULT '0',
  `id_parent` bigint(20) NOT NULL DEFAULT '0',
  `folder_level` tinyint(4) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `AWM_FOLDERS_TREE_ID_FOLDER_INDEX` (`id_folder`),
  KEY `AWM_FOLDERS_TREE_ID_FOLDER_ID_PARENT_INDEX` (`id_folder`,`id_parent`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=21 ;

--
-- Dumping data for table `awm_folders_tree`
--

INSERT INTO `awm_folders_tree` (`id`, `id_folder`, `id_parent`, `folder_level`) VALUES
(1, 1, 1, 0),
(2, 2, 2, 0),
(3, 3, 3, 0),
(4, 4, 4, 0),
(5, 5, 5, 0),
(6, 6, 6, 0),
(7, 7, 7, 0),
(8, 8, 8, 0),
(9, 9, 9, 0),
(10, 10, 10, 0),
(11, 11, 11, 0),
(12, 12, 12, 0),
(13, 13, 13, 0),
(14, 14, 14, 0),
(15, 15, 15, 0),
(16, 16, 16, 0),
(17, 17, 17, 0),
(18, 18, 18, 0),
(19, 19, 19, 0),
(20, 20, 20, 0);

-- --------------------------------------------------------

--
-- Table structure for table `awm_identities`
--

CREATE TABLE IF NOT EXISTS `awm_identities` (
  `id_identity` int(11) NOT NULL AUTO_INCREMENT,
  `id_user` int(11) NOT NULL DEFAULT '0',
  `id_acct` int(11) NOT NULL DEFAULT '0',
  `email` varchar(255) NOT NULL DEFAULT '',
  `friendly_nm` varchar(255) NOT NULL DEFAULT '',
  `signature` text,
  `signature_type` tinyint(4) NOT NULL DEFAULT '1',
  `use_signature` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id_identity`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `awm_mailaliases`
--

CREATE TABLE IF NOT EXISTS `awm_mailaliases` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_acct` int(11) DEFAULT NULL,
  `alias_name` varchar(255) NOT NULL DEFAULT '',
  `alias_domain` varchar(255) NOT NULL DEFAULT '',
  `alias_to` varchar(255) NOT NULL DEFAULT '',
  PRIMARY KEY (`id`),
  KEY `AWM_MAILALIASES_ID_ACCT_INDEX` (`id_acct`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `awm_mailforwards`
--

CREATE TABLE IF NOT EXISTS `awm_mailforwards` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_acct` int(11) DEFAULT NULL,
  `forward_name` varchar(255) NOT NULL DEFAULT '',
  `forward_domain` varchar(255) NOT NULL DEFAULT '',
  `forward_to` varchar(255) NOT NULL DEFAULT '',
  PRIMARY KEY (`id`),
  KEY `AWM_MAILFORWARDS_ID_ACCT_INDEX` (`id_acct`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `awm_mailinglists`
--

CREATE TABLE IF NOT EXISTS `awm_mailinglists` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_acct` int(11) DEFAULT NULL,
  `list_name` varchar(255) NOT NULL DEFAULT '',
  `list_to` varchar(255) NOT NULL DEFAULT '',
  PRIMARY KEY (`id`),
  KEY `AWM_MAILINGLISTS_ID_ACCT_INDEX` (`id_acct`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `awm_messages`
--

CREATE TABLE IF NOT EXISTS `awm_messages` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `id_msg` bigint(20) NOT NULL DEFAULT '0',
  `id_acct` int(11) NOT NULL DEFAULT '0',
  `id_folder_srv` bigint(20) NOT NULL DEFAULT '0',
  `id_folder_db` bigint(20) NOT NULL DEFAULT '0',
  `str_uid` varchar(255) DEFAULT NULL,
  `int_uid` bigint(20) NOT NULL DEFAULT '0',
  `from_msg` varchar(255) DEFAULT NULL,
  `to_msg` varchar(255) DEFAULT NULL,
  `cc_msg` varchar(255) DEFAULT NULL,
  `bcc_msg` varchar(255) DEFAULT NULL,
  `subject` varchar(255) DEFAULT NULL,
  `msg_date` datetime DEFAULT NULL,
  `attachments` tinyint(1) NOT NULL DEFAULT '0',
  `size` bigint(20) NOT NULL DEFAULT '0',
  `seen` tinyint(1) NOT NULL DEFAULT '0',
  `flagged` tinyint(1) NOT NULL DEFAULT '0',
  `priority` tinyint(4) NOT NULL DEFAULT '0',
  `downloaded` tinyint(1) NOT NULL DEFAULT '0',
  `x_spam` tinyint(1) NOT NULL DEFAULT '0',
  `rtl` tinyint(1) NOT NULL DEFAULT '0',
  `deleted` tinyint(1) NOT NULL DEFAULT '0',
  `is_full` tinyint(1) NOT NULL DEFAULT '1',
  `replied` tinyint(1) DEFAULT NULL,
  `forwarded` tinyint(1) DEFAULT NULL,
  `flags` int(11) DEFAULT NULL,
  `body_text` longtext,
  `grayed` tinyint(1) NOT NULL DEFAULT '0',
  `charset` int(11) NOT NULL DEFAULT '-1',
  `sensitivity` tinyint(4) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `AWM_MESSAGES_ID_ACCT_ID_FOLDER_DB_INDEX` (`id_acct`,`id_folder_db`),
  KEY `AWM_MESSAGES_ID_ACCT_ID_FOLDER_DB_SEEN_INDEX` (`id_acct`,`id_folder_db`,`seen`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `awm_messages_body`
--

CREATE TABLE IF NOT EXISTS `awm_messages_body` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `id_msg` bigint(20) NOT NULL DEFAULT '0',
  `id_acct` int(11) NOT NULL DEFAULT '0',
  `msg` longblob,
  PRIMARY KEY (`id`),
  UNIQUE KEY `AWM_MESSAGES_BODY_ID_ACCT_ID_MSG_INDEX` (`id_acct`,`id_msg`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `awm_reads`
--

CREATE TABLE IF NOT EXISTS `awm_reads` (
  `id_read` bigint(20) NOT NULL AUTO_INCREMENT,
  `id_acct` int(11) NOT NULL DEFAULT '0',
  `str_uid` varchar(255) DEFAULT NULL,
  `tmp` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id_read`),
  KEY `AWM_READS_ID_ACCT_INDEX` (`id_acct`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `awm_realms`
--

CREATE TABLE IF NOT EXISTS `awm_realms` (
  `id_realm` int(11) NOT NULL AUTO_INCREMENT,
  `id_channel` int(11) NOT NULL DEFAULT '0',
  `disabled` tinyint(1) NOT NULL DEFAULT '0',
  `login_enabled` tinyint(1) NOT NULL DEFAULT '0',
  `login` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `quota` int(11) NOT NULL DEFAULT '0',
  `user_count_limit` int(11) NOT NULL DEFAULT '0',
  `domain_count_limit` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id_realm`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `awm_senders`
--

CREATE TABLE IF NOT EXISTS `awm_senders` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_user` int(11) NOT NULL DEFAULT '0',
  `email` varchar(255) DEFAULT NULL,
  `safety` tinyint(4) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `AWM_SENDERS_ID_USER_INDEX` (`id_user`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `awm_settings`
--

CREATE TABLE IF NOT EXISTS `awm_settings` (
  `id_setting` int(11) NOT NULL AUTO_INCREMENT,
  `id_user` int(11) NOT NULL DEFAULT '0',
  `msgs_per_page` smallint(6) NOT NULL DEFAULT '20',
  `contacts_per_page` smallint(6) NOT NULL DEFAULT '20',
  `last_login` datetime DEFAULT NULL,
  `logins_count` int(11) NOT NULL DEFAULT '0',
  `auto_checkmail_interval` int(11) NOT NULL DEFAULT '0',
  `def_skin` varchar(255) NOT NULL DEFAULT 'AfterLogic',
  `def_editor` tinyint(1) NOT NULL DEFAULT '1',
  `layout` tinyint(4) NOT NULL DEFAULT '0',
  `save_mail` tinyint(4) NOT NULL DEFAULT '0',
  `def_timezone` smallint(6) NOT NULL DEFAULT '0',
  `def_time_fmt` varchar(255) DEFAULT NULL,
  `def_lang` varchar(255) DEFAULT NULL,
  `def_date_fmt` varchar(100) NOT NULL DEFAULT 'MM/DD/YYYY',
  `mailbox_limit` bigint(20) NOT NULL DEFAULT '0',
  `incoming_charset` varchar(30) NOT NULL DEFAULT 'iso-8859-1',
  `question_1` varchar(255) DEFAULT NULL,
  `answer_1` varchar(255) DEFAULT NULL,
  `question_2` varchar(255) DEFAULT NULL,
  `answer_2` varchar(255) DEFAULT NULL,
  `enable_fnbl_sync` tinyint(1) NOT NULL DEFAULT '0',
  `capa` varchar(255) DEFAULT NULL,
  `client_timeoffset` int(11) NOT NULL DEFAULT '0',
  `custom_fields` text,
  PRIMARY KEY (`id_setting`),
  UNIQUE KEY `AWM_SETTINGS_ID_USER_INDEX` (`id_user`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `awm_settings`
--

INSERT INTO `awm_settings` (`id_setting`, `id_user`, `msgs_per_page`, `contacts_per_page`, `last_login`, `logins_count`, `auto_checkmail_interval`, `def_skin`, `def_editor`, `layout`, `save_mail`, `def_timezone`, `def_time_fmt`, `def_lang`, `def_date_fmt`, `mailbox_limit`, `incoming_charset`, `question_1`, `answer_1`, `question_2`, `answer_2`, `enable_fnbl_sync`, `capa`, `client_timeoffset`, `custom_fields`) VALUES
(1, 1, 20, 20, '2013-03-02 05:40:56', 1, 0, 'AfterLogic', 1, 0, 1, 0, '1', 'English', 'MM/DD/YYYY', 0, 'iso-8859-1', '', '', '', '', 0, '', 330, ''),
(2, 2, 20, 20, '2013-03-02 05:57:59', 1, 0, 'AfterLogic', 1, 0, 1, 0, '1', 'English', 'MM/DD/YYYY', 0, 'iso-8859-1', '', '', '', '', 0, '', 330, ''),
(3, 3, 20, 20, '2013-03-02 05:59:33', 1, 0, 'AfterLogic', 1, 0, 1, 0, '1', 'English', 'MM/DD/YYYY', 0, 'iso-8859-1', '', '', '', '', 0, '', 330, ''),
(4, 4, 20, 20, '2013-03-02 07:26:04', 5, 0, 'AfterLogic', 1, 0, 1, 0, '1', 'English', 'MM/DD/YYYY', 0, 'iso-8859-1', '', '', '', '', 0, '', 330, '');

-- --------------------------------------------------------

--
-- Table structure for table `awm_system_folders`
--

CREATE TABLE IF NOT EXISTS `awm_system_folders` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_acct` int(11) NOT NULL DEFAULT '0',
  `id_user` int(11) NOT NULL DEFAULT '0',
  `folder_full_name` varchar(255) DEFAULT NULL,
  `system_type` tinyint(4) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `AWM_SYSTEM_FOLDERS_ID_ACCT_INDEX` (`id_acct`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `a_users`
--

CREATE TABLE IF NOT EXISTS `a_users` (
  `id_user` int(11) NOT NULL AUTO_INCREMENT,
  `deleted` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id_user`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `a_users`
--

INSERT INTO `a_users` (`id_user`, `deleted`) VALUES
(1, 0),
(2, 0),
(3, 0),
(4, 0);

-- --------------------------------------------------------

--
-- Table structure for table `blog_articles`
--

CREATE TABLE IF NOT EXISTS `blog_articles` (
  `article_id` int(10) NOT NULL AUTO_INCREMENT,
  `article_name` varchar(100) NOT NULL,
  `article_detail` varchar(600) NOT NULL,
  `user_id` varchar(10) NOT NULL,
  `user_name` varchar(100) NOT NULL,
  `datetime` varchar(25) NOT NULL,
  `comments` int(4) NOT NULL DEFAULT '0',
  PRIMARY KEY (`article_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `blog_articles`
--

INSERT INTO `blog_articles` (`article_id`, `article_name`, `article_detail`, `user_id`, `user_name`, `datetime`, `comments`) VALUES
(1, 'ASSIGNMENTS. The Beginning And The Ending Of Engineering.', 'Assignments.. Yes.. Doesn''t it make you shiver and send chills up your spine??\nWell, it would if you are studying Engineering. From the day you enter an Engineering college till the day you leave it you do nothing worthwhile but write assignments.', '101080030', 'Tushar Jain', '27/02/13 10:45:24', 6),
(2, 'The genius who knew it 10 years back!', 'Day 40 is on Day 20-20(the day we won it)<br>\r\nHe knew it!!! Long before we all knew it . he knew it in his mind: India would win the 20-20. Of course he is a genius. No doubt about it.', '101080009', 'Rakesh Chiluka', '28/02/13 05:12:51', 1),
(4, 'High Street Phoenix hosts VJTI TECHNOVANZA 2013 on 12th December', 'High Street Phoenix, on 12th December, will play host to VJTI college TECHNOVANZA 2013, the institutions annual fest that strives to give a new dimension to the society by making technology more accessible to the common man. It endeavors to educate people about the principles of engineering and thus spreading the knowledge of Engineering and Technology to the society at large.', '91070054', 'Gurumurthy', '28/02/13 05:19:35', 0),
(5, 'Time Management', 'Time Management is one of the essential things in life .We have to practice it every day of our life.', '111080022', 'Akshay Shah', '28/02/13 05:24:53', 1),
(6, 'b1', ';dlfjdfsfm&(#$@*&#*', '101080030', 'Tushar Jain', '02/03/13 11:36:27', 1);

-- --------------------------------------------------------

--
-- Table structure for table `blog_comments`
--

CREATE TABLE IF NOT EXISTS `blog_comments` (
  `comment_id` int(10) NOT NULL AUTO_INCREMENT,
  `article_id` int(10) NOT NULL,
  `comment_content` varchar(200) NOT NULL,
  `user_id` varchar(10) NOT NULL,
  `user_name` varchar(100) NOT NULL,
  `datetime` varchar(25) NOT NULL,
  PRIMARY KEY (`comment_id`,`article_id`),
  KEY `article_id` (`article_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `blog_comments`
--

INSERT INTO `blog_comments` (`comment_id`, `article_id`, `comment_content`, `user_id`, `user_name`, `datetime`) VALUES
(1, 1, 'ddsdfs', '101080030', 'Tushar Jain', '27/02/13 22:46:54'),
(1, 2, 'yes it was great', '91070054', 'Gurumurthy', '28/02/13 17:19:52'),
(1, 6, 'hello', '101080030', 'Tushar Jain', '02/03/13 11:41:07'),
(2, 1, 'hi', 'it010902', 'Yashodip Thakur', '27/02/13 23:13:04'),
(2, 5, 'drfsjldkfd', '101080030', 'Tushar Jain', '02/03/13 11:43:59'),
(3, 1, 'der', 'etx010504', 'Pratish Sardar', '27/02/13 23:30:17'),
(4, 1, 'sasasa', '10106', 'RUSHABH BHUVA', '28/02/13 00:06:11'),
(5, 1, 'true', '101080009', 'Rakesh Chiluka', '28/02/13 17:13:01'),
(6, 1, 'what a description', '91070054', 'Gurumurthy', '28/02/13 17:20:09');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE IF NOT EXISTS `categories` (
  `category_id` int(10) NOT NULL,
  `category_name` varchar(20) NOT NULL,
  `category_detail` varchar(150) NOT NULL,
  `no_of_topics` int(5) NOT NULL,
  PRIMARY KEY (`category_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`category_id`, `category_name`, `category_detail`, `no_of_topics`) VALUES
(1, 'General', 'general discussions', 3),
(2, 'VJTI', 'all queries related to college info', 1),
(3, 'Engineering', 'All queries related to engineering', 1),
(4, 'MBA', 'All queries related to management entrance exams', 1),
(5, 'MS', 'All queries related to foreign studies', 0),
(6, 'Student Activities', 'Discussions regarding student activities', 1);

-- --------------------------------------------------------

--
-- Table structure for table `class`
--

CREATE TABLE IF NOT EXISTS `class` (
  `class_id` int(10) NOT NULL,
  `class_name` varchar(30) NOT NULL,
  `teacher_id` varchar(10) NOT NULL,
  `branch` varchar(40) NOT NULL,
  `semester` int(5) NOT NULL,
  PRIMARY KEY (`class_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `class`
--

INSERT INTO `class` (`class_id`, `class_name`, `teacher_id`, `branch`, `semester`) VALUES
(9106, 'B  TECH ETX', 'etx109901', 'ETX', 8),
(9107, 'B  TECH COMPS', 'cse010401', 'COMPS', 8),
(9108, 'B  TECH IT', 'it010701', 'IT', 8),
(9109, 'B TECH EXTC', 'etc100801', 'EXTC', 8),
(10106, 'T.Y.B  TECH ETX', 'etx010802', 'ETX', 6),
(10107, 'T.Y.B  TECH COMPS', 'cse010404', 'COMPS', 6),
(10108, 'T.Y.B  TECH IT', 'it010902', 'IT', 6),
(10109, 'T.Y.B TECH EXTC', 'etc010902', 'EXTC', 6),
(11106, 'S.Y.B  TECH ETX', 'etx019703', 'ETX', 4),
(11107, 'S.Y.B  TECH COMPS', 'cse100102', 'COMPS', 4),
(11108, 'S.Y.B  TECH IT', 'it011103', 'IT', 4),
(11109, 'S.Y.B TECH EXTC', 'etc101003', 'EXTC', 4),
(12106, 'F.Y.B  TECH ETX', 'etx010504', 'ETX', 2),
(12107, 'F.Y.B  TECH COMPS', 'cse100603', 'COMPS', 2),
(12108, 'F.Y.B  TECH IT', 'it010504', 'IT', 2);

-- --------------------------------------------------------

--
-- Table structure for table `courses`
--

CREATE TABLE IF NOT EXISTS `courses` (
  `course_id` varchar(10) NOT NULL,
  `class_id` int(10) NOT NULL,
  `teacher_id` varchar(10) NOT NULL,
  `course_name` varchar(50) NOT NULL,
  `course_credits` float NOT NULL,
  `course_type` varchar(20) NOT NULL,
  PRIMARY KEY (`course_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `courses`
--

INSERT INTO `courses` (`course_id`, `class_id`, `teacher_id`, `course_name`, `course_credits`, `course_type`) VALUES
('CSE305', 9107, 'cse010401', 'Web Technology', 4, 'Theory'),
('ETX101', 12106, 'etx001005', 'BEE', 4, 'Theory'),
('IT0306', 10108, 'it010902', 'Project Management', 3, 'Theory'),
('IT205', 11108, 'it010902', 'Advanced java', 1.5, 'Practicals');

-- --------------------------------------------------------

--
-- Table structure for table `course_assignments`
--

CREATE TABLE IF NOT EXISTS `course_assignments` (
  `course_id` varchar(10) NOT NULL,
  `assignment_id` int(10) NOT NULL,
  `assignment_name` varchar(100) NOT NULL,
  `assignment_date` varchar(25) NOT NULL,
  `deadline_date` varchar(25) NOT NULL,
  `submit_type` varchar(20) NOT NULL,
  `submit_url` varchar(100) NOT NULL,
  `filename` varchar(60) NOT NULL,
  PRIMARY KEY (`course_id`,`assignment_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `course_assignments`
--

INSERT INTO `course_assignments` (`course_id`, `assignment_id`, `assignment_name`, `assignment_date`, `deadline_date`, `submit_type`, `submit_url`, `filename`) VALUES
('CSE305', 1, 'Topic 1', '28/02/13 17:40:27', 'This Friday', 'Online', 'cse010401/assignmentuploads/', 'ai final.txt'),
('ETX101', 1, 'Topic 1', '28/02/13 17:47:15', '8/3/13', 'Offline', 'etx001005/', 'AI assignment.txt'),
('IT0306', 1, 'Topic 1', '28/02/13 01:21:48', '4/3/13', 'Online', 'it010902/assignmentuploads/', 'AI assignment.txt'),
('IT205', 1, 'Topic 1', '28/02/13 17:52:48', 'to be decided', 'Offline', 'it010902/', '');

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

CREATE TABLE IF NOT EXISTS `events` (
  `event_id` int(10) NOT NULL AUTO_INCREMENT,
  `class_id` int(10) NOT NULL,
  `user_id` varchar(10) NOT NULL,
  `user_name` varchar(100) NOT NULL,
  `event_topic` varchar(100) NOT NULL,
  `event_detail` longtext NOT NULL,
  `event_level` int(3) NOT NULL,
  PRIMARY KEY (`event_id`,`class_id`,`user_id`),
  KEY `user_id` (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=21 ;

--
-- Dumping data for table `events`
--

INSERT INTO `events` (`event_id`, `class_id`, `user_id`, `user_name`, `event_topic`, `event_detail`, `event_level`) VALUES
(1, 10108, 'it010902', 'Yashodip Thakur', 'AI Class Test On Monday', 'AI class test II will be conducted on this coming Monday and the portion would be upto what is been taught till Friday.CT would be of 10 marks and no options would be present.', 10),
(11, 9107, '91070054', 'Gurumurthy', 'Test 1 =', 'Test 1 on Monday', 0),
(12, 10108, '101080009', 'Rakesh Chiluka', 'Half Day Tomorow', 'Due to celebration of Science Day there is half day tomorow! ', 0),
(13, 11108, '111080022', 'Akshay Shah', 'Java Practical Questions have been confirmed', 'Java Practical Questions  for this semester has been provided by the Madam', 0),
(14, 12106, '121060034', 'Pratik Kadam', 'Chemistry tutorials', 'In the Xerox centre dhemistry tutorial have been kept ', 0),
(15, 9107, 'cse010401', 'Aditya Dabak', 'WEB Technology CT ', 'WEB Technology CT  tomorow at 10am sharp Late comers will not be entertained', 9),
(16, 12106, 'etx001005', 'Pinto', 'BEE Lab', 'BEE Lab Manul has been prepared and it will be in circulation tomorow also study and come every new topics which was covered last week', 12),
(17, 10108, '101080030', 'Tushar Jain', 'Science Day Celebrations', 'VJTI is celebrating science day on 8th March so if anybody is interested in contributing can join the commitee', 0),
(18, 10108, '101080030', 'Tushar Jain', 'test1', 'test1', 0),
(20, 10108, '101080030', 'Tushar Jain', 'test', 'test', 0);

-- --------------------------------------------------------

--
-- Table structure for table `event_comments`
--

CREATE TABLE IF NOT EXISTS `event_comments` (
  `event_id` int(10) NOT NULL,
  `event_comment_id` int(10) NOT NULL,
  `event_comment` varchar(150) NOT NULL,
  `user_id` varchar(10) NOT NULL,
  `user_name` varchar(100) NOT NULL,
  `datetime` varchar(25) NOT NULL,
  PRIMARY KEY (`event_id`,`event_comment_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `event_comments`
--

INSERT INTO `event_comments` (`event_id`, `event_comment_id`, `event_comment`, `user_id`, `user_name`, `datetime`) VALUES
(1, 1, 'Sir are we expected to learn Graph Theory for the CT.', '101080030', 'Tushar Jain', '27/02/13 23:21:09'),
(1, 2, 'Yes . But not in detail.', 'it010902', 'Yashodip Thakur', '27/02/13 23:22:10'),
(1, 3, 'okay', '101080009', 'Rakesh Chiluka', '28/02/13 17:09:48'),
(11, 1, 'test 1', 'cse010401', 'Aditya Dabak', '28/02/13 13:38:50'),
(12, 1, 'study at home for the CT', 'it010902', 'Yashodip Thakur', '28/02/13 17:31:17'),
(16, 1, 'Ok Sir we will definitely do that', '121060034', 'Pratik Kadam', '28/02/13 17:50:44');

-- --------------------------------------------------------

--
-- Table structure for table `forum_replies`
--

CREATE TABLE IF NOT EXISTS `forum_replies` (
  `reply_id` int(10) NOT NULL AUTO_INCREMENT,
  `topic_id` int(10) NOT NULL,
  `reply_content` varchar(200) NOT NULL,
  `user_id` varchar(10) NOT NULL,
  `user_name` varchar(100) NOT NULL,
  `datetime` varchar(25) NOT NULL,
  PRIMARY KEY (`reply_id`,`topic_id`),
  KEY `topic_id` (`topic_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `forum_replies`
--

INSERT INTO `forum_replies` (`reply_id`, `topic_id`, `reply_content`, `user_id`, `user_name`, `datetime`) VALUES
(1, 1, 'yes near Central Matunga', 'etx010504', 'Pratish Sardar', '27/02/13 23:31:04'),
(1, 4, 'VJTI would be a great location', 'admin', 'Admin', '02/03/13 02:42:36'),
(1, 7, 'pls reply soon', '111080022', 'Akshay Shah', '28/02/13 17:26:08'),
(2, 1, 'yes its good there', '111080022', 'Akshay Shah', '28/02/13 17:26:25');

-- --------------------------------------------------------

--
-- Table structure for table `forum_topics`
--

CREATE TABLE IF NOT EXISTS `forum_topics` (
  `topic_id` int(10) NOT NULL AUTO_INCREMENT,
  `category_id` int(10) NOT NULL,
  `topic_name` varchar(255) NOT NULL DEFAULT '',
  `topic_detail` longtext NOT NULL,
  `user_id` varchar(10) NOT NULL,
  `user_name` varchar(100) NOT NULL,
  `datetime` varchar(25) NOT NULL DEFAULT '',
  `view` int(4) NOT NULL DEFAULT '0',
  `reply` int(4) NOT NULL DEFAULT '0',
  `last_posted_by` varchar(65) NOT NULL,
  PRIMARY KEY (`topic_id`,`category_id`),
  UNIQUE KEY `topic_name` (`topic_name`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `forum_topics`
--

INSERT INTO `forum_topics` (`topic_id`, `category_id`, `topic_name`, `topic_detail`, `user_id`, `user_name`, `datetime`, `view`, `reply`, `last_posted_by`) VALUES
(1, 1, 'Books', 'Is there any provision in Matunga where we can cheap books ?', '101080030', 'Tushar Jain', '27/02/13 10:49:57', 10, 2, 'Akshay Shah'),
(4, 1, 'Where to conduct the next barcamp???', 'Barcamp Mumbai  is scheduled this April so we have to finalise the locations .pls anybody have any suggestions??', 'etx010504', 'Pratish Sardar', '27/02/13 11:30:39', 18, 1, 'Admin'),
(5, 4, 'Which books to be used for Quantative Analysis', 'Please give some good suddestions ia have to learn it asap', '101080009', 'Rakesh Chiluka', '28/02/13 05:11:51', 0, 0, 'Rakesh Chiluka'),
(6, 2, 'How to get bonafide in VJTI', 'I have been trying it hard to get the procedure for obtaining bonafide in the college .Pls help me out.', '91070054', 'Gurumurthy', '28/02/13 05:21:22', 0, 0, 'Gurumurthy'),
(7, 6, 'Whens the Social Week ', 'I am eagerly waiting for the social week when its going to be happen', '111080022', 'Akshay Shah', '28/02/13 05:25:54', 3, 1, 'Akshay Shah'),
(8, 3, 'Useful Links', 'People pls visit the nptel site for the various links its great', 'it010902', 'Yashodip Thakur', '28/02/13 05:33:06', 3, 0, 'Yashodip Thakur'),
(9, 1, 'Social week be kept', 'Social group', '101080009', 'Rakesh Chiluka', '01/03/13 05:47:18', 5, 0, 'Rakesh Chiluka');

-- --------------------------------------------------------

--
-- Table structure for table `general_news`
--

CREATE TABLE IF NOT EXISTS `general_news` (
  `news_id` int(10) NOT NULL AUTO_INCREMENT,
  `news_topic` varchar(100) NOT NULL,
  `news_content` varchar(300) NOT NULL,
  `datetime` varchar(30) NOT NULL,
  PRIMARY KEY (`news_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `general_news`
--

INSERT INTO `general_news` (`news_id`, `news_topic`, `news_content`, `datetime`) VALUES
(1, 'Develop apps for Aakash Tabs', 'Android Workshop on 3rd March in CCF-2 LAB.', '28/02/13 16:20:55'),
(2, 'Apply for  Teach For India Fellowship', 'Apply for  Teach For India Fellowship by 10th March', '28/02/13 16:21:31'),
(3, 'Apply for Gandhi Fellowship', 'Apply for Gandhi Fellowship . For more details contact your respective class teachers', '28/02/13 16:22:05'),
(4, 'IIT-B Submit', 'Enterprenuership Summit at IIT-B', '28/02/13 16:22:25'),
(5, 'JBIMS seminar', 'JBIMS seminar on CMAT on 27th January', '28/02/13 16:22:43'),
(6, 'SRA workshop on Wireless Robotics on 16th-17th February', 'SRA workshop on Wireless Robotics on 16th-17th February.Make sure you be there .Only limited seats available', '28/02/13 16:23:21'),
(7, 'Academic Calender 2013', 'Academic Calender 2013 has been uploaded on the official website of VJTI', '28/02/13 16:24:21'),
(8, 'VJTI Alumni Shri Sekhar Basu, took over as Director of BARC', '', '28/02/13 16:24:37');

-- --------------------------------------------------------

--
-- Table structure for table `registered_students`
--

CREATE TABLE IF NOT EXISTS `registered_students` (
  `student_id` int(10) NOT NULL,
  `password` varchar(50) NOT NULL,
  `activate_email` varchar(10) NOT NULL DEFAULT 'yes',
  PRIMARY KEY (`student_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `registered_students`
--

INSERT INTO `registered_students` (`student_id`, `password`, `activate_email`) VALUES
(10106, '123', 'yes'),
(91070054, 'technetium', 'yes'),
(91070087, 'ubuntuorg', 'yes'),
(101080007, '28091992', 'no'),
(101080009, 'vjti123', 'yes'),
(101080021, 'tushar', 'yes'),
(101080030, 'vjti', 'yes'),
(101090034, 'yeslogin', 'yes'),
(101090044, 'todaylogin', 'yes'),
(101090050, 'pratibimb', 'yes'),
(111080022, 'jaintushar', 'yes'),
(111080056, 'vjtiorg', 'yes'),
(111080067, 'opera', 'yes'),
(121060034, 'crazyfour', 'yes'),
(121060045, 'vanzaorg', 'yes'),
(121060067, 'techno', 'yes');

-- --------------------------------------------------------

--
-- Table structure for table `resources`
--

CREATE TABLE IF NOT EXISTS `resources` (
  `resource_id` int(10) NOT NULL AUTO_INCREMENT,
  `resource_topic` varchar(100) NOT NULL,
  `resource_type` varchar(20) NOT NULL,
  `resource_content` varchar(250) NOT NULL,
  `datetime` varchar(30) NOT NULL,
  PRIMARY KEY (`resource_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `resources`
--

INSERT INTO `resources` (`resource_id`, `resource_topic`, `resource_type`, `resource_content`, `datetime`) VALUES
(1, 'VJTI', 'link', 'http://www.vjti.ac.in/', '28/02/13 16:27:58'),
(2, 'NPTEL', 'link', 'http://nptel.iitm.ac.in/', '28/02/13 16:28:24'),
(3, 'EdX', 'link', 'https://www.edx.org/', '28/02/13 16:28:47'),
(6, 'Video 1', 'video', '<iframe width="560" height="315" src="http://www.youtube.com/embed/IaZ35MbpCmc" frameborder="0" allowfullscreen></iframe>', '28/02/13 16:33:31'),
(7, 'Video 2', 'video', '<iframe width="560" height="315" src="http://www.youtube.com/embed/wT5QxanaQFw" frameborder="0" allowfullscreen></iframe>', '28/02/13 16:33:47');

-- --------------------------------------------------------

--
-- Table structure for table `submission`
--

CREATE TABLE IF NOT EXISTS `submission` (
  `course_id` varchar(10) NOT NULL,
  `assignment_id` int(10) NOT NULL,
  `student_id` int(10) NOT NULL,
  `grade` varchar(20) NOT NULL,
  PRIMARY KEY (`course_id`,`assignment_id`,`student_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `teachers`
--

CREATE TABLE IF NOT EXISTS `teachers` (
  `teacher_id` varchar(10) NOT NULL,
  `name` varchar(65) NOT NULL,
  `gender` varchar(15) NOT NULL,
  `branch_id` int(10) NOT NULL,
  `email_id` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  PRIMARY KEY (`teacher_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `teachers`
--

INSERT INTO `teachers` (`teacher_id`, `name`, `gender`, `branch_id`, `email_id`, `password`) VALUES
('cse010401', 'Aditya Dabak', 'Male', 107, 'adityadabak@yahoo.co.in', 'abc'),
('cse010405', 'Avinash Jadhav', 'Male', 107, 'avicallingaj@gmail.com', 'ilovemypiano'),
('cse010408', 'Sanket Shah', 'Male', 107, 'sanket1331@gmail.com', 'julieloveskevin'),
('cse010909', 'Amit Kulkarni', 'Male', 107, 'iamamitk@redifmail.com', 'ieatcarrots'),
('cse011106', 'Vivek Dalal', 'Male', 107, 'dalalvivek007@gmail.com', 'ihateliverandonions'),
('cse100102', 'Divya Shah', 'Female', 107, 'divyashah2801@gmail.com', 'MyPuppyLikesCh33s3'),
('cse100307', 'RAVINA SHAH', 'Female', 107, 'lateymahesh@gmail.com', 'mypuppylikescheese'),
('cse100603', 'Dhiraj Patel', 'Female', 107, 'dhirajpatel38@gmail.cokm', 'susan'),
('etc010902', 'Nair Manideep', 'Male', 109, 'neela.mani94@gmail.com', 'ILoveMyPiano'),
('etc011007', 'Pratik Bansode', 'Male', 109, 'parimal.patil511@gmail.com', 'pride'),
('etc100801', 'Surabhi Gawali', 'Female', 109, 'surabhi.gavali24@gmail.com', 'AllBlacks!'),
('etc100806', 'Sangita Bansode', 'Female', 109, 'sangitabansode@yahoo.com', 'practical'),
('etc100904', 'Abhishek M', 'Female', 109, 'abhishekmahajan44@gmail.com', 'promised'),
('etc101003', 'Shishir Shah', 'Female', 109, 'amruta.tivarekar@gmail.com', 'IeatCarrots'),
('etc101105', 'Pooja Gale', 'Female', 109, 'galerohan1610@gmail.com', 'possibly'),
('etx001005', 'Pinto', 'Female', 106, 'pint@gmail.com', 'vj'),
('etx001555', 'try', 'Female', 106, 'try@gmail.com', 'ccd'),
('etx010206', 'Dipesh Bhusara', 'Male', 106, 'dipeshbhusara@gmail.com', 'allblacks'),
('etx010504', 'Pratish Sardar', 'Male', 106, 'pratish.sardar@gmail.com', 'kitty'),
('etx010802', 'Abhijeet Bode', 'Male', 106, 'bade.abhi@gmail.com', 'jAckBauer'),
('etx010808', 'Pratik Bhalekar', 'Male', 106, 'yogeshpawar126@yahoo.in', 'doctorhouse'),
('etx011009', 'Yash Vora', 'Male', 106, 'yash_vora130@yahoo.co.in', 'adamsandler'),
('etx108905', 'Rajavi Sawant', 'Female', 106, 'vaibhav07.raut@gmail.com', 'smellycat'),
('etx109901', 'Neha Dube', 'Female', 106, 'ndubey01@gmail.com', 'Susan53'),
('etx109907', 'Priyanka', 'Female', 106, 'priyank@hotmail.com', 'jackbauer'),
('it010409', 'Siddharth Lodha', 'Male', 108, 'siddharth.lodha4@gmail.com', 'positive'),
('it010504', 'Kunal Madav', 'Male', 108, 'kmadav37@gmail.com', 'jellyfish'),
('it010607', 'Anuj Sali', 'Male', 108, 'anuj.sali4@gmail.com', 'poetry'),
('it010701', 'Amit Jadhav', 'Male', 108, 'pnkaj619@gmail.com', 'sm3llycat'),
('it010705', 'Shaan Gahit', 'Male', 108, 'sgahi@hotka.com', 'philadelphia'),
('it010902', 'Yashodip Thakur', 'Male', 108, 'it010902@localhost', 'abc'),
('it011103', 'Rishabh Kamat', 'Male', 108, 'kamat.shabh@gmail.com', 'JulieLovesKevin'),
('it100806', 'Akshara Sahi', 'Female', 108, 'sahi.abhy@gmail.com', 'plates'),
('it101008', 'ADITI TAMRAKAR', 'Female', 108, 'javad@standardeon.com', 'policeman');

-- --------------------------------------------------------

--
-- Table structure for table `temp_users`
--

CREATE TABLE IF NOT EXISTS `temp_users` (
  `confirm_code` varchar(65) NOT NULL,
  `student_id` int(10) NOT NULL,
  `email_id` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  PRIMARY KEY (`student_id`),
  UNIQUE KEY `confirm_code` (`confirm_code`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `student_id` int(10) NOT NULL,
  `name` varchar(65) NOT NULL,
  `gender` varchar(15) NOT NULL,
  `email_id` varchar(50) NOT NULL DEFAULT 'tusharjain887@gmail.com',
  `class_id` int(2) NOT NULL,
  PRIMARY KEY (`student_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`student_id`, `name`, `gender`, `email_id`, `class_id`) VALUES
(10106, 'RUSHABH BHUVA', 'Male', '10106@localhost', 10106),
(91066, 'Anson Bastos', 'Male', 'ansonbastos@gmail.com', 9106),
(91067, 'Vivek Yadav', 'Male', 'vivek.yadav104@gmail.com', 9106),
(91068, 'Apurva Hariharan', 'Male', 'apu_hariharan2000@yahoo.co.in', 9106),
(91069, 'Laveena Kotwani', 'Male', 'tulipclouds@gmail.com', 9106),
(91076, 'Tejas Salunkhe', 'Male', 'tejassalunkhe309@gmail.com', 9107),
(91077, 'Yaheen Jain', 'Male', 'speedy_yah@yahoo.co.in', 9107),
(91078, 'Gunjan Bafwa', 'Male', 'gunjan_cricket1234@hotmail.com', 9107),
(91079, 'Aashlesha Potdukhe', 'Male', 'ashley_dprincess@rediffmail.com', 9107),
(91086, 'Priyanka Lokhande', 'Male', 'lokhandepriyanka@yahoo.com', 9108),
(91087, 'Pallavi Vasave', 'Male', 'pallu.vasave@gmail.com', 9108),
(91088, 'Rutuja Kadlag', 'Male', 'rutukadlag@yahoo.com', 9108),
(91089, 'Gayatri Bhusara', 'Male', 'gbhusara@gmail.com', 9108),
(91096, 'HARDIK PAREKH', 'Male', 'hardikmadhav@gmail.com', 9109),
(91097, 'ABIGAIL.FERNANDES', 'Male', 'abby-ferro@yahoo.com', 9109),
(91098, 'AAYUSHI SOMANI', 'Male', 'aayushi.somani09@gmail.com', 9109),
(91099, 'ANISH DESAI', 'Male', 'anishdesai01@hotmail.com', 9109),
(101068, 'KSHITIJ ADSUL', 'Male', 'bade.abhi@gmail.com', 10106),
(101069, 'CHINMAY PATIL', 'Male', 'pawarswap88@gmail.com', 10106),
(101076, 'TEJAS SANKHE', 'Male', 'avicallingaj@gmail.com', 10107),
(101077, 'PRITAM BHALADHARE', 'Male', 'dalalvivek007@gmail.com', 10107),
(101078, 'SHUBHAM RAJPUT', 'Male', 'lateymahesh@gmail.com', 10107),
(101079, 'PRATIK SUTAR', 'Male', 'sanket1331@gmail.com', 10107),
(101086, 'YASHASHREE BHORE', 'Male', '93atulnar@gmail.com', 10108),
(101087, 'GLORIA PEREIRA', 'Male', 'msnbharat@gmail.com', 10108),
(101088, 'SWATI BHAT', 'Male', 'm.shambhavi@yahoo.com', 10108),
(101089, 'AKSHADA SUPE', 'Male', 'sarfarazchaudhary.k@yahoo.com', 10108),
(101096, 'VAIBHAV JADHAV', 'Male', 'sandesh6563@gmail.com', 10109),
(101097, 'ANKIT WALE', 'Male', 'ANWALE@GMAIL.COM', 10109),
(101098, 'ANTARIKSH PURVA', 'Male', 'ANTARIKSHPURVA23@gmail.com', 10109),
(101099, 'SOHAN SARAT', 'Male', 'SARATSOHAN@YAHOO.IN', 10109),
(111066, 'Kanchi Masalia', 'Male', 'kani.masalia@gmail.com', 11106),
(111067, 'Krunal Maskai', 'Male', 'fabregas_arsenalrulz@yahoo.in', 11106),
(111068, 'Lakshmi S. Deore', 'Male', 'lsd_444@rediffmail.com', 11106),
(111069, 'Malay Nandgave', 'Male', 'malay_rules@yahoo.com', 11106),
(111076, 'Saifuddin Hitawala', 'Female', 'saifuddin.hitawala@gmail.com', 11107),
(111077, 'Sailee Tilekar', 'Female', 'sailee-tilekar@yahoo.com', 11107),
(111078, 'Saril Gandhi', 'Female', 'sahilgandhi94@gmail.com', 11107),
(111079, 'Shreya Shah', 'Female', 'shahshreya2108@gmail.com', 11107),
(111086, 'Akshay Sali', 'Female', 'akshay.sali@yahoo.com', 11108),
(111087, 'Ankit Raithatha', 'Female', 'araithatha@gmail.com', 11108),
(111088, 'Anshul Bhatkar', 'Female', 'ccrickrazzy@gmail.com', 11108),
(111089, 'Anurag V. Joshi', 'Female', 'joshi.anurag.v@gmail.com', 11108),
(111096, 'Shubham Dake', 'Female', 'shruti.smarly.94@gmail.com', 11109),
(111097, 'Shubham Doiphode', 'Female', 'shubhamd@yahoo.com', 11109),
(111098, 'Suraj Mishra', 'Female', 'suraj02@gmail.com', 11109),
(111099, 'Varad Deshpande', 'Female', 'varaddeshpande@gmail.com', 11109),
(121066, 'Ravindra Jain', 'Female', 'jainravi1104@gmail.com', 12106),
(121067, 'Sankalp Gupta', 'Female', 'sankalpgupta993@gmail.com', 12106),
(121068, 'Manasi Puranik', 'Female', 'manasi31@yahoo.co.in', 12106),
(121069, 'Swarashri Chaudhari', 'Female', 'swarshri1@gmail.com', 12106),
(121076, 'Tejashree Amberkar', 'Female', 'tejuamberkar@yahoo.co.in', 12107),
(121077, 'Kaushik  Kale', 'Female', 'kaushik.kale26@gmail.com', 12107),
(121078, 'Ayyappan Konar', 'Female', 'konar.ayyappan001@gmail.com', 12107),
(121079, 'Vivek Mankar', 'Female', 'vivekmankar94@gmail.com', 12107),
(910610, 'Akshay Muraleedharan', 'Male', 'nambiarakshay95@gmail.com', 9106),
(910611, 'Vishal Chaudhari', 'Male', 'vishalhack5239@gmail.com', 9106),
(910612, 'Medida Vishal', 'Male', 'vishalmedida067@gmail.com', 9106),
(910710, 'Manali Dewal', 'Male', 'manali.dewal@yahoo.co.in', 9107),
(910711, 'Neha Bagle', 'Male', 'neha2894@gmail.com', 9107),
(910712, 'Aishwarya S', 'Male', 'aishu2230@yahoo.co.in', 9107),
(910810, 'Aasawari Kale', 'Male', 'asawarikale937@yahoo.com', 9108),
(910811, 'Priyanka Jadhav', 'Male', 'priyanka29381@yahoo.com', 9108),
(910910, 'SANCHIT NEVGI', 'Male', 'sanchit.nevgi@gmail.com', 9109),
(910911, 'TILAK VAIDYA', 'Male', 'tilak04@gmail.com', 9109),
(910912, 'MAITRI VASA', 'Male', 'vishalpkothavade@gmail.com', 9109),
(1010610, 'AKSHAY PATIL', 'Male', 'yashodipt@gmail.com', 10106),
(1010611, 'PRATHAMESH PATIL', 'Male', 'neela.mani94@gmail.com', 10106),
(1010612, 'SUSHANT PATKAR', 'Male', 'sai.sidhu129@gmail.com', 10106),
(1010613, 'ROHAN GHUGE', 'Male', 'rohan6694@hotmail.com', 10106),
(1010614, 'SNEHAL SANGHVI', 'Male', 'dhirajpatel38@gmail.cokm', 10106),
(1010615, 'VARAD RAUT', 'Male', 'kmadav37@gmail.com', 10106),
(1010710, 'HARSH DOSHI', 'Male', 'iamamitk@redifmail.com', 10107),
(1010711, 'JUTESH PARMAR', 'Male', 'sgahi@hotka.com', 10107),
(1010712, 'KHAN ISRAL AHMED', 'Male', 'sahi.abhy@gmail.com', 10107),
(1010713, 'PARAS.D', 'Male', 'anuj.sali4@gmail.com', 10107),
(1010714, 'AKANSHA BAGALE', 'Male', 'javad@standardeon.com', 10107),
(1010715, 'SONAL GAIKWAD', 'Male', 'siddharth.lodha4@gmail.com', 10107),
(1010716, 'RAHUL', 'Male', 'galerohan1610@gmail.com', 10107),
(1010717, 'NEHA DALPE', 'Male', 'sangitabansode@yahoo.com', 10107),
(1010810, 'TRUPTI KAMBLE ', 'Male', 'rampradhan123@yahoo.com', 10108),
(1010811, 'KHYATI PATEL', 'Male', 'yash.patil1000@gmail.com', 10108),
(1010812, 'ADITI MUKHTYAR', 'Male', 'pspranits10494@gmail.com', 10108),
(1010813, 'HASHIR KHAN', 'Male', 'vaibhav9478@gmail.com', 10108),
(1010814, 'SHREYAS PAI', 'Male', 'SHREYASPAI.24@GMAIL.COM', 10108),
(1010815, 'PRATIK PATEL', 'Male', 'PRATIKPATEL936@YAHOO.COM', 10108),
(1010910, 'KARAN VARADE', 'Male', 'KARANVARADE007@GMAIL.COM', 10109),
(1010911, 'MOHIT KAWALE', 'Male', 'MOHITKAWALE@YAHOO.IN', 10109),
(1010912, 'AKSHAY GHOLAP', 'Male', 'AKSHAYGHOLAP@GMAIL.', 10109),
(1110610, 'Mohit Gurnani', 'Male', 'mohitgurnani@gmail.com', 11106),
(1110611, 'Neena Wagle', 'Male', 'wagleneena@gmail.com', 11106),
(1110710, 'Shubham Gulhane', 'Female', 'shubhamgulhane123@gmail.com', 11107),
(1110711, 'Shubham S. Choudhari', 'Female', 'shubhssc@gmail.com', 11107),
(1110810, 'Chetan Murpani', 'Female', 'chetanmurpani@yahoo.co.in', 11108),
(1110811, 'Girish Kolapkar', 'Female', 'chetanmurpai@yahoo.co.in', 11108),
(1110812, 'Hirdai Sawnani', 'Female', 'hirdaisawnani@gmail.com', 11108),
(1110910, 'Gagandeep Kalshi', 'Female', 'ggndpkalshi@gmail.com', 11109),
(1110911, 'Sagar Patil', 'Female', 'mayur.ing3@gmail.com', 11109),
(1210610, 'Priyanka Shinde', 'Female', 'risenshine_shinde.shinde50@gmail.com', 12106),
(1210611, 'Velambath Kishan', 'Female', 'karanbvelambath@gmail.com', 12106),
(1210612, 'Swapneel Trimbake', 'Female', 'swapneel.trimbake@gmail.com', 12106),
(1210710, 'Ruturaj Kukade', 'Female', 'kalesh@rocketmail.com', 12107),
(12107004, 'Saurav Sagane', 'Female', 'sauravsagane@rediffmail.com', 12107),
(91060001, 'Anshuman Singh', 'Male', 'starsingh777@gmail.com', 9106),
(91060002, 'Kewal Shah', 'Male', 'kwlshahz@gmail.com', 9106),
(91060003, 'Vatsal Shah', 'Male', 'coolvtsl@yahoo.com', 9106),
(91060004, 'Ankit Nimbolkar', 'Male', 'ankit.nimbolkar@gamil.com', 9106),
(91060005, 'Pradeep Sabade', 'Male', 'rudrarkrishna12@gmail.com', 9106),
(91060119, 'Shubham Moon', 'Male', 'moon.shubhamz@gmail.com', 9106),
(91070001, 'Melroy Tellis', 'Male', 'mel.tellis@gmail.com', 9107),
(91070002, 'Dhiraj Patil', 'Male', 'dhiraj.patil@rocketmail.com', 9107),
(91070003, 'Aniket Patel', 'Male', 'aniket10051994@gmail.com', 9107),
(91070004, 'Akash Chopade', 'Male', 'akashchopade82@yahoo.com', 9107),
(91070005, 'Abhishek Suryavanshi', 'Male', 'dipak.shinde617@gmail.com', 9107),
(91070054, 'Gurumurthy', 'Male', 'tusharj887@gmail.com', 9107),
(91070067, 'Swapnil Patel', 'Male', 'tusharjain887@gmail.com', 9107),
(91070087, 'Dhwani Thakkar', 'Female', 'chilukarakesh123@gmail.com', 9107),
(91080001, 'Kanchi Masalia', 'Male', 'kani.masalia@gmail.com', 9108),
(91080002, 'Shreya Shah', 'Male', 'shahshreya2108@gmail.com', 9108),
(91080003, 'Vaibhav Khaire', 'Male', 'vaibhavkhaire007@gmail.com', 9108),
(91080004, 'Asmita Sonje', 'Male', 'asonje@gmail.com', 9108),
(91080005, 'Chaitra Jambigi', 'Male', 'chaitra.jambigi@yahoo.co.in', 9108),
(91090001, 'Trushik Patel', 'Male', 'trushik28@yahoo.com', 9109),
(91090002, 'Sagar Patel', 'Male', 'sagar31594@yahoo.com', 9109),
(91090003, 'SAGAR PATEL', 'Male', 'sagar31594@yahoo.com', 9109),
(91090004, 'RAHUL CHAVAN', 'Male', 'rahuldc94@gmail.com', 9109),
(91090005, 'TRUSHIK PATEL', 'Male', 'trushik28@yahoo.com', 9109),
(101060001, 'SAGAR NIRGUDKAR', 'Male', 'atik100@gmail.com', 10106),
(101060002, 'ADITYA NARAYANAN', 'Male', 'sameer.agrawal2011@gmail.com', 10106),
(101060003, 'NAISHI JAIN', 'Male', 'nimish94@yahoo.co.in', 10106),
(101060004, 'ASHLESHA PATANAKAR', 'Male', 'ndubey01@gmail.com', 10106),
(101060005, 'TANUSHREE JOSHI ', 'Male', 'adityadabak@yahoo.co.in', 10106),
(101070001, 'SAHIL ', 'Male', 'vaibhav07.raut@gmail.com', 10107),
(101070002, 'SIDDESH WAJE', 'Male', 'dipeshbhusara@gmail.com', 10107),
(101070003, 'TEJAS MESHRAM', 'Male', 'priyank@hotmail.com', 10107),
(101070004, 'SUDARSHAN PANKE', 'Male', 'yogeshpawar126@yahoo.in', 10107),
(101070005, 'AKSHAY PATIL', 'Male', 'yash_vora130@yahoo.co.in', 10107),
(101080001, 'VENEELI SONONE', 'Male', 'parimal.patil511@gmail.com', 10108),
(101080002, 'NEHA PATIL', 'Male', 'abhishekmahajan44@gmail.com', 10108),
(101080003, 'SEEMA KOHLI', 'Male', 'ganeshwadate47@gmail.com', 10108),
(101080004, 'PREETI NAYAK', 'Male', 'ghimosh@yahoo.com', 10108),
(101080005, 'ANKITA POTNIS', 'Male', 'anand_d@rocketmail.com', 10108),
(101080007, 'Akshay Puntamb', 'Male', '101080007@localhost', 10108),
(101080009, 'Rakesh Chiluka', 'Male', '101080009@localhost', 10108),
(101080019, 'Swapnil Surve', 'Male', 'swap@gmail.com', 10108),
(101080021, 'Maharshi Singh', 'Male', '101080021@localhost', 10108),
(101080030, 'Tushar Jain', 'Male', '101080030@localhost', 10108),
(101080033, 'Kiran Sable', 'Male', 'tusharj887@gmail.com', 10108),
(101080035, 'Sumedh', 'Male', 'tusharj887@gmail.com', 10108),
(101080079, 'main', 'Male', 'mm@gmail.com', 10108),
(101090001, 'MAYUR SONWANE', 'Male', 'sanketp12@gmail.com', 10109),
(101090002, 'ABHIJEET', 'Male', 'sachdranzer@yahoo.com', 10109),
(101090003, 'SURAJ PALWE', 'Male', 'skunal222@gmail.com', 10109),
(101090004, 'PRASAD VADNERE', 'Male', 'sbharte88@gmail.com', 10109),
(101090005, 'PRASHIK HANDE', 'Male', 'PRASHIK.HANDE@GMAIL.COM', 10109),
(101090027, 'sga', 'Male', '101090027@localhost', 10109),
(101090034, 'Ashish Chavan', 'Male', 'tusharj887@gmail.com', 10109),
(101090044, 'Deep Shah', 'Male', 'tusharjain887@gmail.com', 10109),
(101090050, 'Chaitanya Phalak', 'Male', 'tusharj887@gmail.com', 10109),
(111060001, 'Anish Shah', 'Male', 'koolshah05@gmail.com', 11106),
(111060002, 'Dhanika Sujan', 'Male', 'dhanika.sujan@hotmail.com', 11106),
(111060003, 'Eashan V. Kadam', 'Male', 'eashankadam@gmail.com', 11106),
(111060004, 'Jash A. Gala', 'Male', 'jasharvindgala@gmail.com', 11106),
(111060005, 'Jaydeep Pawar', 'Male', 'jdppawar@gmail.com', 11106),
(111070001, 'Prapti Verma', 'Female', 'praptiv@yahoo.co.in', 11107),
(111070002, 'Pratik Shyamkul', 'Female', 'pratik.shyamkul@yahoo.com', 11107),
(111070003, 'Ritwik Patnekar', 'Female', 'ritwik_291194@yahoo.co.in', 11107),
(111070004, 'Rush Sangs', 'Female', 'rush.sang@gmail.com', 11107),
(111070005, 'Sagar Chaudhari', 'Female', 'rdshah171@gmail.com', 11107),
(111080001, 'Tushar G. Rathod', 'Female', 'tushrathod007@gmail.com', 11108),
(111080002, 'Abhilash Wayal', 'Female', 'abhilashwayal6@gmail.com', 11108),
(111080003, 'Abhishek .S', 'Female', 'abhisheks1812@gmail.com', 11108),
(111080004, 'Abhishek Rangari', 'Female', 'rangariabhi@gmail.com', 11108),
(111080005, 'Abhishek Sawarkar', 'Female', 'sawarkar_abhi@yahoo.com', 11108),
(111080022, 'Akshay Shah', 'Male', 'tusharj887@gmail.com', 11108),
(111080056, 'Neha Joshi', 'Female', 'chilukarakesh123@gmail.com', 11108),
(111080067, 'Alok Joshi', 'Male', 'tusharjain887@gmail.com', 11108),
(111090001, 'Pragya Sharma', 'Female', 'angelmini_19@yahoo.co.in', 11109),
(111090002, 'Prithviraj Patil', 'Female', 'patil.prithviraj111@gmail.com', 11109),
(111090003, 'Saee Pansare', 'Female', 'queensaee@gmail.com', 11109),
(111090004, 'Shrikant Bharsakle', 'Female', 'shrikantbharsakle@gmail.com', 11109),
(111090005, 'Shruti Sundaram', 'Female', 'shruti.smartly.94@gmail.com', 11109),
(121060001, 'Akshay Patil', 'Female', 'akshay.patil175@gmail.com', 12106),
(121060002, 'Akhil Kamble', 'Female', 'kambleakhil@gmail.com', 12106),
(121060003, 'Prashil Patil', 'Female', 'prashil.patil143@gmail.com', 12106),
(121060004, 'Kiran Awari', 'Female', 'kiran.awari.562@facebook.com', 12106),
(121060005, 'Vedant Patil', 'Female', '121060005@localhost', 12106),
(121060034, 'Pratik Kadam', 'Male', 'tusharjain887@gmail.com', 12106),
(121060045, 'Sneha Shah', 'Female', 'chilukarakesh123@gmail.com', 12106),
(121060067, 'Madhura Shah', 'Female', 'tusharj887@gmail.com', 12106),
(121070001, 'Swaroop Punse', 'Female', 'punse.swaroop@gmail.com', 12107),
(121070002, 'Nikhil Dhundale', 'Female', 'dhundalen@gmail.com', 12107),
(121070003, 'Pratik Talele', 'Female', 'talelepratik1994@gmail.com', 12107),
(121070005, 'Prashant Gaikar', 'Female', 'prashantpgaikar@yahoo.com', 12107),
(121080001, 'Pratik Pokharkar', 'Female', 'pratik_pokharkar@yahoo.com', 12108),
(121080002, 'Rushikesh Bhosale', 'Female', 'rushikeshjb.26@gmail.com', 12108),
(121080003, 'Saheb More', 'Female', 'sahebmore4@gmail.com', 12108),
(121080004, 'Akshay Nawalkar', 'Female', 'nawalkar.akshay@yahoo.in', 12108),
(121080005, 'Sushant Nagargoje', 'Female', 'sushantn212@gmail.com', 12108),
(121080006, 'Pranay Patil', 'Female', 'chaudharisarveh@gmail.com', 12108),
(121080007, 'Sarvesh Chaudhari', 'Female', 'chaudharisarvesh@gmail.com', 12108),
(121080008, 'Chaitali Pawar', 'Female', 'chaitalipawarrocks@gmail.com', 12108),
(121080009, 'Kishan Parihar', 'Female', 'kishanparihar1948@gmail.com', 12108);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `blog_comments`
--
ALTER TABLE `blog_comments`
  ADD CONSTRAINT `blog_comments_ibfk_1` FOREIGN KEY (`article_id`) REFERENCES `blog_articles` (`article_id`) ON DELETE CASCADE;

--
-- Constraints for table `course_assignments`
--
ALTER TABLE `course_assignments`
  ADD CONSTRAINT `course_assignments_ibfk_1` FOREIGN KEY (`course_id`) REFERENCES `courses` (`course_id`) ON DELETE CASCADE;

--
-- Constraints for table `event_comments`
--
ALTER TABLE `event_comments`
  ADD CONSTRAINT `event_comments_ibfk_1` FOREIGN KEY (`event_id`) REFERENCES `events` (`event_id`) ON DELETE CASCADE;

--
-- Constraints for table `forum_replies`
--
ALTER TABLE `forum_replies`
  ADD CONSTRAINT `forum_replies_ibfk_1` FOREIGN KEY (`topic_id`) REFERENCES `forum_topics` (`topic_id`) ON DELETE CASCADE;

--
-- Constraints for table `registered_students`
--
ALTER TABLE `registered_students`
  ADD CONSTRAINT `registered_students_ibfk_1` FOREIGN KEY (`student_id`) REFERENCES `users` (`student_id`) ON DELETE CASCADE;

--
-- Constraints for table `submission`
--
ALTER TABLE `submission`
  ADD CONSTRAINT `submission_ibfk_1` FOREIGN KEY (`course_id`) REFERENCES `course_assignments` (`course_id`) ON DELETE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
