<?php

class Jarlssen_Ipicture_Model_Mysql4_Ipicture extends Mage_Core_Model_Mysql4_Abstract
{
    public function _construct()
    {    
        // Note that the ipicture_id refers to the key field in your database table.
        $this->_init('ipicture/ipicture', 'ipicture_id');
        //our primary key is not incremental, we must tell this to magento
        $this->_isPkAutoIncrement = false;
    }
}