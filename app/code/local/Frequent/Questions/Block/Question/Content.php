<?php

class Frequent_Questions_Block_Question_Content extends Mage_Core_Block_Template
{
    protected function _construct()
    {
        $this->setTemplate('frequent/questions/question/view.phtml');
    }

    public function getQuestion()
    {
        return Mage::getModel('frequent_questions/question')->load($this->getQuestionId());
    }
}
