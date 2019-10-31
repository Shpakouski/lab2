<?php

class Frequent_Questions_Block_Adminhtml_Edit_Form extends Mage_Adminhtml_Block_Widget_Form
{
    protected function _prepareForm()
    {
        $question = Mage::registry('current_question');
        $form = new Varien_Data_Form();
        $fieldset = $form->addFieldset('edit_question', array(
            'legend' => Mage::helper('frequent_questions')->__('Question Details')
        ));

        if ($question->getId()) {
            $fieldset->addField('id', 'hidden', array(
                'name' => 'id',
                'required' => true
            ));
        }

        $fieldset->addField('qstn', 'text', array(
            'name' => 'qstn',
            'title' => Mage::helper('frequent_questions')->__('Question'),
            'label' => Mage::helper('frequent_questions')->__('Question'),
            'maxlength' => '250',
            'required' => true,
        ));

        $fieldset->addField('answer', 'textarea', array(
            'name' => 'answer',
            'title' => Mage::helper('frequent_questions')->__('Answer'),
            'label' => Mage::helper('frequent_questions')->__('Answer'),
            'style' => 'width: 98%; height: 200px;',
            'required' => true,
        ));

        $form->setMethod('post');
        $form->setUseContainer(true);
        $form->setId('edit_form');
        $form->setAction($this->getUrl('*/*/save'));
        $form->setValues($question->getData());

        $this->setForm($form);
    }
}
