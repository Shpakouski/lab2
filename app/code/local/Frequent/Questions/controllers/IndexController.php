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
        if (!$question_id) {
            $this->_forward('noRoute');
        }
        $this->loadLayout();
        $this->getLayout()
            ->getBlock('question.item')
            ->setQuestionId($question_id);
        try {
            $this->renderLayout();
        } catch (Exception $e) {
            Mage::logException($e);
            $this->_forward('noRoute');
        }
    }
}
