# ************************************************************
# Sequel Pro SQL dump
# Version 4541
#
# http://www.sequelpro.com/
# https://github.com/sequelpro/sequelpro
#
# Host: 127.0.0.1 (MySQL 5.7.20)
# Database: onlinecardb
# Generation Time: 2018-02-15 00:41:50 +0000
# ************************************************************


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


# Dump of table car_status
# ------------------------------------------------------------

DROP TABLE IF EXISTS `car_status`;

CREATE TABLE `car_status` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `car_id` int(11) NOT NULL,
  `status_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

LOCK TABLES `car_status` WRITE;
/*!40000 ALTER TABLE `car_status` DISABLE KEYS */;

INSERT INTO `car_status` (`id`, `car_id`, `status_id`, `created_at`, `updated_at`)
VALUES
	(1,1,1,'2018-02-14 16:27:40','2018-02-14 16:27:40'),
	(2,2,1,'2018-02-14 16:27:45','2018-02-14 16:27:45');

/*!40000 ALTER TABLE `car_status` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table cars
# ------------------------------------------------------------

DROP TABLE IF EXISTS `cars`;

CREATE TABLE `cars` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `originator_id` int(10) unsigned NOT NULL,
  `assignee_id` int(10) unsigned NOT NULL,
  `source_id` int(10) unsigned NOT NULL,
  `classification_id` int(10) unsigned NOT NULL,
  `document_no` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

LOCK TABLES `cars` WRITE;
/*!40000 ALTER TABLE `cars` DISABLE KEYS */;

INSERT INTO `cars` (`id`, `originator_id`, `assignee_id`, `source_id`, `classification_id`, `document_no`, `description`, `created_at`, `updated_at`, `deleted_at`)
VALUES
	(1,1,7,5,1,NULL,'Dramatically utilize end-to-end markets before future-proof human capital. Rapidiously reintermediate integrated partnerships through progressive core competencies. Interactively','2018-02-14 06:57:52','2018-02-14 06:57:52',NULL),
	(2,1,5,4,1,NULL,'Professionally facilitate economically sound intellectual capital via premium scenarios. Uniquely brand enterprise-wide applications vis-a-vis flexible schemas. Globally orchestrate cross functional vortals without go forward systems.','2018-02-14 08:11:23','2018-02-14 08:11:23',NULL);

/*!40000 ALTER TABLE `cars` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table classifications
# ------------------------------------------------------------

DROP TABLE IF EXISTS `classifications`;

CREATE TABLE `classifications` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

LOCK TABLES `classifications` WRITE;
/*!40000 ALTER TABLE `classifications` DISABLE KEYS */;

INSERT INTO `classifications` (`id`, `title`, `created_at`, `updated_at`)
VALUES
	(1,'Complaint','2018-02-14 06:56:27','2018-02-14 06:56:27'),
	(2,'Accident','2018-02-14 06:56:27','2018-02-14 06:56:27'),
	(3,'Security Report','2018-02-14 06:56:27','2018-02-14 06:56:27'),
	(4,'Non-conformance','2018-02-14 06:56:27','2018-02-14 06:56:27');

/*!40000 ALTER TABLE `classifications` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table migrations
# ------------------------------------------------------------

DROP TABLE IF EXISTS `migrations`;

CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;

INSERT INTO `migrations` (`id`, `migration`, `batch`)
VALUES
	(261,'2014_10_12_000000_create_users_table',1),
	(262,'2014_10_12_100000_create_password_resets_table',1),
	(263,'2018_02_05_024149_entrust_setup_tables',1),
	(264,'2018_02_08_053716_create_cars_table',1),
	(265,'2018_02_08_061926_create_statuses_table',1),
	(266,'2018_02_08_062342_create_car_status_table',1),
	(267,'2018_02_08_070847_create_sources_table',1),
	(268,'2018_02_08_070913_create_classifications_table',1),
	(269,'2018_02_13_055339_create_notifications_table',1),
	(270,'2018_02_14_060050_create_notifiables_table',1);

/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table notifiables
# ------------------------------------------------------------

DROP TABLE IF EXISTS `notifiables`;

CREATE TABLE `notifiables` (
  `notification_id` int(10) unsigned NOT NULL,
  `notifiable_id` int(10) unsigned NOT NULL,
  `notifiable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `seen` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

