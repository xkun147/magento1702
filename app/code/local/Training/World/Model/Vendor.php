<?php
/**
 * Created by JetBrains PhpStorm.
 * User: Giga
 * Date: 10/22/13
 * Time: 2:26 PM
 * To change this template use File | Settings | File Templates.
 */
class Training_World_Model_Vendor extends Mage_Core_Model_Abstract{
    protected function _construct(){
        $this->_init('training_world/vendor');
    }
}