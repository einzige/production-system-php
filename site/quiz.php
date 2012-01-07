<?php defined( '_JEXEC' ) or die( 'Restricted access' );

jimport('joomla.application.component.controller');

$controller = JController::getInstance('Quiz');
$controller->execute(JRequest::getCmd('task'));
$controller->redirect();