<?php

class Training_World_Adminhtml_VendorController extends Mage_Adminhtml_Controller_Action{
    public function indexAction(){
        $this->_initAction()
            ->renderLayout();
    }

    public function newAction(){
        $this->_forward('edit');
    }

    public function editAction(){
        $this->_initAction();

        $id = $this->getRequest()->getParam('id');
        $model = Mage::getModel('training_world/vendor');

        if($id){
            $model->load($id);

            if(!$model->getId()){
                Mage::getSingleton('adminhtml/session')->addError($this->__('This is no longer exists.'));
                $this->_redirect('*/*/');

                return;
            }
        }
        $this->_title($model->getId() ? $model->getName() : $this->__('New Vendor'));

        $data = Mage::getSingleton('adminhtml/session')->getVendorData(true);
        if(!empty($data)){
            $model->setData($data);
        }

        Mage::register('training_world',$model);

        $this->_initAction()
            ->_addBreadcrumb($id ? $this->__('Edit Vendor') : $this->__('New Vendor'), $id ? $this->__('Edit Vendor') : $this->__('New Vendor'))
            ->_addContent($this->getLayout()->createBlock('training_world/adminhtml_vendor_edit')->setData('action',$this->getUrl('*/*/save')))
            ->renderLayout();
    }

    public  function saveAction(){
        if($postData = $this->getRequest()->getPost()){
            $model = Mage::getSingleton('training_world/vendor');
            $model->setData($postData);

            try {
                $model->save();
                Mage::getSingleton('adminhtml/session')->addSuccess($this->__('The vendor has beean saved'));
                $this->_redirect('*/*/');

                return;
            }
            catch(Mage_Core_Exception $e){
                Mage::getSingleton('adminhtml/session')->addError($e->getMessage());
            }
            catch(Exception $e){
                Mage::getSingleton('adminhtml/session')->addError($this->__('An error occurred while saving this vendor. '));
            }

            Mage::getSingleton('adminhtml/session')->setVendorData($postData);
            $this->_redirectReferer();
        }
    }

    public function messageAction(){
        $data = Mage::getModel('training_world/vendor')->load($this->getRequest()->getParam('id'));
        echo $data->getContent();
    }

    protected function _initAction(){
        $this->loadLayout()
            ->_setActiveMenu('sales/training_world_vendor')
            ->_title($this->__('Sales'))->_title($this->__('Vendor'));


        return $this;
    }

    protected function _isAllowed(){
        return Mage::getSingleton('admin/session')->isAllowed('sales/training_world_vendor');
    }

    public function deleteAction(){
        if($this->getRequest()->getParam('id') > 0){
            try{
                $testModel = Mage::getModel('training_world/vendor');
                $testModel->setId($this->getRequest()
                    ->getParam('id'))
                    ->delete();
                Mage::getSingleton('adminhtml/session')->addSuccess('Successfully deleted');
                $this->_redirect('*/*/');
            }
            catch(Exception $e){
                Mage::getSingleton('adminhtml/session')->addError($e->getMessage());
                $this->_redirect('*/*/edit',array('id' => $this->getRequest()->getParam('id')));
            }
        }
        $this->_redirect('*/*/');
    }
}