-- Adminer 4.8.1 MySQL 5.5.5-10.6.10-MariaDB-1:10.6.10+maria~ubu2004 dump

SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

SET NAMES utf8mb4;

CREATE TABLE IF NOT EXISTS `failed_jobs` (
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


DROP TABLE IF EXISTS `migrations`;
CREATE TABLE `migrations` (
                              `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
                              `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
                              `batch` int(11) NOT NULL,
                              PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
                                                          (1,	'2014_10_12_000000_create_users_table',	1),
                                                          (2,	'2014_10_12_100000_create_password_resets_table',	1),
                                                          (3,	'2019_08_19_000000_create_failed_jobs_table',	1),
                                                          (4,	'2019_12_14_000001_create_personal_access_tokens_table',	1),
                                                          (5,	'2023_03_14_081730_create_planets_table',	1),
                                                          (6,	'2023_03_16_095238_create_species_table',	2),
                                                          (7,	'2023_03_16_105507_create_planet_species_table',	3),
                                                          (8,	'2023_03_16_195000_create_user_logs_table',	4);


CREATE TABLE IF NOT EXISTS `password_resets` (
                                   `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
                                   `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
                                   `created_at` timestamp NULL DEFAULT NULL,
                                   KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


CREATE TABLE IF NOT EXISTS `personal_access_tokens` (
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


CREATE TABLE IF NOT EXISTS `planets` (
                           `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
                           `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
                           `diameter` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
                           `rotation_period` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
                           `orbital_period` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
                           `gravity` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
                           `population` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
                           `climate` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
                           `terrain` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
                           `surface_water` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
                           `url` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
                           `created` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
                           `edited` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
                           `created_at` timestamp NULL DEFAULT NULL,
                           `updated_at` timestamp NULL DEFAULT NULL,
                           PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE IF NOT EXISTS `species` (
                           `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
                           `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
                           `average_height` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
                           `average_lifespan` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
                           `classification` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
                           `created` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
                           `designation` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
                           `edited` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
                           `eye_colors` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
                           `hair_colors` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
                           `language` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
                           `skin_colors` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
                           `url` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
                           `created_at` timestamp NULL DEFAULT NULL,
                           `updated_at` timestamp NULL DEFAULT NULL,
                           PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE IF NOT EXISTS `planet_species` (
                                  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
                                  `planet_id` int(10) unsigned NOT NULL,
                                  `species_id` bigint(20) unsigned NOT NULL,
                                  `number_of_people` int(10) unsigned NOT NULL DEFAULT 0,
                                  `created_at` timestamp NULL DEFAULT NULL,
                                  `updated_at` timestamp NULL DEFAULT NULL,
                                  PRIMARY KEY (`id`),
                                  KEY `planet_species_planet_id_foreign` (`planet_id`),
                                  KEY `planet_species_species_id_foreign` (`species_id`),
                                  CONSTRAINT `planet_species_planet_id_foreign` FOREIGN KEY (`planet_id`) REFERENCES `planets` (`id`),
                                  CONSTRAINT `planet_species_species_id_foreign` FOREIGN KEY (`species_id`) REFERENCES `species` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE IF NOT EXISTS `users` (
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

CREATE TABLE IF NOT EXISTS `user_logs` (
                             `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
                             `mood` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
                             `weather` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
                             `gps` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
                             `note` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
                             `created_at` timestamp NULL DEFAULT NULL,
                             `updated_at` timestamp NULL DEFAULT NULL,
                             PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


-- 2023-03-14 08:59:24