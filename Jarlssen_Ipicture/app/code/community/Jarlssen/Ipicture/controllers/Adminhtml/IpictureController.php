<?php

class Jarlssen_Ipicture_Adminhtml_IpictureController extends Mage_Adminhtml_Controller_action {

    protected function _initAction() {
        $this->loadLayout()
                ->_setActiveMenu('ipicture/banner')
                ->_addBreadcrumb(Mage::helper('adminhtml')->__('Items Manager'), Mage::helper('adminhtml')->__('Item Manager'));

        return $this;
    }

    public function indexAction() {
        $this->_initAction()
                ->renderLayout();
    }

    public function editAction() {

        $id = 1;
        $model = Mage::getModel('ipicture/ipicture')->load($id);

        if ($model->getIpictureId() || $id == 0) {
            $data = Mage::getSingleton('adminhtml/session')->getFormData(true);

            if (!empty($data)) {
                $model->setData($data);
            }

            Mage::register('ipicture_data', $model);
        } else {
            Mage::getSingleton('adminhtml/session')->addError(Mage::helper('ipicture')->__('No banner data found,please add requested informations'));
        }
        $this->loadLayout();
        $this->_addContent($this->getLayout()->createBlock('ipicture/adminhtml_form_edit'));
        $this->renderLayout();
        if ($this->getRequest()->getParam('back')) {
            $this->_redirect('*/*/edit');
            return;
        }
    }

    public function saveAction() {
        $model = Mage::getModel('ipicture/ipicture');
        if ($data = $this->getRequest()->getPost()) {
            
            if (isset($_FILES['ipicture_image_url']['name']) && $_FILES['ipicture_image_url']['name'] != "") {
                try {
                    /* Starting upload */
                    $uploader = new Varien_File_Uploader('ipicture_image_url');

                    // Any extention would work
                    $uploader->setAllowedExtensions(array('jpg', 'jpeg', 'gif', 'png'));
                    $uploader->setAllowRenameFiles(false);

                    // Set the file upload mode 
                    // false -> get the file directly in the specified folder
                    // true -> get the file in the product like folders 
                    //	(file.jpg will go in something like /media/f/i/file.jpg)
                    $uploader->setFilesDispersion(false);

                    // We set media as the upload dir
                    $path = Mage::getBaseDir('media') . DS;
                    $uploader->save($path, $_FILES['ipicture_image_url']['name']);
                } catch (Exception $e) {
                    Mage::getSingleton('adminhtml/session')->addError($e->getMessage());
                    Mage::getSingleton('adminhtml/session')->setFormData($data);
                    $this->_redirect('*/*/edit');
                    return;
                }

                //this way the name is saved in DB
                $data['ipicture_image_url'] = $_FILES['ipicture_image_url']['name'];
            }
            else
                $data['ipicture_image_url'] = $data['ipicture_image_url']['value'];
            
            $model->setData($data);

            try {
                $model->save();
                Mage::getSingleton('adminhtml/session')->addSuccess(Mage::helper('ipicture')->__('Item was successfully saved'));
                Mage::getSingleton('adminhtml/session')->setFormData(false);

                if ($this->getRequest()->getParam('back')) {
                    $this->_redirect('*/*/edit');
                    return;
                }
                $this->_redirect('*/*/edit');
                return;
            } catch (Exception $e) {
                Mage::getSingleton('adminhtml/session')->addError($e->getMessage());
                Mage::getSingleton('adminhtml/session')->setFormData($data);
                $this->_redirect('*/*/edit');
                return;
            }
        }
        Mage::getSingleton('adminhtml/session')->addError(Mage::helper('ipicture')->__('Unable to find item to save'));
        $this->_redirect('*/*/');
    }

}