CREATE TABLE IF NOT EXISTS `statuses`
(
    `status_id` int unsigned NOT NULL AUTO_INCREMENT UNIQUE NOT NULL,
    `status_name`    VARCHAR(255) UNIQUE NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET = utf8mb3;

INSERT INTO `statuses` (status_id, status_name)
VALUES (1, 'MSP Partner'),
       (2, 'Preferred Partner'),
       (3, 'Premium Partner'),
       (4, 'Elite Partner'),
       (5, 'Distributor');