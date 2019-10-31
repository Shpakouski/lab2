<?php

class Frequent_Questions_Block_Adminhtml_Questions extends Mage_Adminhtml_Block_Widget_Grid_Container
{
    protected function _construct()
    {
        $this->_addButtonLabel = Mage::helper('frequent_questions')->__('Add New Question');

        $this->_blockGroup = 'frequent_questions';
        $this->_controller = 'adminhtml_questions';
        $this->_headerText = Mage::helper('frequent_questions')->__('Questions');
    }
}
