# ************************************************************
# Sequel Pro SQL dump
# Version 4541
#
# http://www.sequelpro.com/
# https://github.com/sequelpro/sequelpro
#
# Host: 127.0.0.1 (MySQL 5.7.20)
# Database: onlinecardb
# Generation Time: 2018-02-14 00:20:17 +0000
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
	(1,1,1,'2018-02-12 16:54:42','2018-02-12 16:54:44'),
	(2,1,2,'2018-02-12 16:55:00','2018-02-12 16:55:00');

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
	(1,3,1,2,1,'12343','Completely synergize value-added resources with cross functional content. Professionally disseminate adaptive methods of empowerment via reliable total linkage. Completely underwhelm high-payoff solutions via one-to-one experiences. Proactively pursue viral information before enterprise-wide best practices. Credibly develop strategic scenarios through holistic services.\n\nAuthoritatively architect quality experiences through impactful intellectual capital. Objectively recaptiualize parallel web services before parallel networks. Dramatically transition interoperable process improvements via covalent expertise. Progressively productize flexible portals vis-a-vis competitive functionalities. Proactively repurpose cross functional interfaces whereas viral benefits.\n\nMonotonectally re-engineer team building manufactured products whereas premier initiatives. Professionally formulate premium testing procedures without sticky infrastructures. Appropriately initiate long-term high-impact interfaces and diverse e-tailers. Efficiently enhance cross-media value via multidisciplinary partnerships. Efficiently e-enable high-quality innovation through error-free e-commerce.\n\nConveniently incentivize standards compliant intellectual capital without alternative channels. Efficiently impact cooperative content via turnkey e-markets. Appropriately reconceptualize impactful materials for end-to-end best practices. Interactively enhance open-source methods of empowerment for optimal quality vectors. Intrinsicly scale error-free products whereas go forward outsourcing.\n\nSynergistically.','2018-02-12 05:34:39','2018-02-12 05:34:39',NULL);

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
	(1,'Complaint',NULL,NULL),
	(2,'Accident',NULL,NULL),
	(3,'Security Report',NULL,NULL),
	(4,'Non-conformance',NULL,NULL);

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
	(33,'2014_10_12_000000_create_users_table',1),
	(34,'2014_10_12_100000_create_password_resets_table',1),
	(35,'2018_02_05_024149_entrust_setup_tables',1),
	(36,'2018_02_08_053716_create_cars_table',1),
	(37,'2018_02_08_061926_create_statuses_table',1),
	(38,'2018_02_08_062342_create_car_status_table',1),
	(39,'2018_02_08_070847_create_sources_table',1),
	(40,'2018_02_08_070913_create_classifications_table',1);

/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
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
	(1,'role-create','Create Role','Create New Role','2018-02-12 04:11:03','2018-02-12 04:11:03'),
	(2,'role-read','Display Role Listing','See listings of role','2018-02-12 04:11:03','2018-02-12 04:11:03'),
	(3,'role-edit','Edit Role','Edit Role','2018-02-12 04:11:03','2018-02-12 04:11:03'),
	(4,'role-delete','Delete Role','Delete Role','2018-02-12 04:11:03','2018-02-12 04:11:03'),
	(5,'car-create','Create CAR','Create New CAR','2018-02-12 04:11:03','2018-02-12 04:11:03'),
	(6,'car-read','Display CAR Listing','See listings of CAR','2018-02-12 04:11:03','2018-02-12 04:11:03'),
	(7,'car-edit','Edit CAR','Edit CAR','2018-02-12 04:11:03','2018-02-12 04:11:03'),
	(8,'car-delete','Delete CAR','Delete CAR','2018-02-12 04:11:03','2018-02-12 04:11:03');

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
	(12,3),
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
	(1,'superadmin','Super admin','Root','2018-02-12 04:11:03','2018-02-12 04:11:03'),
	(2,'admin','User Administrator','User is allowed to manage and edit users, cars and other settings.','2018-02-12 04:11:03','2018-02-12 04:11:03'),
	(3,'assignee','Assignee/Unit Head','Assignee or the Unit Head','2018-02-12 04:11:03','2018-02-12 04:11:03'),
	(4,'originator','Originator','Originator','2018-02-12 04:11:03','2018-02-12 04:11:03');

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
	(1,'Talent Management','2018-02-13 15:32:53',NULL),
	(2,'Financial Services','2018-02-13 15:32:53',NULL),
	(3,'Service Desk','2018-02-13 15:32:53',NULL),
	(4,'Data Center, Cloud & Network','2018-02-13 15:32:53',NULL),
	(5,'Apps Dev','2018-02-13 15:32:53',NULL),
	(6,'Solutions Architecture','2018-02-13 15:32:53',NULL),
	(7,'Ramcar Program Management','2018-02-13 15:32:53',NULL),
	(8,'SAP Support','2018-02-13 15:32:53',NULL),
	(9,'Netsuite Support','2018-02-13 15:32:53',NULL),
	(10,'NetWeaver',NULL,NULL),
	(11,'SAP',NULL,NULL),
	(12,'Netsuite',NULL,NULL),
	(13,'Analytics',NULL,NULL),
	(14,'Project Management',NULL,NULL),
	(15,'Bids and Contracts Management',NULL,NULL),
	(16,'Sales',NULL,NULL),
	(17,'Academy',NULL,NULL),
	(18,'Marketing',NULL,NULL);

