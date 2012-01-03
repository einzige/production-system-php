<?php defined( '_JEXEC' ) or die( 'Restricted access' );

jimport('joomla.application.component.controlleradmin');

class RulesController extends JController
{
    public function getModel($name = 'Rule', $prefix = 'RuleModel')
    {
        $model = parent::getModel($name, $prefix, array('ignore_request' => true));
        return $model;
    }
}