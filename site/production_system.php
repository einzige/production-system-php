<?php
/**
 * @package    ProductionSystem
 * @subpackage Components
 * components/com_production_system/production_system.php
 * @license    GNU/GPL
 */

// No direct access
defined( '_JEXEC' ) or die( 'Restricted access' );

// Require the base controller
require_once( JPATH_COMPONENT.DS.'controllers'.DS.'base.php' );

// Require specific controller if requested
if ($controller = JRequest::getWord('controller')) {
    $path = JPATH_COMPONENT.DS.'controllers'.DS.$controller.'.php';

    if (file_exists($path)) {
        require_once $path;
    } else {
        $controller = '';
    }
}

// Create the controller
$classname  = $controller.'ProductionSystemController';
$controller = new $classname();

// Perform the Request task
$task = JRequest::getWord('task');

// Assign default behaviour
if (empty($task)){ $task = 'index'; }

$controller->execute($task);
$controller->redirect();