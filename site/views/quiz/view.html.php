<?php defined( '_JEXEC' ) or die( 'Restricted access' );

jimport('joomla.application.component.view');

class QuizViewQuiz extends JView
{
    public function display($tpl = null)
    {
        // Get the Data
        $form = $this->get('Form');
        $item = $this->get('Item');

        // Check for errors.
        if (count($errors = $this->get('Errors')))
        {
            JError::raiseError(500, implode('<br />', $errors));
            return false;
        }
        // Assign the Data
        $this->form = $form;
        $this->item = $item;

        // Display the template
        parent::display($tpl);

        // Set the document
        $this->setDocument();
    }

    protected function setDocument()
    {
        $document = JFactory::getDocument();
        $document->setTitle("Quiz");
    }
}