<?php defined( '_JEXEC' ) or die( 'Restricted access' );

require_once(JPATH_COMPONENT_ADMINISTRATOR.DS.'lib'.DS.'models'.DS.'quiz_ext_model.php');

class QuizModelRule extends QuizExtModel
{
    var $signs = Array();
    var $associations = Array("signs"   => Array("fk"             => "rule_id",
                                                 "weights_table"  => "quiz_rules_signs",
                                                 "weighted_table" => "quiz_signs",
                                                 "weighted_fk"    => "sign_id"),
                              "results" => Array("fk"             => "rule_id",
                                                 "weights_table"  => "quiz_rules_results",
                                                 "weighted_table" => "quiz_results",
                                                 "weighted_fk"    => "result_id"));

    public function getTable($type = 'Rules', $prefix = 'QuizTable', $config = array())
    {
        return JTable::getInstance($type, $prefix, $config);
    }

    public function getForm($data = array(), $loadData = true)
    {
        $form = $this->loadForm('com_quiz.rule', 'rule', array('control' => 'jform', 'load_data' => $loadData));
        if (empty($form)) return false;
        return $form;
    }

    public function getScript()
    {
        return 'administrator/components/com_quiz/models/forms/rule.js';
    }

    protected function loadFormData()
    {
        $data = JFactory::getApplication()->getUserState('com_quiz.edit.rule.data', array());
        if (empty($data)) $data = $this->getItem();
        return $data;
    }
}