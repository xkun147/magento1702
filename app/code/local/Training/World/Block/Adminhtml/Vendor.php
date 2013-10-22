<?php
/**
 * Created by JetBrains PhpStorm.
 * User: Giga
 * Date: 10/22/13
 * Time: 2:31 PM
 * To change this template use File | Settings | File Templates.
 */
class Training_World_Block_Adminhtml_Vendor extends Mage_Adminhtml_Block_Widget_Grid_Container{
    public function __construct(){
        $this->_blockGroup = 'training_world';
        $this->_controller = 'adminhtml_vendor';
        $this->_headerText = $this->__('Vendor');

        parent::__construct();
    }

}