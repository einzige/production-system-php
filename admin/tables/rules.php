<?php defined('_JEXEC') or die('Restricted access');

class RuleTableRules extends JTable
{
    var $id = null;
    var $sign_id = null;
    var $weight = 0;
    var $body = '';

    function __construct( &$db ) {
        parent::__construct('#__rules', 'id', $db);
    }
}