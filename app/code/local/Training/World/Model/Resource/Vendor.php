<?php
/**
 * Created by JetBrains PhpStorm.
 * User: Giga
 * Date: 10/22/13
 * Time: 2:27 PM
 * To change this template use File | Settings | File Templates.
 */
class Training_World_Model_Resource_Vendor extends Mage_Core_Model_Resource_Db_Abstract{
    protected function _construct(){
        $this->_init('training_world/vendor','vendor_id');
    }
}