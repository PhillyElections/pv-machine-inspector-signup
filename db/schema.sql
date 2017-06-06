CREATE TABLE IF NOT EXISTS `[[db_prefix]]pv_mi_signups` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `division` int(4) unsigned NOT NULL DEFAULT 0,
  `first_name` varchar(40) NOT NULL DEFAULT '',
  `middle_name` varchar(40) DEFAULT NULL,
  `last_name` varchar(40) NOT NULL DEFAULT '',
  `address1` varchar(100) NOT NULL DEFAULT '',
  `address2` varchar(100) DEFAULT NULL,
  `city` varchar(100) NOT NULL DEFAULT '',
  `region` varchar(100) NOT NULL DEFAULT '',
  `postcode` varchar(100) NOT NULL DEFAULT '',
  `email` varchar(100) NOT NULL DEFAULT '',
  `phone` varchar(100) NOT NULL DEFAULT '',
  `published` tinyint(1) unsigned NOT NULL DEFAULT 0,
  `created` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
);