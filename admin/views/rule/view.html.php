<?php defined( '_JEXEC' ) or die( 'Restricted access' );

jimport('joomla.application.component.view');

class RuleViewRule extends JView
{
    public function display($tpl = null)
    {
        // Get the Data
        $form = $this->get('Form');
        $item = $this->get('Item');
        $script = $this->get('Script');

        // Check for errors.
        if (count($errors = $this->get('Errors')))
        {
            JError::raiseError(500, implode('<br />', $errors));
            return false;
        }
        // Assign the Data
        $this->form = $form;
        $this->item = $item;
        $this->script = $script;

        // Set the toolbar
        $this->addToolBar();

        // Display the template
        parent::display($tpl);

        // Set the document
        $this->setDocument();
    }

    protected function addToolBar()
    {
        JRequest::setVar('hidemainmenu', true);
        $isNew = ($this->item->id == 0);
        JToolBarHelper::title($isNew ? "New rule" : "Edit rule", 'rule');
        JToolBarHelper::save('rule.save');
        JToolBarHelper::cancel('rule.cancel', $isNew ? 'JTOOLBAR_CANCEL' : 'JTOOLBAR_CLOSE');
    }

    protected function setDocument()
    {
        $isNew = ($this->item->id < 1);
        $document = JFactory::getDocument();
        $document->setTitle($isNew ? "Create rule" : "Edit rule");
        $document->addScript(JURI::root() . $this->script);
        $document->addScript(JURI::root() . "/administrator/components/com_production_system/assets/submitbutton.js");
        JText::script('COM_PRODUCTION_SYSTEM_RULE_ERROR_UNACCEPTABLE');
    }
}