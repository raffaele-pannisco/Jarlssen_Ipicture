<?php

class Jarlssen_Ipicture_Model_Mysql4_Ipicture_Collection extends Mage_Core_Model_Mysql4_Collection_Abstract
{
    public function _construct()
    {
        parent::_construct();
        $this->_init('ipicture/ipicture');
    }
}