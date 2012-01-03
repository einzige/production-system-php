<?php defined( '_JEXEC' ) or die( 'Restricted access' );

jimport( 'joomla.application.component.view');
// require_once JPATH_COMPONENT.DS.'models'.DS.'rule'.'.php';

class RulesViewRules extends JView
{
    function display($tpl = null)
    {
        /*JFactory::getDocument()->setTitle("Rules list.");
        JToolBarHelper::title("The list of rules.");
        $rules = RulesModelRule::all();
        $this->assignRef('rules', $rules);

        parent::display($tpl);
        */
        // Get data from the model
        $items = $this->get('Items');
        $pagination = $this->get('Pagination');

        // Check for errors.
        if (count($errors = $this->get('Errors')))
        {
            JError::raiseError(500, implode('<br />', $errors));
            return false;
        }
        // Assign data to the view
        $this->items = $items;
        $this->pagination = $pagination;

        // Set the toolbar
        $this->addToolBar();

        // Display the template
        parent::display($tpl);
    }

    /**
     * Setting the toolbar
     */
    protected function addToolBar()
    {
        JToolBarHelper::title("Manage rules", 'rules');
        JToolBarHelper::deleteListX('', 'rules.delete');
        JToolBarHelper::editListX('rule.edit');
        JToolBarHelper::addNewX('rule.add');
    }

    /*(/ TODO (SZ): move to controller.
    function loadRule() {
        $model = new RulesModelRule();
        $rule = & $model->getData();
        return $rule;
    }*/
}