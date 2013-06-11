<?php
/**
* 
*
* NOTICE OF LICENSE
*
* This source file is subject to the GNU LESSER GENERAL PUBLIC LICENSE (LGPL 3.0)
*
* DISCLAIMER
*
* Do not edit or add to this file if you wish to upgrade to newer
* versions in the future.
*
* @category   Jarlssen
* @package    Jarlssen_Ipicture
* @copyright  Copyright (c) 1996-2013 Jarlssen GmbH (http://www.jarlssen.com)
* @contacts   raffaele.pannisco@jarlssen.de
* @license    http://www.gnu.org/copyleft/lesser.html  GNU LESSER GENERAL PUBLIC LICENSE (LGPL 3.0)
*/

class Jarlssen_Ipicture_Helper_Data extends Mage_Core_Helper_Abstract {
    
    public function isEnabled() {
        return Mage::getStoreConfig('ipicture/general/ipictureEnabled');
    }
    
    public function getImage() {
        $model = Mage::getModel('ipicture/ipicture')->load(1);
        return Mage::getBaseUrl(Mage_Core_Model_Store::URL_TYPE_MEDIA).'ipicture/home/'.$model->getIpictureImageUrl();
    }
    
    public function getWidth() {
        $model = Mage::getModel('ipicture/ipicture')->load(1);
        return $model->getIpictureImageWidth();
    }
    
    public function getHeight() {
        $model = Mage::getModel('ipicture/ipicture')->load(1);
        return $model->getIpictureImageHeight();
    }
    
    public function getAnnotationData() {
        $model = Mage::getModel('ipicture/ipicture')->load(1);
        return $model->getIpictureAnnotationData();
    }
}

?>
