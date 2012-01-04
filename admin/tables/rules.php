<?php defined('_JEXEC') or die('Restricted access');

class QuizTableRules extends JTable
{
    var $id = null;
    var $sign_id = null;
    var $weight = 0;
    var $body = '';

    function __construct( &$db ) {
        parent::__construct('quiz_rules', 'id', $db);
    }
}