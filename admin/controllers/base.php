<?php defined( '_JEXEC' ) or die( 'Restricted access' );

jimport('joomla.application.component.controller');


class ProductionSystemController extends JController
{
    var $home = 'index.php?option=com_production_system';

    function __construct()
    {
        parent::__construct();
    }

    function index() {}

    function display()
    {
        parent::display();
    }
}