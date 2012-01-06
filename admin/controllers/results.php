<?php defined( '_JEXEC' ) or die( 'Restricted access' );

jimport('joomla.application.component.controlleradmin');

class QuizControllerResults extends JControllerAdmin
{
    public function getModel($name = 'Results', $prefix = 'QuizModel')
    {
        $model = parent::getModel($name, $prefix, array('ignore_request' => true));
        return $model;
    }
}