<?php
/**
 * Created by JetBrains PhpStorm.
 * User: Giga
 * Date: 10/22/13
 * Time: 2:29 PM
 * To change this template use File | Settings | File Templates.
 */
class Training_World_Model_Resource_Vendor_Collection extends Mage_Core_Model_Resource_Db_Collection_Abstract{
    protected function _construct(){
        $this->_init('training_world/vendor');
    }
}