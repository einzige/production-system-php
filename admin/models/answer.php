<?php defined( '_JEXEC' ) or die( 'Restricted access' );

require_once(JPATH_COMPONENT_ADMINISTRATOR.DS.'lib'.DS.'models'.DS.'quiz_ext_model.php');

class QuizModelAnswer extends QuizExtModel
{
    var $signs = Array();
    var $associations = Array("signs" => Array("fk"             => "answer_id",
                                               "weights_table"  => "quiz_answers_signs",
                                               "weighted_table" => "quiz_signs",
                                               "weighted_fk"    => "sign_id"));

    public function getTable($type = 'Answers', $prefix = 'QuizTable', $config = array())
    {
        return JTable::getInstance($type, $prefix, $config);
    }

    public function getForm($data = array(), $loadData = true)
    {
        $form = $this->loadForm('com_quiz.answer', 'answer', array('control' => 'jform', 'load_data' => $loadData));
        if (empty($form)) return false;
        return $form;
    }

    public function getScript()
    {
        return 'administrator/components/com_quiz/models/forms/answer.js';
    }

    protected function loadFormData()
    {
        $data = JFactory::getApplication()->getUserState('com_quiz.edit.answer.data', array());
        if (empty($data)) $data = $this->getItem();
        return $data;
    }
}