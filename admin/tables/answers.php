<?php defined('_JEXEC') or die('Restricted access');

class QuizTableAnswers extends JTable
{
    var $id = null;
    var $body = 'Yes';
    var $description = '';
    var $question_id = null;

    function __construct( &$db ) {
        parent::__construct('quiz_answers', 'id', $db);
    }
}