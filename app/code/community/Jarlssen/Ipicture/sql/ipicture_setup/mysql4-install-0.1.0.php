<?php

$installer = $this;

$installer->startSetup();

$installer->run("
DROP TABLE IF EXISTS {$this->getTable('ipicture')};
CREATE TABLE IF NOT EXISTS {$this->getTable('ipicture')} (
  `ipicture_id` int(11) unsigned NOT NULL,
  `ipicture_image_url` varchar(255) DEFAULT '',
  `ipicture_annotation_data` longtext,
  `ipicture_image_width` varchar(255) DEFAULT '',
  `ipicture_image_height` varchar(255) DEFAULT '',
  PRIMARY KEY (`ipicture_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
");

$installer->endSetup();