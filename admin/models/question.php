<?php defined( '_JEXEC' ) or die( 'Restricted access' );

jimport('joomla.application.component.modeladmin');

class QuizModelQuestion extends JModelAdmin
{
    public function getTable($type = 'Questions', $prefix = 'QuizTable', $config = array())
    {
        return JTable::getInstance($type, $prefix, $config);
    }

    public function getForm($data = array(), $loadData = true)
    {
        $form = $this->loadForm('com_quiz.question', 'question', array('control' => 'jform', 'load_data' => $loadData));
        if (empty($form))
        {
            return false;
        }
        return $form;
    }

    public function getScript()
    {
        return 'administrator/components/com_quiz/models/forms/question.js';
    }

    protected function loadFormData()
    {
        // Check the session for previously entered form data.
        $data = JFactory::getApplication()->getUserState('com_quiz.edit.question.data', array());
        if (empty($data))
        {
            $data = $this->getItem();
        }
        return $data;
    }
}