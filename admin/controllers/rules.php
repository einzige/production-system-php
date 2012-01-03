<?php defined( '_JEXEC' ) or die( 'Restricted access' );

require_once JPATH_COMPONENT.DS.'controllers'.DS.'base'.'.php';

jimport('joomla.application.component.controlleradmin');

class RulesController extends JControllerAdmin
{
    function index() { parent::display(); }

    public function getModel($name = 'Rule', $prefix = 'RuleModel')
    {
        $model = parent::getModel($name, $prefix, array('ignore_request' => true));
        return $model;
    }
}