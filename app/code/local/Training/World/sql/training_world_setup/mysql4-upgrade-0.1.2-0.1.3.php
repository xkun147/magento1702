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

$setup = Mage::getModel('eav/entity_setup','core_setup');

$attribiteCode = 'vendor_id';
$attributeLabel = 'Vendor ID';

$setup->addAttribute('catalog_product', $attribiteCode, array(
    'type' => 'int',
    'backend' => '',
    'frontend' => '',
    'label' => $attributeLabel,
    'input' => 'select',
    'class' => '',
    'source' => 'Training_World_Model_Demo',
    'global' => Mage_Catalog_Model_Resource_Eav_Attribute::SCOPE_GLOBAL,
    'visible' => true,
    'required' => false,
    'user_defined' => true,
    'default' => '0',
    'wysiwyg_enabled' => true,
    'searchable' => false,
    'filterable' => false,
    'comparable' => false,
    'visible_on_front' => false,
    'unique' => false,
    'apply_to' => 'simple,configurable,virtual,bundle,downloadable,grouped',
    'is_configurable' => false,
    'used_in_product_listing' => '1'
));

$installer->endSetup();