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

$arg_attribute = 'vendor_id';
$arg_value0 = 'Sony';
$arg_value1 = 'Samsung';
$arg_value3 = 'LG';
$arg_value2 = 'Apple';

$attr_model = Mage::getModel('catalog/resource_eav_attribute');
$attr = $attr_model->loadByCode('catalog_product', $arg_attribute);
$attr_id = $attr->getAttributeId();

$option['attribute_id'] = $attr_id;

$option['value']['any_option_name'][0] = $arg_value0;
$option['value']['any_option_name'][1] = $arg_value1;
$option['value']['any_option_name'][3] = $arg_value3;
$option['value']['any_option_name'][2] = $arg_value2;

$setup = new Mage_Eav_Model_Entity_Setup('core_setup');
$setup->addAttributeOption($option);

$installer->endSetup();

