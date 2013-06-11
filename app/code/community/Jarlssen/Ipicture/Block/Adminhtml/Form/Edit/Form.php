<?php

class Jarlssen_Ipicture_Block_Adminhtml_Form_Edit_Form extends Mage_Adminhtml_Block_Widget_Form {

    protected function _prepareForm() {
        $id = 1;
        $model = Mage::getModel('ipicture/ipicture')->load($id);

        $form = new Varien_Data_Form(array(
                    'id' => 'edit_form',
                    'action' => $this->getUrl('*/*/save'),
                    'method' => 'post',
                    'enctype' => 'multipart/form-data')
        );

        $fieldset = $form->addFieldset('form_form', array('legend' => Mage::helper('ipicture')->__('Insert banner informations')));

        

        $fieldset->addField('Banner Width', 'text', array(
            'label' => Mage::helper('ipicture')->__('Width'),
            'class' => 'required-entry',
            'required' => true,
            'name' => 'ipicture_image_width',
            'value' => $model->getIpictureImageWidth(),
        ));

        $fieldset->addField('Banner Height', 'text', array(
            'label' => Mage::helper('ipicture')->__('Height'),
            'class' => 'required-entry',
            'required' => true,
            'name' => 'ipicture_image_height',
            'value' => $model->getIpictureImageHeight(),
        ));
        $fieldset->addField('Banner Static Id', 'hidden', array(
            'class' => 'required-entry',
            'required' => true,
            'name' => 'ipicture_id',
            'value' => $id,
        ));
        $fieldset->addField('Banner Image', 'image', array(
            'required' => true,
            'name' => 'ipicture_image_url',
            'value' => $model->getIpictureImageUrl(),
        ));
        $fieldset->addField('AnnotationData', 'hidden', array(
            'required' => false,
            'name' => 'ipicture_annotation_data',
            'value' => $model->getIpictureAnnotationData(),
        ));

        $fieldset->addType('extended_image','Jarlssen_Ipicture_Block_Adminhtml_Form_Edit_CustomIpicture');

        $fieldset->addField('mycustom_element', 'extended_image', array(
            'label'         => 'Banner',
            'name'          => 'mycustom_element',
            'required'      => false,
            'value'         => Mage::getBaseUrl(Mage_Core_Model_Store::URL_TYPE_MEDIA).'ipicture/home/'.$model->getIpictureImageUrl(),
            'bold'          =>  true,
            'label_style'   =>  'font-weight: bold;color:red;',
        ));

        $form->setUseContainer(true);
        $this->setForm($form);

        return parent::_prepareForm();
    }

}