<?php

class Frequent_Questions_Block_Content extends Mage_Core_Block_Template
{
    protected function _construct()
    {
        $this->setTemplate('frequent/questions/view.phtml');
    }

    public function getRowUrl(Frequent_Questions_Model_Question $question)
    {
        return $this->getUrl('*/*/view', array(
            'id' => $question->getId()
        ));
    }

    public function getCollection()
    {
        return Mage::getModel('frequent_questions/question')->getCollection();
    }
}
