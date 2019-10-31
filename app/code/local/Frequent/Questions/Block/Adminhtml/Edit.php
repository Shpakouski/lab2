<?php

class Frequent_Questions_Block_Adminhtml_Edit extends Mage_Adminhtml_Block_Widget_Form_Container
{
    protected function _construct()
    {
        $this->_blockGroup = 'frequent_questions';
        $this->_mode = 'edit';
        $this->_controller = 'adminhtml';

        $question_id = (int)$this->getRequest()->getParam($this->_objectId);
        if (!$question_id) {
            //    Mage::throwException($this->__('Question with this id does not exists'));
        }
        $question = Mage::getModel('frequent_questions/question')->load($question_id);
        Mage::register('current_question', $question);
        $this->_removeButton('reset');
    }

    public function getHeaderText()
    {
        $question = Mage::registry('current_question');
        if ($question->getId()) {
            return Mage::helper('frequent_questions')->__("Edit Question '%s'", $this->escapeHtml($question->getQstn()));
        } else {
            return Mage::helper('frequent_questions')->__("Add new Question");
        }
    }
}
