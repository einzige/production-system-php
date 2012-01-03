<?php defined('_JEXEC') or die('Restricted access');

class QuizTableSigns extends JTable
{
    var $id = null;
    var $name = '';
    var $description = '';

    function __construct( &$db ) {
        parent::__construct('#__signs', 'id', $db);
    }
}