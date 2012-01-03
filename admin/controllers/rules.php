<?php defined( '_JEXEC' ) or die( 'Restricted access' );

jimport('joomla.application.component.controller');
jimport('joomla.application.component.controlleradmin');

class QuizControllerRules extends JControllerAdmin
{
    public function getModel($name = 'Rule', $prefix = 'QuizModel')
    {
        $model = parent::getModel($name, $prefix, array('ignore_request' => true));
        return $model;
    }
}