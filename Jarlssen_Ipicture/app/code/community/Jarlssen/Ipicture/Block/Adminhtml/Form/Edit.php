<?php

class Jarlssen_Ipicture_Block_Adminhtml_Form_Edit extends Mage_Adminhtml_Block_Widget_Form_Container {

    public function __construct() {
        parent::__construct();

        $this->_objectId = 'id';
        $this->_blockGroup = 'ipicture';
        $this->_controller = 'adminhtml_form';

        $this->_updateButton('save', 'label', Mage::helper('ipicture')->__('Save'));
        $this->_updateButton('delete', 'label', Mage::helper('ipicture')->__('Delete'));
        $this->removeButton('back');
    }

    public function getHeaderText() {
        return Mage::helper('ipicture')->__('Ipicture');
    }

}