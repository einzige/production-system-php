<?php defined('_JEXEC') or die('Restricted access');

class QuizTableAnswersSigns extends JTable
{
    var $id = null;
    var $answer_id = null;
    var $sign_id = null;
    var $weight = 0.0;

    function __construct( &$db ) {
        parent::__construct('quiz_answers_signs', 'id', $db);
    }
}