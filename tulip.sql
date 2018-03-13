----------Users------------

CREATE TABLE IF NOT EXISTS `users` (
`id` int(11) AUTO_INCREMENT PRIMARY KEY NOT NULL,
  `ip_address` varchar(45) NOT NULL,
  `username` varchar(100) DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `salt` varchar(255) DEFAULT NULL,
  `email` varchar(100) NOT NULL,
  `activation_code` varchar(40) DEFAULT NULL,
  `forgotten_password_code` varchar(40) DEFAULT NULL,
  `forgotten_password_time` int(11) unsigned DEFAULT NULL,
  `remember_code` varchar(40) DEFAULT NULL,
  `created_on` int(11) unsigned NOT NULL,
  `last_login` int(11) unsigned DEFAULT NULL,
  `active` tinyint(1) unsigned DEFAULT NULL,
  `first_name` varchar(50) DEFAULT NULL,
  `last_name` varchar(50) DEFAULT NULL,
  `company` varchar(100) DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL
) ENGINE=InnoDB;

INSERT INTO `users` (`id`, `ip_address`, `username`, `password`, `salt`, `email`, `activation_code`, `forgotten_password_code`, `forgotten_password_time`, `remember_code`, `created_on`, `last_login`, `active`, `first_name`, `last_name`, `company`, `phone`) VALUES
(1, '127.0.0.1', 'administrator', '$2y$08$V/mmPu65l8pQ5qEYT6KMH.LkmaWZVpWRHOs7vxk6s57w7zygBEqpm', '', 'admin@admin.com', '', NULL, NULL, 'qjsdI59v1BjR4h5vB5kXC.', 1268889823, 1511875674, 1, 'Admin', '', 'ADMIN', '0');


----------Groups------------

CREATE TABLE IF NOT EXISTS `groups` (
`id` mediumint(8) AUTO_INCREMENT PRIMARY KEY NOT NULL,
  `name` varchar(20) NOT NULL,
  `description` varchar(100) NOT NULL
) ENGINE=InnoDB;

INSERT INTO `groups` (`id`, `name`, `description`) VALUES
(1, 'admin', 'Administrator'),
(2, 'members', 'General User');


----------Users Groups------------

CREATE TABLE IF NOT EXISTS `users_groups` (
`id` int(11) unsigned AUTO_INCREMENT PRIMARY KEY NOT NULL,
  `user_id` int(11) unsigned NOT NULL,
  `group_id` mediumint(8) unsigned NOT NULL
) ENGINE=InnoDB;

INSERT INTO `users_groups` (`id`, `user_id`, `group_id`) VALUES
(3, 1, 1);


----------Login Attempts------------

CREATE TABLE IF NOT EXISTS `login_attempts` (
`id` int(11) unsigned AUTO_INCREMENT PRIMARY KEY NOT NULL,
  `ip_address` varchar(15) NOT NULL,
  `login` varchar(100) NOT NULL,
  `time` int(11) unsigned DEFAULT NULL
) ENGINE=InnoDB;


----------NAV Master------------

