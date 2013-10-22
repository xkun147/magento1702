<?php
/**
 * Created by JetBrains PhpStorm.
 * User: User
 * Date: 10/8/13
 * Time: 2:52 PM
 * To change this template use File | Settings | File Templates.
 */ 
/* @var $installer Mage_Core_Model_Resource_Setup */
$installer = $this;

$installer->startSetup();

$installer->run("
INSERT INTO `vendors` VALUES ('1', 'Sony', 'Sony Vietnam', '1');
INSERT INTO `vendors` VALUES ('2', 'Nokia', 'Nokia Finland', '1');
INSERT INTO `vendors` VALUES ('3', 'Iphone', 'Iphone USA', '1');

");
$installer->endSetup();