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

$attribute_set_name = 'Cell Phones';
$group_name = 'General';
$attribute_code = 'vendor_id';

$setup = Mage::getModel('eav/entity_setup','core_setup');

$attribute_set_id=$setup->getAttributeSetId('catalog_product', $attribute_set_name);
$attribute_group_id=$setup->getAttributeGroupId('catalog_product', $attribute_set_id, $group_name);
$attribute_id=$setup->getAttributeId('catalog_product', $attribute_code);

$setup->addAttributeToSet($entityTypeId='catalog_product',$attribute_set_id, $attribute_group_id, $attribute_id);
$installer->endSetup();