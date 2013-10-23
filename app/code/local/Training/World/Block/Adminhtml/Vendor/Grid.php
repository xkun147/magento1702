<?php
/**
 * Created by JetBrains PhpStorm.
 * User: Giga
 * Date: 10/22/13
 * Time: 2:41 PM
 * To change this template use File | Settings | File Templates.
 */
class Training_World_Block_Adminhtml_Vendor_Grid extends Mage_Adminhtml_Block_Widget_Grid{
   public function __construct(){
       parent::__construct();

       $this->setDefaultSort('vendor_id');
       $this->setId('training_world_vendor_grid');
       $this->setDefaultDir('ASC');
       $this->setSaveParametersInSession(true);
   }

    protected function _getCollection(){
        return 'training_world/vendor_collection';
    }

    protected function _prepareCollection(){
        $collection = Mage::getResourceModel($this->_getCollection());
        $this->setCollection($collection);

        return parent::_prepareCollection();
    }

    protected function _prepareColumns(){
        $this->addColumn('vendor_id',
            array(
                'header'=> $this->__('ID'),
                'type' => 'number',
                'align'=> 'right',
                'width' => '50px',
                'index' => 'vendor_id'
            )
        );
        $this->addColumn('name',
            array(
                'header'=> $this->__('Vendor Name'),
                'type' => 'text',
                'index' => 'name'
            )
        );
        $this->addColumn('is_active',
            array(
                'header'=> $this->__('Is Active'),
                'type' => 'options',
                'options' => array(
                    '1' => 'Yes',
                    '0' => 'No',
                ),
                'index' => 'is_active',

            )
        );

        return parent::_prepareColumns();
    }

    public function getRowUrl($row){
        return $this->getUrl('*/*/edit',array('id' =>$row->getId()));
    }

    protected function _prepareMassaction(){
        $this->setMassactionIdField('vendor_id');
        $this->getMassactionBlock()->setFormFieldName('vendor');

        $this->getMassactionBlock()->addItem('delete', array(
            'label'     => $this->__('Delete'),
            'url'       => $this->getUrl('*/*/massDelete'),
            'confirm'   => $this->__('Are you sure?'),
        ));

        $this->getMassactionBlock()->addItem('status', array(
            'label'     => $this->__('Change status'),
            'url'       => $this->getUrl('*/*/massStatus', array(
                '_current'  => true)),
                'additional'=> array(
                    'visibility'    => array(
                        'name'  => 'status',
                        'type'  => 'select',
                        'class' => 'required-entry',
                        'label' => $this->__('Status'),
                        'values'=> array(
                            1 => 'Yes',
                            0 => 'No',
                        ),
                    ),
                )

            )
        );

        return $this;
    }
}