<?php defined( '_JEXEC' ) or die( 'Restricted access' );

require_once JPATH_COMPONENT.DS.'controllers'.DS.'base'.'.php';
require_once JPATH_COMPONENT.DS.'models'.DS.'rule'.'.php';

class RuleController extends ProductionSystemController
{
    var $document = null;
    var $home = 'index.php?option=com_production_system&controller=rule';

    function __construct()
    {
        parent::__construct();
        $this->document = JFactory::getDocument();
        JSubMenuHelper::addEntry("List of all rules", 'index.php?option=com_production_system&controller=rules', false);
        JSubMenuHelper::addEntry("Add a new rule", 'index.php?option=com_production_system&task=add&controller=rules', false);
        $this->registerTask('add', 'edit');
    }

    function index() {
        $this->document->setTitle("Rules list.");
        JToolBarHelper::title("The list of rules.");
        parent::display();
    }

    function edit() {
        JRequest::setVar('hidemainmenu', 1);
        JRequest::setVar('layout', 'form');
        parent::display();
    }

    /**
     * save a record (and redirect to main page)
     * @return void
     */
    function save()
    {
        $model = new RulesModelRule();//$this->getModel('rules');

        if ($model->store()) {
            $msg = JText::_( 'The rule has been saved!' );
        } else {
            $msg = JText::_( 'Error Saving Rule' );
        }

        // Check the table in so it can be edited.... we are done with it anyway
        $link = 'index.php?option=com_production_system';
        $this->setRedirect($link, $msg);
    }

    /**
     * remove record(s)
     * @return void
     */
    function remove()
    {
        $model = $this->getModel('rule');
        if(!$model->delete()) {
            $msg = JText::_( 'Error: One or More Rules Could not be Deleted' );
        } else {
            $msg = JText::_( 'Rule(s) Deleted' );
        }

        $this->setRedirect( 'index.php?option=com_production_system', $msg );
    }

    /**
     * cancel editing a record
     * @return void
     */
    function cancel()
    {
        $msg = JText::_( 'Operation Cancelled' );
        $this->setRedirect( 'index.php?option=com_production_system', $msg );
    }
}