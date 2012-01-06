<?php defined( '_JEXEC' ) or die( 'Restricted access' );

jimport('joomla.application.component.controlleradmin');

class QuizControllerAnswers extends JControllerAdmin
{
    public function getModel($name = 'Answer', $prefix = 'QuizModel')
    {
        $model = parent::getModel($name, $prefix, array('ignore_request' => true));
        return $model;
    }
}