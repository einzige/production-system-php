<?php defined('_JEXEC') or die('Restricted access');

class QuizTableResults extends JTable
{
    var $id = null;
    var $name = '';
    var $description = 'No description specified.';

    function __construct( &$db ) {
        parent::__construct('quiz_results', 'id', $db);
    }
}