LOCK TABLES `notifiables` WRITE;
/*!40000 ALTER TABLE `notifiables` DISABLE KEYS */;

INSERT INTO `notifiables` (`notification_id`, `notifiable_id`, `notifiable_type`, `seen`, `created_at`, `updated_at`)
VALUES
	(1,7,'App\\User',0,NULL,NULL),
	(1,5,'App\\User',0,NULL,NULL);

/*!40000 ALTER TABLE `notifiables` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table notification_user
# ------------------------------------------------------------

DROP TABLE IF EXISTS `notification_user`;

CREATE TABLE `notification_user` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(10) unsigned NOT NULL,
  `car_id` int(10) unsigned NOT NULL,
  `visited` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;



# Dump of table notifications
# ------------------------------------------------------------

DROP TABLE IF EXISTS `notifications`;

CREATE TABLE `notifications` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

LOCK TABLES `notifications` WRITE;
/*!40000 ALTER TABLE `notifications` DISABLE KEYS */;

INSERT INTO `notifications` (`id`, `title`, `created_at`, `updated_at`)
VALUES
	(1,'New CAR pending for acceptance','2018-02-14 06:56:27','2018-02-14 06:56:27'),
	(2,'CAR has been accepted and ready for response','2018-02-14 06:56:27','2018-02-14 06:56:27'),
	(3,'CAR’s solutions has been provided','2018-02-14 06:56:27','2018-02-14 06:56:27'),
	(4,'CAR’s solutions has approved by originator','2018-02-14 06:56:27','2018-02-14 06:56:27'),
	(5,'CAR’s is ready for acceptance','2018-02-14 06:56:27','2018-02-14 06:56:27'),
	(6,'CAR’s is ready for effectiveness checking','2018-02-14 06:56:27','2018-02-14 06:56:27'),
	(20,'Disapproved - CAR has been rejected','2018-02-14 06:56:27','2018-02-14 06:56:27'),
	(21,'Reject - CAR has been rejected by the admin','2018-02-14 06:56:27','2018-02-14 06:56:27'),
	(22,'Disapproved - CAR’s solution needs to revise','2018-02-14 06:56:27','2018-02-14 06:56:27');

/*!40000 ALTER TABLE `notifications` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table password_resets
# ------------------------------------------------------------

DROP TABLE IF EXISTS `password_resets`;

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;



# Dump of table permission_role
# ------------------------------------------------------------

DROP TABLE IF EXISTS `permission_role`;

CREATE TABLE `permission_role` (
  `permission_id` int(10) unsigned NOT NULL,
  `role_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`permission_id`,`role_id`),
  KEY `permission_role_role_id_foreign` (`role_id`),
  CONSTRAINT `permission_role_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `permission_role_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;



# Dump of table permissions
# ------------------------------------------------------------

DROP TABLE IF EXISTS `permissions`;

CREATE TABLE `permissions` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `display_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `permissions_name_unique` (`name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

LOCK TABLES `permissions` WRITE;
/*!40000 ALTER TABLE `permissions` DISABLE KEYS */;

INSERT INTO `permissions` (`id`, `name`, `display_name`, `description`, `created_at`, `updated_at`)
VALUES
	(1,'role-create','Create Role','Create New Role','2018-02-14 06:56:27','2018-02-14 06:56:27'),
	(2,'role-read','Display Role Listing','See listings of role','2018-02-14 06:56:27','2018-02-14 06:56:27'),
	(3,'role-edit','Edit Role','Edit Role','2018-02-14 06:56:27','2018-02-14 06:56:27'),
	(4,'role-delete','Delete Role','Delete Role','2018-02-14 06:56:27','2018-02-14 06:56:27'),
	(5,'car-create','Create CAR','Create New CAR','2018-02-14 06:56:27','2018-02-14 06:56:27'),
	(6,'car-read','Display CAR Listing','See listings of CAR','2018-02-14 06:56:27','2018-02-14 06:56:27'),
	(7,'car-edit','Edit CAR','Edit CAR','2018-02-14 06:56:27','2018-02-14 06:56:27'),
	(8,'car-delete','Delete CAR','Delete CAR','2018-02-14 06:56:27','2018-02-14 06:56:27');

