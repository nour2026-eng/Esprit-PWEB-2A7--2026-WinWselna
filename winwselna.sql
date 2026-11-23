-- =====================================================================
--  Win Wselna? — database (structure only, no data)
--  6 modules × 2 entities + User = 13 tables
--
--  Win Account   : users
--  Win News      : categories      1 ─< articles        (articles.category_id)
--  Win Projects  : projects        1 ─< milestones      (milestones.project_id)
--  Win Safe      : reclamations    1 ─< responses       (responses.reclamation_id)
--  Win Transport : transport_lines 1 ─< tickets         (tickets.line_id)
--  Win Event     : events          1 ─< participations  (participations.event_id)
--  Win Jobs      : job_offers      1 ─< applications    (applications.job_offer_id)
--
--  Links between modules (foreign keys):
--    articles.project_id         → projects   (an article covers a project, optional)
--    reclamations.project_id     → projects   (a reclamation concerns a project, optional)
--    transport_lines.project_id  → projects   (a line is served / improved by a project, optional)
--    events.project_id           → projects   (an event is about a project, optional)
--    job_offers.project_id       → projects   (a project offers jobs)
--    reclamations.user_id        → users      (a client submits a reclamation)
--    responses.agent_id          → users      (the agent who wrote the response)
--    tickets.user_id             → users      (a client buys a ticket)
--    participations.user_id      → users      (a client registers to an event)
--    applications.user_id        → users      (a client applies to a job offer)
--
--  Import: phpMyAdmin → Import → choose this file → Go.
-- =====================================================================

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+01:00";
SET NAMES utf8mb4;

CREATE DATABASE IF NOT EXISTS `winwselna` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
USE `winwselna`;

SET FOREIGN_KEY_CHECKS = 0;
DROP TABLE IF EXISTS `applications`, `job_offers`, `participations`, `events`,
                     `tickets`, `transport_lines`, `requests`, `request_types`,
                     `responses`, `reclamations`, `milestones`, `articles`, `projects`, `categories`, `users`;
SET FOREIGN_KEY_CHECKS = 1;

