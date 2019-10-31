<?php

class Frequent_Questions_Block_Adminhtml_Questions_Grid extends Mage_Adminhtml_Block_Widget_Grid
{

    protected function _construct()
    {
        $this->setId('questionsGrid');
        $this->_controller = 'adminhtml_questions';
        $this->setUseAjax(true);

        $this->setDefaultSort('id');
        $this->setDefaultDir('desc');
    }

    protected function _prepareCollection()
    {
        $collection = Mage::getModel('frequent_questions/question')->getCollection();
        $this->setCollection($collection);

        return parent::_prepareCollection();
    }

    protected function _prepareColumns()
    {
        $this->addColumn('id', array(
            'header' => Mage::helper('frequent_questions')->__('ID'),
            'align' => 'right',
            'width' => '20px',
            'filter_index' => 'id',
            'index' => 'id'
        ));

        $this->addColumn('qstn', array(
            'header' => Mage::helper('frequent_questions')->__('Question'),
            'align' => 'left',
            'filter_index' => 'qstn',
            'index' => 'qstn',
            'type' => 'text',
            'truncate' => 50,
            'escape' => true,
        ));

        $this->addColumn('answer', array(
            'header' => Mage::helper('frequent_questions')->__('Answer'),
            'align' => 'left',
            'filter_index' => 'answer',
            'index' => 'answer',
            'type' => 'text',
            'truncate' => 50,
            'escape' => true,
        ));


        $this->addColumn('author', array(
            'header' => Mage::helper('frequent_questions')->__('Author'),
            'align' => 'left',
            'filter_index' => 'author',
            'index' => 'author',
            'type' => 'text',
            'width' => '120px',
            'truncate' => 50,
            'escape' => true,
        ));

        $this->addColumn('views', array(
            'header' => Mage::helper('frequent_questions')->__('Views'),
            'align' => 'right',
            'width' => '20px',
            'filter_index' => 'views',
            'index' => 'views'
        ));

        $this->addColumn('action', array(
            'header' => Mage::helper('frequent_questions')->__('Action'),
            'width' => '50px',
            'type' => 'action',
            'getter' => 'getId',
            'actions' => array(
                array(
                    'caption' => Mage::helper('frequent_questions')->__('Edit'),
                    'url' => array(
                        'base' => '*/*/edit',
                    ),
                    'field' => 'id'
                )
            ),
            'filter' => false,
            'sortable' => false,
            'index' => 'id',
        ));

        return parent::_prepareColumns();
    }

    public function getRowUrl($questions)
    {
        return $this->getUrl('*/*/edit', array(
            'id' => $questions->getId(),
        ));
    }

    public function getGridUrl()
    {
        return $this->getUrl('*/*/grid', array('_current' => true));
    }
}