/*!40000 ALTER TABLE `permissions` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table role_user
# ------------------------------------------------------------

DROP TABLE IF EXISTS `role_user`;

CREATE TABLE `role_user` (
  `user_id` int(10) unsigned NOT NULL,
  `role_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`user_id`,`role_id`),
  KEY `role_user_role_id_foreign` (`role_id`),
  CONSTRAINT `role_user_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `role_user_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

LOCK TABLES `role_user` WRITE;
/*!40000 ALTER TABLE `role_user` DISABLE KEYS */;

INSERT INTO `role_user` (`user_id`, `role_id`)
VALUES
	(5,1),
	(4,2),
	(5,3),
	(6,3),
	(7,3),
	(1,4),
	(2,4),
	(3,4);

/*!40000 ALTER TABLE `role_user` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table roles
# ------------------------------------------------------------

DROP TABLE IF EXISTS `roles`;

CREATE TABLE `roles` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `display_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `roles_name_unique` (`name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

LOCK TABLES `roles` WRITE;
/*!40000 ALTER TABLE `roles` DISABLE KEYS */;

INSERT INTO `roles` (`id`, `name`, `display_name`, `description`, `created_at`, `updated_at`)
VALUES
	(1,'superadmin','Super admin','Root','2018-02-14 06:56:27','2018-02-14 06:56:27'),
	(2,'admin','User Administrator','User is allowed to manage and edit users, cars and other settings.','2018-02-14 06:56:27','2018-02-14 06:56:27'),
	(3,'assignee','Assignee/Unit Head','Assignee or the Unit Head','2018-02-14 06:56:27','2018-02-14 06:56:27'),
	(4,'originator','Originator','Originator','2018-02-14 06:56:27','2018-02-14 06:56:27');

/*!40000 ALTER TABLE `roles` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table sources
# ------------------------------------------------------------

DROP TABLE IF EXISTS `sources`;

CREATE TABLE `sources` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

LOCK TABLES `sources` WRITE;
/*!40000 ALTER TABLE `sources` DISABLE KEYS */;

INSERT INTO `sources` (`id`, `title`, `created_at`, `updated_at`)
VALUES
	(1,'Talent Management','2018-02-14 06:56:27','2018-02-14 06:56:27'),
	(2,'Financial Services','2018-02-14 06:56:27','2018-02-14 06:56:27'),
	(3,'Service Desk','2018-02-14 06:56:27','2018-02-14 06:56:27'),
	(4,'Data Center, Cloud & Network','2018-02-14 06:56:27','2018-02-14 06:56:27'),
	(5,'Apps Dev','2018-02-14 06:56:27','2018-02-14 06:56:27'),
	(6,'Solutions Architecture','2018-02-14 06:56:27','2018-02-14 06:56:27'),
	(7,'Ramcar Program Management','2018-02-14 06:56:27','2018-02-14 06:56:27'),
	(8,'SAP Support','2018-02-14 06:56:27','2018-02-14 06:56:27'),
	(9,'Netsuite Support','2018-02-14 06:56:27','2018-02-14 06:56:27'),
	(10,'NetWeaver','2018-02-14 06:56:27','2018-02-14 06:56:27'),
	(11,'SAP','2018-02-14 06:56:27','2018-02-14 06:56:27'),
	(12,'Netsuite','2018-02-14 06:56:27','2018-02-14 06:56:27'),
	(13,'Analytics','2018-02-14 06:56:27','2018-02-14 06:56:27'),
	(14,'Project Management','2018-02-14 06:56:27','2018-02-14 06:56:27'),
	(15,'Bids and Contracts Management','2018-02-14 06:56:27','2018-02-14 06:56:27'),
	(16,'Sales','2018-02-14 06:56:27','2018-02-14 06:56:27'),
	(17,'Academy','2018-02-14 06:56:27','2018-02-14 06:56:27'),
	(18,'Marketing','2018-02-14 06:56:27','2018-02-14 06:56:27');

