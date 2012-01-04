<?php defined('_JEXEC') or die('Restricted access');

class QuizTableRulesResults extends JTable
{
    var $id = null;
    var $rule_id = null;
    var $result_id = null;
    var $weight = 0.0;

    function __construct( &$db ) {
        parent::__construct('quiz_rules_results', 'id', $db);
    }
}