<?php defined('_JEXEC') or die('Restricted access');

class QuizTableRulesSigns extends JTable
{
    var $id = null;
    var $rule_id = null;
    var $sigh_id = null;
    var $weight = 0.0;

    function __construct( &$db ) {
        parent::__construct('quiz_rules_signs', 'id', $db);
    }
}