/*!40000 ALTER TABLE `sources` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table statuses
# ------------------------------------------------------------

DROP TABLE IF EXISTS `statuses`;

CREATE TABLE `statuses` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `code` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `style` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

LOCK TABLES `statuses` WRITE;
/*!40000 ALTER TABLE `statuses` DISABLE KEYS */;

INSERT INTO `statuses` (`id`, `title`, `code`, `style`, `created_at`, `updated_at`)
VALUES
	(1,'Unit Head’s Acceptance','UNIT_HEAD_ACCEPT','bg-danger','2018-02-14 06:56:27','2018-02-14 06:56:27'),
	(2,'Unit Head’s Response','UNIT_HEAD_RESP','bg-warning','2018-02-14 06:56:27','2018-02-14 06:56:27'),
	(3,'Originator’s acceptance of the solutions','ORIGINATOR_ACCEPT','bg-info','2018-02-14 06:56:27','2018-02-14 06:56:27'),
	(4,'Unit Head’s Execution','UNIT_HEAD_EXEC','bg-success','2018-02-14 06:56:27','2018-02-14 06:56:27'),
	(5,'Admin’s Acceptance','ADMIN_ACCEPT','bg-success','2018-02-14 06:56:27','2018-02-14 06:56:27'),
	(6,'Management Representative’s Effectiveness Check','ADMIN_ACCEPT','bg-success','2018-02-14 06:56:27','2018-02-14 06:56:27'),
	(7,'Unit Head’s Reject','UNIT_HEAD_REJECT','bg-danger','2018-02-14 06:56:27','2018-02-14 06:56:27');

/*!40000 ALTER TABLE `statuses` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table users
# ------------------------------------------------------------

DROP TABLE IF EXISTS `users`;

CREATE TABLE `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `first_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `middle_initial` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;

INSERT INTO `users` (`id`, `first_name`, `middle_initial`, `last_name`, `email`, `password`, `remember_token`, `created_at`, `updated_at`)
VALUES
	(1,'Regie','','Ebalobor','reg.ebalobor@kaisa.com','$2y$10$sPZ5tzhHhu70v1hXW7lIpO0dtKrCPdjs6HBaJ5r45XPR9SNqihB9O','6FqaIaHJP6QHUbvyj5YdGEV1kUCWTiHX0YDDqGY2KUekE0nm595VPGbBBzMJ',NULL,NULL),
	(2,'Viktor','','Dimalanta','tor.dimalanta@kaisa.com','$2y$10$u4ZLQmfcsBcnikTjYcUTQuYzDwIz8lfikM4vWbBecc5M2xkXSH7ky',NULL,NULL,NULL),
	(3,'Juan Domingo','','Rivera','jd.rivera@kaisa.com','$2y$10$K1DlKGgj8MYBsrhK/tI2h.HKZwbFioBlki9kNcMfSA0aGWniza3WC',NULL,NULL,NULL),
	(4,'Kristine','','Malaluan','kristine.durante@kaisa.com','$2y$10$U3cJnXCXEIj6NHtzUJzmeu29Kpx6UL5.E0VmXRsbmLai.qAlvMZNm',NULL,NULL,NULL),
	(5,'Jonar','','Gregorio','jonar.gregorio@kaisa.com','$2y$10$xBxqxtTGejcRcFmXJ8Q4buBgb7l29wYzM/uAPzs88cN2UqEjkPWLO','UFiify1FKW5sfFt7sfE7GznmWpweZfXMGiPsVI0uXNX2srU6S5xXu1735lwh',NULL,NULL),
	(6,'Mira','','Perce','mira.perce@kaisa.com','$2y$10$bv8Ogl6UMQwftX3bMAAG2uX6TPGIohojLySYhXpmpEzonL2rlhYR.',NULL,NULL,NULL),
	(7,'Jeff','','Turla','jeff.turla@kaisa.com','$2y$10$LDcJ46pyO4iMQiV60U4f/u2JlGk4N2UENWPNAhnqk24LNombNVU62','xnJXRIA1Rhk2OfljteC9CAEiqvVHoHzsdcf4VLjyVyoZ1siPytDgFrGVFQE7',NULL,NULL);

/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;



/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
