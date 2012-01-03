<?php defined('_JEXEC') or die('Restricted access');

jimport('joomla.application.component.controller');

class QuizController extends JController
{
    function display($cachable = false)
    {
        // set default view if not set
        JRequest::setVar('view', JRequest::getCmd('view', 'Rules'));

        // call parent behavior
        parent::display($cachable);
    }
}