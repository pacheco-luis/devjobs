CREATE TABLE IF NOT EXISTS `users` (
    `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
    `name` varchar(255) DEFAULT NULL,
    `email` varchar(255) NOT NULL,
    `password` varchar(255) NOT NULL,
    `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
    PRIMARY KEY (`id`),
    UNIQUE KEY `email_UNIQUE` (`email`)
);

CREATE TABLE IF NOT EXISTS `uploads` (
    `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
    `original_filename` varchar(255) NOT NULL,
    `storage_filename` varchar(255) NOT NULL,
    `media_type` varchar(255) NOT NULL,
    `uploaded_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
    PRIMARY KEY (`id`)
);

CREATE TABLE IF NOT EXISTS `jobs` (
    `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
    `user_id` bigint(20) unsigned NOT NULL,
    `logo_upload_id` bigint(20) unsigned NOT NULL,
    `company` varchar(255) NOT NULL,
    `position` varchar(255) NOT NULL,
    `contract` varchar(255) NOT NULL,
    `location` varchar(255) NOT NULL,
    `website` varchar(255) NOT NULL,
    `description` text NOT NULL,
    `requirements` text NOT NULL,
    `role` text NOT NULL,
    `posted_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
    PRIMARY KEY (`id`),
    KEY `fk_jobs_user_idx` (`user_id`),
    KEY `fk_jobs_upload_idx` (`logo_upload_id`),
    CONSTRAINT `fk_jobs_user` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
    CONSTRAINT `fk_jobs_upload` FOREIGN KEY (`logo_upload_id`) REFERENCES `uploads` (`id`) ON DELETE RESTRICT ON UPDATE CASCADE
);
