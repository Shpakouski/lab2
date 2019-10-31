<?php
$installer = $this;
$installer->startSetup();

$installer->run("
CREATE TABLE `{$this->getTable('frequent_questions/question')}` (
 `id` INT(11) UNSIGNED NOT NULL AUTO_INCREMENT ,
 `qstn` VARCHAR(255) NOT NULL ,
 `answer` TEXT NOT NULL ,
 `views` INT(11) UNSIGNED NOT NULL ,
 `author` VARCHAR(255) NOT NULL ,
 PRIMARY KEY (`id`)) ENGINE = InnoDB CHARSET=utf8 COLLATE utf8_general_ci;
");

$installer->endSetup();
