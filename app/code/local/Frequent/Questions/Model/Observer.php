<?php

class Frequent_Questions_Model_Observer
{

    public function viewAnswers()
    {
        $question_id = Mage::app()->getRequest()->getPathInfo();
        $question_id = (int)preg_replace("/[^0-9]/", '', $question_id);
        $data = Mage::getModel('frequent_questions/question')->getCollection()->addFieldToFilter('id', $question_id);
        foreach ($data as $record) {
            $views = (int)$record->getViews();
            $views += 1;
            $record->setViews($views);
            $record->save();

        }
    }

}