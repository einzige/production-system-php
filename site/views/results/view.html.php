<?php defined( '_JEXEC' ) or die( 'Restricted access' );

jimport('joomla.application.component.view');

class QuizViewResults extends JView
{
    public function display($tpl = null)
    {
        JFactory::getDocument()->setTitle("Your results");

        //get the hello
        $this->results =& $this->get('Data');

        parent::display($tpl);
    }
}