CREATE TABLE IF NOT EXISTS `nav_master` (
`nav_id` int(11) AUTO_INCREMENT PRIMARY KEY NOT NULL,
  `nav_name` varchar(100) NOT NULL,
  `nav_icon` varchar(50) NOT NULL,
  `nav_url` varchar(100) NOT NULL,
  `nav_status` int(11) NOT NULL,
  `nav_entrydt` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB;


----------Site Management------------

CREATE TABLE IF NOT EXISTS `site_detail` (
  `site_id` int(11) AUTO_INCREMENT PRIMARY KEY NOT NULL,
  `site_name` varchar(200) NOT NULL,
  `site_banner` varchar(200) NOT NULL,
  `site_manager_name` varchar(200) NULL,
  `site_manager_no` varchar(10) NULL,
  `site_address` varchar(200) NULL,
  `site_remark` text NULL,
  `site_status` int(11) Default 1,
  `site_added_by` int(11) NOT NULL,
  `site_entrydt` datetime
) ENGINE=InnoDB;


----------Site Other Detail------------

CREATE TABLE IF NOT EXISTS `site_other_detail` (
  `detail_id` int(11) AUTO_INCREMENT PRIMARY KEY NOT NULL,
  `detail_site_id` int(11) NOT NULL,
  `detail_sector` varchar(200) NOT NULL,
  `detail_type` enum('Plots','Flats','Houses') NOT NULL,
  `detail_no_of_units` int(11) NULL,
  `detail_area` int(10) NULL,
  `detail_rate` decimal(12,2) NULL,
  `detail_price` decimal(12,2) NULL,
  `detail_site_nos` text NULL,
  `detail_status` enum('Available','Hold','Booked','Sold'),
  `detail_isactive` int(11) Default 1,
  `detail_added_by` int(11) NOT NULL,
  `detail_entrydt` datetime,
   foreign key(detail_site_id) references site_detail(site_id) on update cascade
) ENGINE=InnoDB;


----------List of Properties------------

CREATE TABLE IF NOT EXISTS `property_detail` (
  `property_id` int(11) AUTO_INCREMENT PRIMARY KEY NOT NULL,
  `property_site_id` int(11) NOT NULL,
  `property_detail_id` int(11) NOT NULL,
  `property_sno` varchar(20) NOT NULL,
  `property_sold_to` int(11) NOT NULL,
  `property_status` enum('Available','Hold','Booked','Sold'),
  `property_isactive` int(11) Default 1,
   foreign key(property_site_id) references site_detail(site_id) on update cascade,
   foreign key(property_detail_id) references site_other_detail(detail_id) on update cascade
) ENGINE=InnoDB;


----------Expense Heads------------

CREATE TABLE IF NOT EXISTS `expense_category` (
`cat_id` int(11) AUTO_INCREMENT PRIMARY KEY NOT NULL,
  `cat_name` varchar(100) NOT NULL,
  `cat_desc` varchar(100) NOT NULL,
  `cat_status` int(11) NOT NULL,
  `cat_added_by` int(11) NOT NULL,
  `cat_entrydt` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB;


----------Vendors------------

CREATE TABLE IF NOT EXISTS `vendor_master` (
`vendor_id` int(11) AUTO_INCREMENT PRIMARY KEY NOT NULL,
  `vendor_name` varchar(200) DEFAULT NULL,
  `vendor_firm_name` varchar(250) DEFAULT NULL,
  `vendor_contact_no` varchar(10) DEFAULT NULL,
  `vendor_email_id` varchar(50) DEFAULT NULL,
  `vendor_tin_no` varchar(20) DEFAULT NULL,
  `vendor_gstn_no` varchar(20) DEFAULT NULL,
  `vendor_address` text,
  `vendor_benificiary_name` varchar(255) DEFAULT NULL,
  `vendor_bank_name` varchar(200) DEFAULT NULL,
  `vendor_branch_name` varchar(200) DEFAULT NULL,
  `vendor_acc_no` varchar(50) DEFAULT NULL,
  `vendor_ifsc_code` varchar(20) DEFAULT NULL,
  `vendor_status` int(11) NOT NULL DEFAULT '1',
  `vendor_added_by` int(11) NOT NULL,
  `vendor_entrydt` datetime
) ENGINE=InnoDB;


----------Vendor Payment------------

CREATE TABLE IF NOT EXISTS `vendor_ledger` (
`ledger_id` int(11) AUTO_INCREMENT PRIMARY KEY NOT NULL,
  `ledger_site_id` int(11) DEFAULT NULL,
  `ledger_vendor_id` int(11) DEFAULT NULL,
  `ledger_type` varchar(100) DEFAULT NULL,
  `ledger_voucher_no` varchar(200) DEFAULT NULL,
  `ledger_voucher_image` varchar(200) DEFAULT NULL,
  `ledger_goods_name` varchar(200) DEFAULT NULL,
  `ledger_unit` varchar(20) DEFAULT NULL,
  `ledger_qty` int(11) DEFAULT NULL,
  `ledger_rate` decimal(12,2) DEFAULT NULL,
  `ledger_amount` decimal(12,2) DEFAULT NULL,
  `ledger_discount` decimal(12,2) DEFAULT NULL,
  `ledger_payable_amt` decimal(12,2) DEFAULT NULL,
  `ledger_paid_amt` decimal(12,2) DEFAULT NULL,
  `ledger_balance_amt` decimal(12,2) DEFAULT NULL,
  `ledger_payment_date` date DEFAULT NULL,
  `ledger_payment_type` varchar(200) DEFAULT NULL,
  `ledger_cheque_dd_no` varchar(200) DEFAULT NULL,
  `ledger_remark` text,
  `ledger_status` int(11) NOT NULL DEFAULT '1',
  `ledger_added_by` int(11),
  `ledger_entrydt` datetime
) ENGINE=InnoDB;

----------Vendor Partial Payment------------

CREATE TABLE IF NOT EXISTS `vendor_partial_payment` (
  `partial_id` int(11) AUTO_INCREMENT PRIMARY KEY NOT NULL,
  `partial_type` varchar(100) DEFAULT NULL,
  `partial_ledger_id` int(11) DEFAULT NULL,
  `partial_date` date DEFAULT NULL,
  `partial_amt` decimal(12,2) DEFAULT NULL,
  `partial_payment_type` varchar(200) DEFAULT NULL,
  `partial_cheque_dd_no` varchar(200) DEFAULT NULL,
  `partial_remark` text,
  `partial_status` int(11) NOT NULL DEFAULT '1',
  `partial_added_by` int(11),
  `partial_entrydt` datetime
) ENGINE=InnoDB;

----------Transactions------------

CREATE TABLE IF NOT EXISTS `company_account_fund_transfer` (
  `transfer_id` int(11) AUTO_INCREMENT PRIMARY KEY NOT NULL,
  `transfer_from` int(11) DEFAULT NULL,
  `transfer_to` int(11) DEFAULT NULL,
  `transfer_perpose` varchar(255) DEFAULT NULL,
  `transfer_date` date DEFAULT NULL,
  `transfer_amt` decimal(12,2) DEFAULT NULL,
  `transfer_receipt` varchar(200) DEFAULT NULL,
  `transfer_payment_type` varchar(200) DEFAULT NULL,
  `transfer_cheque_dd_no` varchar(200) DEFAULT NULL,
  `transfer_remark` text,
  `transfer_status` int(11) NOT NULL DEFAULT '1',
  `transfer_added_by` int(11),
  `transfer_entrydt` datetime
) ENGINE=InnoDB;

----------Company Accounts------------

CREATE TABLE `accounts` (
  `acc_id` int(11) AUTO_INCREMENT PRIMARY KEY NOT NULL,
  `acc_name` varchar(100) NOT NULL,
  `acc_short_name` varchar(50) NOT NULL,
  `acc_balance` decimal(15,2) NOT NULL,
  `acc_status` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

----------Company Bank Accounts------------

CREATE TABLE `company_bank_accounts` (
  `bank_id` int(11) AUTO_INCREMENT PRIMARY KEY NOT NULL,
  `bank_name` varchar(100) NOT NULL,
  `bank_branch_name` varchar(100) NOT NULL,
  `bank_ifsc_code` varchar(20) NOT NULL,
  `bank_acc_no` varchar(50) NOT NULL,
  `bank_status` int(11) NOT NULL DEFAULT '1',
  `bank_added_by` int(11),
  `bank_entrydt` datetime
) ENGINE=InnoDB;
