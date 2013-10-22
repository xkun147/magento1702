<?php
/**
 * Created by JetBrains PhpStorm.
 * User: Giga
 * Date: 10/22/13
 * Time: 3:06 PM
 * To change this template use File | Settings | File Templates.
 */
class Training_World_Block_Adminhtml_Vendor_Edit_Form extends Mage_Adminhtml_Block_Widget_Form{

    public function __construct(){
        parent::__construct();

        $this->setId('training_world_vendor_form');
        $this->setTitle($this->__('Vendor Information'));
    }

    protected function _prepareForm(){
        $model = Mage::registry('training_world');

        $form = new Varien_Data_Form(array(
                'id' => 'edit_form',
                'action' => $this->getUrl('*/*/save',array('id' => $this->getRequest()->getParam('id'))),
                'method' => 'post'
        ));

        $fieldset = $form->addFieldset('base_fieldset', array(
            'legend' => $this->__('Vendor Information'),
            'class' => 'fieldset-wide',

        ));

        if($model->getId()){
            $fieldset->addField('vendor_id','hidden',array(
                'name' => 'vendor_id',
            ));
        }

        $fieldset->addField('name','text',array(
            'name' => 'name',
            'label' => $this->__('Name'),
            'title' => $this->__('Name'),
            'required' => 'true',
        ));
        $fieldset->addField('description','textarea',array(
            'name' => 'description',
            'label' => $this->__('Description'),
            'title' => $this->__('Description'),
            'required' => 'true',
        ));
        $fieldset->addField('is_active','select',array(
            'name' => 'is_active',
            'label' => $this->__('Is Active'),
            'title' => $this->__('Is Active'),
            'values' => array(
                array(
                    'value' => 1,
                    'label' => $this->__('Yes'),
                ),
                array(
                    'value' => 0,
                    'label' => $this->__('No'),
                )
            ),
            'required' => 'true',
        ));

        $form->setValues($model->getData());
        $form->setUseContainer(true);
        $this->setForm($form);

        return parent::_prepareForm();
    }
}