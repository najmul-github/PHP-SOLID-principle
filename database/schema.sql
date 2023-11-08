CREATE TABLE `questions`
(
    `id`         int(11) unsigned NOT NULL AUTO_INCREMENT,
    `question`   tinytext,
    `created_at` timestamp        NULL DEFAULT NULL,
    `updated_at` timestamp        NULL DEFAULT NULL,
    `deleted_at` timestamp        NULL DEFAULT NULL,
    PRIMARY KEY (`id`)
) ENGINE = InnoDB
  DEFAULT CHARSET = utf8;


CREATE TABLE `answers`
(
    `id`          int(11) unsigned NOT NULL AUTO_INCREMENT,
    `answer`      tinytext,
    `question_id` int(11)               DEFAULT NULL,
    `created_at`  timestamp        NULL DEFAULT NULL,
    `updated_at`  timestamp        NULL DEFAULT NULL,
    `deleted_at`  timestamp        NULL DEFAULT NULL,
    PRIMARY KEY (`id`)
) ENGINE = InnoDB
  DEFAULT CHARSET = utf8;