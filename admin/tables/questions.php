<?php defined('_JEXEC') or die('Restricted access');

class QuizTableQuestions extends JTable
{
    var $id = null;
    var $body = '?';
    var $position = 0;

    function __construct( &$db ) {
        parent::__construct('quiz_questions', 'id', $db);
    }
}