<?php

class Frequent_Questions_Model_Resource_Question_Collection extends Mage_Core_Model_Mysql4_Collection_Abstract
{
    protected function _construct()
    {
        $this->_init('frequent_questions/question');
    }
}
