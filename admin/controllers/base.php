<?php
/**
 * @package    ProductionSystem
 * @subpackage Components
 * @license    GNU/GPL
 */

// No direct access
defined( '_JEXEC' ) or die( 'Restricted access' );

jimport('joomla.application.component.controller');

/**
 * Hello World Component Controller
 *
 * @package    Joomla.Tutorials
 * @subpackage Components
 */
class ProductionSystemController extends JController
{
    function index() {
        echo "ADMIN WORKS";
    }
    /**
     * Method to display the view
     *
     * @access    public
     */
    function display()
    {
        parent::display();
    }
}