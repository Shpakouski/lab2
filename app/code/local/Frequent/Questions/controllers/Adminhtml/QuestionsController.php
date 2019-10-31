<?php

class Frequent_Questions_Adminhtml_QuestionsController extends Mage_Adminhtml_Controller_Action
{
    public function indexAction()
    {
        $this->_title($this->__('Questions'));

        $this->loadLayout();
        $this->_setActiveMenu('frequent_questions');
        $this->_addBreadcrumb(Mage::helper('frequent_questions')->__('Questions'), Mage::helper('frequent_questions')->__('Questions'));
        $this->renderLayout();
    }

    public function newAction()
    {
        $this->_title($this->__('Add new question'));
        $this->loadLayout();
        $this->_setActiveMenu('frequent_questions');
        $this->_addBreadcrumb(Mage::helper('frequent_questions')->__('Add new question'), Mage::helper('frequent_questions')->__('Add new question'));
        $this->renderLayout();
    }

    public function editAction()
    {
        $this->_title($this->__('Edit question'));

        $this->loadLayout();
        $this->_setActiveMenu('frequent_questions');
        $this->_addBreadcrumb(Mage::helper('frequent_questions')->__('Edit question'), Mage::helper('frequent_questions')->__('Edit Question'));
        $this->renderLayout();
    }

    public function deleteAction()
    {
        $tipId = $this->getRequest()->getParam('id', false);

        try {
            Mage::getModel('frequent_questions/question')->setId($tipId)->delete();
            Mage::getSingleton('adminhtml/session')->addSuccess(Mage::helper('frequent_questions')->__('Question successfully deleted'));

            return $this->_redirect('*/*/');
        } catch (Mage_Core_Exception $e) {
            Mage::getSingleton('adminhtml/session')->addError($e->getMessage());
        } catch (Exception $e) {
            Mage::logException($e);
            Mage::getSingleton('adminhtml/session')->addError($this->__('Somethings went wrong'));
        }

        $this->_redirectReferer();
    }

    public function saveAction()
    {
        $data = $this->getRequest()->getPost();
        if (!empty($data)) {
            try {
                $user = Mage::getSingleton('admin/session')->getUser()->getOrigData()['username'];
                Mage::getModel('frequent_questions/question')->setData($data)->setAuthor($user)
                    ->save();
                Mage::getSingleton('adminhtml/session')->addSuccess(Mage::helper('frequent_questions')->__('Question successfully saved'));
            } catch (Mage_Core_Exception $e) {
                Mage::getSingleton('adminhtml/session')->addError($e->getMessage());
            } catch (Exception $e) {
                Mage::logException($e);
                Mage::getSingleton('adminhtml/session')->addError($this->__('Somethings went wrong'));
            }
        }
        return $this->_redirect('*/*/');
    }

    public function gridAction()
    {
        $this->loadLayout();
        $this->getResponse()->setBody(
            $this->getLayout()->createBlock('frequent_questions/adminhtml_questions_grid')->toHtml()
        );
    }
}
