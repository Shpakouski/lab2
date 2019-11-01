<?php

class Frequent_Questions_IndexController extends Mage_Core_Controller_Front_Action
{
    public function indexAction()
    {
        $this->loadLayout()
            ->renderLayout();
    }

    public function viewAction()
    {
        $question_id = (int)$this->getRequest()->getParam('id');
        $qu = Mage::getModel('frequent_questions/question')->getCollection()->addFieldToFilter('id', $question_id)->getData();
        if (empty($qu)) {
            $this->_redirect("questions");
        }
        $this->loadLayout();
        $this->getLayout()
            ->getBlock('question.item')
            ->setQuestionId($question_id);
        $this->renderLayout();
    }
}