/*!40000 ALTER TABLE `sources` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table statuses
# ------------------------------------------------------------

DROP TABLE IF EXISTS `statuses`;

CREATE TABLE `statuses` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `style` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

LOCK TABLES `statuses` WRITE;
/*!40000 ALTER TABLE `statuses` DISABLE KEYS */;

INSERT INTO `statuses` (`id`, `title`, `code`, `style`, `created_at`, `updated_at`)
VALUES
	(1,'Unit Head’s Acceptance','UNIT_HEAD_ACCEPT','bg-danger','2018-02-12 17:13:56','2018-02-12 17:13:56'),
	(2,'Unit Head’s Response','UNIT_HEAD_RESP','bg-warning','2018-02-12 17:13:56','2018-02-12 17:13:56'),
	(3,'Originator’s acceptance of the solutions','ORIGINATOR_ACCEPT','bg-info','2018-02-12 17:13:56','2018-02-12 17:13:56'),
	(4,'Unit Head’s Execution','UNIT_HEAD_EXEC','bg-success','2018-02-12 17:13:56','2018-02-12 17:13:56'),
	(5,'Admin’s Acceptance','ADMIN_ACCEPT','bg-success','2018-02-12 17:13:56','2018-02-12 17:13:56'),
	(6,'Management Representative’s Effectiveness Check','ADMIN_ACCEPT','bg-success','2018-02-12 17:13:56','2018-02-12 17:13:56'),
	(7,'Unit Head’s Reject','UNIT_HEAD_REJECT','bg-danger','2018-02-12 17:13:56','2018-02-12 17:13:56');

/*!40000 ALTER TABLE `statuses` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table users
# ------------------------------------------------------------

DROP TABLE IF EXISTS `users`;

CREATE TABLE `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `first_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `middle_initial` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
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
	(1,'Regie',NULL,'Ebalobor','reg.ebalobor@kaisa.com','$2y$10$kMEsjHW6VtFBKkPYqcp5F.lN6nu5lGYlufQZY2UVFlv7GhyhXP8ym','Sr4EXpot09xDBS51BhgjprqsN5LA0huC0hqDWwwvyJAyzOFFrpxIXVgUuZHW',NULL,NULL),
	(2,'Viktor Angelo',NULL,'Dimalanta','tor.dimalanta@kaisa.com','$2y$10$GDwf66Hpt4BPs5AfjvrRjeziJErWexWhwa1D/ziTiO2Q0kyPTOW8u','D0EBKDHjf90IkARA6tso2z7E0IotWZLFAgaAHwm47QCflqTX1Py7o7YbWd9m',NULL,NULL),
	(3,'Juan Domingo',NULL,'Rivera','jd.rivera@kaisa.com','$2y$10$evGb7D6mCtMD8cq0Fik9kOtnDxdRMF8r51kD9huW4o902Q7ZAJtjS','u3KZLIR3iJFycDoGh3b37I5kknGH0o0vXzCaKXIK3iJ1l4mMCjcnJ5pzNb9j',NULL,NULL),
	(4,'Kristine',NULL,'Malaluan','kristine.durante@kaisa.com','$2y$10$WcmhKlL9bnP0kaYwuEzmkOMghryxn3I/93whQd9lln578wBiaco66',NULL,NULL,NULL),
	(5,'Jonar',NULL,'Gregorio','jonar.gregorio@kaisa.com','$2y$10$/JAcX2T2.lebz7thO/Rl5.JnQ5CQV.8fE8hUuU6Sbm.lSXi11eTFa','1oLW1vFkSQKRW2EWDdNxt6h6d6sn2fmLhGTV5njWBjfw4Q4HddlkgeeUML7j',NULL,NULL),
	(6,'Mira','','Perce','mira.perce@kaisa.com','$2y$10$kMEsjHW6VtFBKkPYqcp5F.lN6nu5lGYlufQZY2UVFlv7GhyhXP8ym','IhsrDm5SgI1ItsOCI1kXn3y3p9FeclWdgYhMmmRR3YFt6xEkDDxdZrUvKDUu',NULL,NULL),
	(12,'Jeff',NULL,'Turla','jeff.turla@kaisa.com','$2y$10$kMEsjHW6VtFBKkPYqcp5F.lN6nu5lGYlufQZY2UVFlv7GhyhXP8ym','MKLIvuNcCX5inOy6G5EP7Bdt1pSgzeNYoib9RM9UxwEHAAcb8EmHIUJeNa4n',NULL,NULL);

/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;



/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
