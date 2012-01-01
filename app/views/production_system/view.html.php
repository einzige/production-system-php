<?php
/**
 * @package    ProductionSystem
 * @subpackage Components
 * @license    GNU/GPL
 */

// no direct access
defined( '_JEXEC' ) or die( 'Restricted access' );

jimport( 'joomla.application.component.view');

/**
 * HTML View class for the ProductionSystem Component
 *
 * @package ProductionSystem
 */

class ProductionSystemView extends JView
{
    function display($tpl = null)
    {
        $greeting = "Test!";
        $this->assignRef( 'greeting', $greeting );

        parent::display($tpl);
    }
}