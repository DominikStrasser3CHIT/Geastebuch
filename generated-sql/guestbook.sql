
# This is a fix for InnoDB in MySQL >= 4.1.x
# It "suspends judgement" for fkey relationships until are tables are set.
SET FOREIGN_KEY_CHECKS = 0;

-- ---------------------------------------------------------------------
-- eintrag
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `eintrag`;

CREATE TABLE `eintrag`
(
    `id` INTEGER NOT NULL,
    `name` VARCHAR(50) NOT NULL,
    `text` VARCHAR(1024) NOT NULL,
    `datum` DATE NOT NULL,
    `ueberschrift` VARCHAR(50) NOT NULL,
    PRIMARY KEY (`id`)
) ENGINE=InnoDB;

# This restores the fkey checks, after having unset them earlier
SET FOREIGN_KEY_CHECKS = 1;
