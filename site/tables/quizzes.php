<?php defined('_JEXEC') or die('Restricted access');

class QuizTableQuizzes extends JTable
{
    var $id = null;
    var $result_id = null;

    function __construct( &$db ) {
        parent::__construct('quiz_quizzes', 'id', $db);
    }
}