-- ---------------------------------------------------------------------
--  WIN ACCOUNT · users (authentication + roles)
-- ---------------------------------------------------------------------
CREATE TABLE `users` (
  `id`          INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `full_name`   VARCHAR(100) NOT NULL,
  `email`       VARCHAR(150) NOT NULL,
  `password`    VARCHAR(255) NOT NULL COMMENT 'password_hash() result',
  `phone`       VARCHAR(20)  DEFAULT NULL,
  `governorate` VARCHAR(50)  DEFAULT NULL,
  `role`        ENUM('CLIENT','AGENT','ADMIN') NOT NULL DEFAULT 'CLIENT',
  `is_verified` TINYINT(1)   NOT NULL DEFAULT 0,
  `created_at`  DATETIME     NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `uq_users_email` (`email`),
  KEY `idx_users_role` (`role`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ---------------------------------------------------------------------
--  WIN NEWS · categories (entity 1) → articles (entity 2)
-- ---------------------------------------------------------------------
CREATE TABLE `categories` (
  `id`          INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `name`        VARCHAR(60)  NOT NULL,
  `description` VARCHAR(255) DEFAULT NULL,
  `created_at`  DATETIME     NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `uq_categories_name` (`name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ---------------------------------------------------------------------
--  WIN PROJECTS · projects (entity 1, hub of the platform)
-- ---------------------------------------------------------------------
CREATE TABLE `projects` (
  `id`          INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `title`       VARCHAR(150) NOT NULL,
  `description` TEXT         DEFAULT NULL,
  `governorate` VARCHAR(50)  NOT NULL,
  `budget`      DECIMAL(14,2) NOT NULL DEFAULT 0,
  `progress`    TINYINT UNSIGNED NOT NULL DEFAULT 0 COMMENT '0 to 100 (%)',
  `status`      ENUM('PLANNED','ACTIVE','DONE') NOT NULL DEFAULT 'PLANNED',
  `start_date`  DATE         DEFAULT NULL,
  `planned_end` DATE         DEFAULT NULL,
  `image_url`   VARCHAR(255) DEFAULT NULL,
  `created_at`  DATETIME     NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `idx_projects_status` (`status`),
  KEY `idx_projects_governorate` (`governorate`),
  CONSTRAINT `chk_projects_progress` CHECK (`progress` <= 100)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE `articles` (
  `id`           INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `title`        VARCHAR(180) NOT NULL,
  `content`      TEXT         NOT NULL,
  `image_url`    VARCHAR(255) DEFAULT NULL,
  `status`       ENUM('DRAFT','PUBLISHED') NOT NULL DEFAULT 'DRAFT',
  `published_at` DATETIME     DEFAULT NULL,
  `category_id`  INT UNSIGNED NOT NULL  COMMENT 'FK → categories (classifies)',
  `project_id`   INT UNSIGNED DEFAULT NULL COMMENT 'FK → projects (covers), optional',
  `created_at`   DATETIME     NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `idx_articles_category` (`category_id`),
  KEY `idx_articles_project` (`project_id`),
  CONSTRAINT `fk_articles_category` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE RESTRICT ON UPDATE CASCADE,
  CONSTRAINT `fk_articles_project`  FOREIGN KEY (`project_id`)  REFERENCES `projects` (`id`)   ON DELETE SET NULL ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- WIN PROJECTS · milestones (entity 2, composition: deleted with its project)
CREATE TABLE `milestones` (
  `id`         INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `title`      VARCHAR(150) NOT NULL,
  `due_date`   DATE         NOT NULL,
  `is_done`    TINYINT(1)   NOT NULL DEFAULT 0,
  `project_id` INT UNSIGNED NOT NULL COMMENT 'FK → projects (has)',
  `created_at` DATETIME     NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `idx_milestones_project` (`project_id`),
  CONSTRAINT `fk_milestones_project` FOREIGN KEY (`project_id`) REFERENCES `projects` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ---------------------------------------------------------------------
--  WIN SAFE · reclamations (entity 1) → responses (entity 2)
-- ---------------------------------------------------------------------
CREATE TABLE `reclamations` (
  `id`          INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `type`        ENUM('INCIDENT','SOS','DAMAGE') NOT NULL,
  `description` TEXT         NOT NULL,
  `location`    VARCHAR(200) NOT NULL,
  `photo_url`   VARCHAR(255) DEFAULT NULL,
  `status`      ENUM('SENT','ONGOING','DONE') NOT NULL DEFAULT 'SENT',
  `user_id`     INT UNSIGNED NOT NULL COMMENT 'FK → users (submits)',
  `project_id`  INT UNSIGNED DEFAULT NULL COMMENT 'FK → projects (concerns), optional',
  `created_at`  DATETIME     NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at`  DATETIME     NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `idx_reclamations_user` (`user_id`),
  KEY `idx_reclamations_project` (`project_id`),
  KEY `idx_reclamations_status` (`status`),
  CONSTRAINT `fk_reclamations_user`    FOREIGN KEY (`user_id`)    REFERENCES `users` (`id`)    ON DELETE CASCADE  ON UPDATE CASCADE,
  CONSTRAINT `fk_reclamations_project` FOREIGN KEY (`project_id`) REFERENCES `projects` (`id`) ON DELETE SET NULL ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE `responses` (
  `id`             INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `message`        TEXT         NOT NULL,
  `reclamation_id` INT UNSIGNED NOT NULL COMMENT 'FK → reclamations (answered by)',
  `agent_id`       INT UNSIGNED DEFAULT NULL COMMENT 'FK → users (agent who answered)',
  `created_at`     DATETIME     NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `idx_responses_reclamation` (`reclamation_id`),
  KEY `idx_responses_agent` (`agent_id`),
  CONSTRAINT `fk_responses_reclamation` FOREIGN KEY (`reclamation_id`) REFERENCES `reclamations` (`id`) ON DELETE CASCADE  ON UPDATE CASCADE,
  CONSTRAINT `fk_responses_agent`       FOREIGN KEY (`agent_id`)       REFERENCES `users` (`id`)        ON DELETE SET NULL ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ---------------------------------------------------------------------
--  WIN TRANSPORT · transport_lines (entity 1) → tickets (entity 2)
--  Admin manages the lines · Client buys / cancels tickets · Agent validates them on board
-- ---------------------------------------------------------------------
CREATE TABLE `transport_lines` (
  `id`            INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `name`          VARCHAR(100) NOT NULL COMMENT 'e.g. Bus 28, Metro 4',
  `type`          ENUM('BUS','METRO','TRAIN','LOUAGE') NOT NULL DEFAULT 'BUS',
  `departure`     VARCHAR(120) NOT NULL,
  `arrival`       VARCHAR(120) NOT NULL,
  `governorate`   VARCHAR(50)  NOT NULL,
  `fare`          DECIMAL(6,3) NOT NULL DEFAULT 0 COMMENT 'ticket price, TND',
  `frequency_min` SMALLINT UNSIGNED DEFAULT NULL COMMENT 'minutes between two departures',
  `status`        ENUM('ACTIVE','DISRUPTED','SUSPENDED') NOT NULL DEFAULT 'ACTIVE',
  `project_id`    INT UNSIGNED DEFAULT NULL COMMENT 'FK → projects (served / improved by), optional',
  `created_at`    DATETIME     NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `uq_transport_lines_name` (`name`, `governorate`),
  KEY `idx_transport_lines_project` (`project_id`),
  KEY `idx_transport_lines_status` (`status`),
  CONSTRAINT `fk_transport_lines_project` FOREIGN KEY (`project_id`) REFERENCES `projects` (`id`) ON DELETE SET NULL ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE `tickets` (
  `id`           INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `qr_code`      VARCHAR(64)  NOT NULL COMMENT 'unique code shown to the agent',
  `travel_date`  DATE         NOT NULL,
  `quantity`     TINYINT UNSIGNED NOT NULL DEFAULT 1,
  `total_price`  DECIMAL(8,3) NOT NULL DEFAULT 0 COMMENT 'fare × quantity, TND',
  `status`       ENUM('VALID','USED','CANCELED') NOT NULL DEFAULT 'VALID',
  `line_id`      INT UNSIGNED NOT NULL COMMENT 'FK → transport_lines (sells)',
  `user_id`      INT UNSIGNED NOT NULL COMMENT 'FK → users (buys)',
  `purchased_at` DATETIME     NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `uq_tickets_qr` (`qr_code`),
  KEY `idx_tickets_line` (`line_id`),
  KEY `idx_tickets_user` (`user_id`),
  KEY `idx_tickets_status` (`status`),
  CONSTRAINT `fk_tickets_line` FOREIGN KEY (`line_id`) REFERENCES `transport_lines` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `fk_tickets_user` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`)           ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `chk_tickets_quantity` CHECK (`quantity` BETWEEN 1 AND 10)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ---------------------------------------------------------------------
--  WIN EVENT · events (entity 1) → participations (entity 2)
-- ---------------------------------------------------------------------
CREATE TABLE `events` (
  `id`          INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `title`       VARCHAR(150) NOT NULL,
  `type`        ENUM('CONSULTATION','MEETING','OPENING') NOT NULL DEFAULT 'MEETING',
  `event_date`  DATETIME     NOT NULL,
  `place`       VARCHAR(150) NOT NULL,
  `capacity`    INT UNSIGNED NOT NULL DEFAULT 50,
  `project_id`  INT UNSIGNED DEFAULT NULL COMMENT 'FK → projects (is about), optional',
  `created_at`  DATETIME     NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `idx_events_project` (`project_id`),
  KEY `idx_events_date` (`event_date`),
  CONSTRAINT `fk_events_project` FOREIGN KEY (`project_id`) REFERENCES `projects` (`id`) ON DELETE SET NULL ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE `participations` (
  `id`            INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `status`        ENUM('ACTIVE','CANCELED') NOT NULL DEFAULT 'ACTIVE',
  `attended`      TINYINT(1)   NOT NULL DEFAULT 0,
  `event_id`      INT UNSIGNED NOT NULL COMMENT 'FK → events (receives)',
  `user_id`       INT UNSIGNED NOT NULL COMMENT 'FK → users (registers)',
  `registered_at` DATETIME     NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `uq_participation_event_user` (`event_id`, `user_id`),
  KEY `idx_participations_user` (`user_id`),
  CONSTRAINT `fk_participations_event` FOREIGN KEY (`event_id`) REFERENCES `events` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `fk_participations_user`  FOREIGN KEY (`user_id`)  REFERENCES `users` (`id`)  ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ---------------------------------------------------------------------
--  WIN JOBS · job_offers (entity 1) → applications (entity 2)
-- ---------------------------------------------------------------------
CREATE TABLE `job_offers` (
  `id`            INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `title`         VARCHAR(150) NOT NULL,
  `description`   TEXT         DEFAULT NULL,
  `contract_type` ENUM('CDD','CDI') NOT NULL DEFAULT 'CDD',
  `positions`     SMALLINT UNSIGNED NOT NULL DEFAULT 1,
  `salary`        DECIMAL(10,2) DEFAULT NULL COMMENT 'monthly, TND',
  `deadline`      DATE         NOT NULL,
  `project_id`    INT UNSIGNED NOT NULL COMMENT 'FK → projects (offers)',
  `created_at`    DATETIME     NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `idx_job_offers_project` (`project_id`),
  CONSTRAINT `fk_job_offers_project` FOREIGN KEY (`project_id`) REFERENCES `projects` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE `applications` (
  `id`           INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `cv_url`       VARCHAR(255) NOT NULL,
  `motivation`   TEXT         DEFAULT NULL,
  `status`       ENUM('SENT','OK','REFUSED') NOT NULL DEFAULT 'SENT',
  `job_offer_id` INT UNSIGNED NOT NULL COMMENT 'FK → job_offers (receives)',
  `user_id`      INT UNSIGNED NOT NULL COMMENT 'FK → users (applies)',
  `applied_at`   DATETIME     NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `uq_application_offer_user` (`job_offer_id`, `user_id`),
  KEY `idx_applications_user` (`user_id`),
  CONSTRAINT `fk_applications_offer` FOREIGN KEY (`job_offer_id`) REFERENCES `job_offers` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `fk_applications_user`  FOREIGN KEY (`user_id`)      REFERENCES `users` (`id`)      ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
