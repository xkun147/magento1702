<?php
/**
 * Created by JetBrains PhpStorm.
 * User: Giga
 * Date: 10/22/13
 * Time: 3:01 PM
 * To change this template use File | Settings | File Templates.
 */
class Training_World_Block_Adminhtml_Vendor_Edit extends Mage_Adminhtml_Block_Widget_Form_Container{
    public function __construct(){
        $this->_blockGroup = 'training_world';
        $this->_controller = 'adminhtml_vendor';

        parent::__construct();

        $this->_updateButton('save','label',$this->__('Save Vendor'));
        $this->_updateButton('delete','label',$this->__('Delete Vendor'));
    }

    public function getHeaderText(){
        if(Mage::registry('training_world')->getId()){
            return $this->__('Edit Vendor');
        }
        else {
            return $this->__('New Vendor');
        }
    }
}