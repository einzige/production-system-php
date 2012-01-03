<?php defined( '_JEXEC' ) or die( 'Restricted access' );

jimport('joomla.application.component.controlleradmin');

class QuizControllerSigns extends JControllerAdmin
{
    public function getModel($name = 'Sign', $prefix = 'QuizModel')
    {
        $model = parent::getModel($name, $prefix, array('ignore_request' => true));
        return $model;
    }
}