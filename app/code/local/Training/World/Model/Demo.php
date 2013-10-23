<?php
/**
 * Created by JetBrains PhpStorm.
 * User: User
 * Date: 10/14/13
 * Time: 4:20 PM
 * To change this template use File | Settings | File Templates.
 */
class Training_World_Model_Demo extends Mage_Eav_Model_Entity_Attribute_Source_Abstract
{
    public function getAllOptions()
    {
        if (is_null($this->_options)) {
            $this->_options = array();
            $this->_options[] = array(
                'label' => 'Please Select',
                'value' => ''
            );
            foreach($this->getVendorCollection() as $vendor){
                $this->_options[] = array(
                    'label' => $vendor->getName(),
                    'value' => $vendor->getVendorId()
                );
            }
        }
        return $this->_options;
    }

    public function getVendorCollection(){
        $store = Mage::getStoreConfig('training_vendor/setting/is_active');
        if($store==1){
            $colection = Mage::getModel('training_world/vendor')->getCollection();
        }else {
            $colection = Mage::getModel('training_world/vendor')->getCollection()->addFieldToFilter('is_active', array('eq'=>1) );
        }
        if($colection){
            return $colection;
        }
    }
}