<?php defined( '_JEXEC' ) or die( 'Restricted access' );

jimport('joomla.application.component.view');

class QuizViewAnswer extends JView
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
        $this->item = $item;

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
        JToolBarHelper::title($isNew ? "New Answer" : "Edit Answer");
        JToolBarHelper::save('Answer.save');
        JToolBarHelper::cancel('Answer.cancel', $isNew ? 'JTOOLBAR_CANCEL' : 'JTOOLBAR_CLOSE');
    }

    protected function setDocument()
    {
        $isNew = ($this->item->id < 1);
        $document = JFactory::getDocument();
        $document->setTitle($isNew ? "Create Answer" : "Edit Answer");
        $document->addScript(JURI::root() . $this->script);
        $document->addScript(JURI::root() . "/administrator/components/com_quiz/assets/submitbutton.js");
        JText::script('COM_QUIZ_SIGN_ERROR_UNACCEPTABLE');
    }
}