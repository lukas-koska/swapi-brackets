-- Adminer 4.8.1 MySQL 5.5.5-10.6.10-MariaDB-1:10.6.10+maria~ubu2004 dump

SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

SET NAMES utf8mb4;

DROP TABLE IF EXISTS `about_me`;
CREATE TABLE `about_me` (
                            `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
                            `created_at` timestamp NULL DEFAULT NULL,
                            `updated_at` timestamp NULL DEFAULT NULL,
                            `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
                            `perex` text COLLATE utf8mb4_unicode_ci NOT NULL,
                            `used` tinyint(1) NOT NULL,
                            `text` text COLLATE utf8mb4_unicode_ci NOT NULL,
                            `language` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
                            PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


DROP TABLE IF EXISTS `failed_jobs`;
CREATE TABLE `failed_jobs` (
                               `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
                               `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
                               `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
                               `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
                               `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
                               `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
                               `failed_at` timestamp NOT NULL DEFAULT current_timestamp(),
                               PRIMARY KEY (`id`),
                               UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


DROP TABLE IF EXISTS `management`;
CREATE TABLE `management` (
                              `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
                              `created_at` timestamp NULL DEFAULT NULL,
                              `updated_at` timestamp NULL DEFAULT NULL,
                              `firstName` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
                              `lastName` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
                              `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
                              `phone` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
                              `used` tinyint(1) NOT NULL DEFAULT 1,
                              `language` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
                              PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


DROP TABLE IF EXISTS `migrations`;
CREATE TABLE `migrations` (
                              `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
                              `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
                              `batch` int(11) NOT NULL,
                              PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


DROP TABLE IF EXISTS `news`;
CREATE TABLE `news` (
                        `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
                        `created_at` timestamp NULL DEFAULT NULL,
                        `updated_at` timestamp NULL DEFAULT NULL,
                        `subtitle` varchar(255) COLLATE utf8mb4_unicode_ci NULL,
                        `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
                        `date` datetime NULL,
                        `text` text COLLATE utf8mb4_unicode_ci NULL,
                        `link` varchar(255) COLLATE utf8mb4_unicode_ci NULL,
                        `language` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
                        `due_date` datetime NULL,
                        `color` varchar(100) COLLATE utf8mb4_unicode_ci NULL,
                        PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


DROP TABLE IF EXISTS `password_resets`;
CREATE TABLE `password_resets` (
                                   `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
                                   `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
                                   `created_at` timestamp NULL DEFAULT NULL,
                                   KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


DROP TABLE IF EXISTS `personal_access_tokens`;
CREATE TABLE `personal_access_tokens` (
                                          `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
                                          `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
                                          `tokenable_id` bigint(20) unsigned NOT NULL,
                                          `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
                                          `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
                                          `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
                                          `last_used_at` timestamp NULL DEFAULT NULL,
                                          `created_at` timestamp NULL DEFAULT NULL,
                                          `updated_at` timestamp NULL DEFAULT NULL,
                                          PRIMARY KEY (`id`),
                                          UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
                                          KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
                         `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
                         `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
                         `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
                         `email_verified_at` timestamp NULL DEFAULT NULL,
                         `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
                         `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
                         `created_at` timestamp NULL DEFAULT NULL,
                         `updated_at` timestamp NULL DEFAULT NULL,
                         PRIMARY KEY (`id`),
                         UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


-- 2023-03-08 11:20:45

-- 2023-03-07 12:35:22
INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
    (1,	'admin',	'lukas.koska@gmail.com',	NULL,	'$2y$10$gc14Q3uNxF8ksXzNpNg89OjxV6h8KS4cxdyFsleonE3smVC/BDH5K',	'5Th9yohqn1QTCuQWn01Sfc4yZnf9QnYaE8BrsEEPNdB6vu15sOY4Gw3qweGx',	'2023-03-08 06:08:05',	'2023-03-08 06:08:05');

INSERT INTO `news` (`id`, `created_at`, `updated_at`, `subtitle`, `title`, `date`, `text`, `link`, `language`, `due_date`, `color`) VALUES
    (1,	'2023-03-08 11:44:02',	'2023-03-08 11:46:47',	'koncert',	'Koncert Tornaľa',	'2023-04-28 12:43:00',	'test',	'Read more',	'sk',	NULL,	NULL);

INSERT INTO `news` (`id`, `created_at`, `updated_at`, `subtitle`, `title`, `date`, `text`, `link`, `language`, `due_date`, `color`) VALUES
    (2,	'2023-03-08 11:44:02',	'2023-03-08 11:46:47',	'28.04.2023',	'Koncert Tornaľa - TEST',	'2023-04-28 12:43:00',	'test',	'Vstupenky',	'sk',	NULL,	NULL);
