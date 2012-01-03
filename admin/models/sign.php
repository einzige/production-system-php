<?php defined( '_JEXEC' ) or die( 'Restricted access' );

jimport('joomla.application.component.modeladmin');

class QuizModelSign extends JModelAdmin
{
    public function getTable($type = 'Signs', $prefix = 'QuizTable', $config = array())
    {
        return JTable::getInstance($type, $prefix, $config);
    }

    public function getForm($data = array(), $loadData = true)
    {
        $form = $this->loadForm('com_quiz.sign', 'sign', array('control' => 'jform', 'load_data' => $loadData));
        if (empty($form))
        {
            return false;
        }
        return $form;
    }

    public function getScript()
    {
        return 'administrator/components/com_quiz/models/forms/sign.js';
    }

    protected function loadFormData()
    {
        // Check the session for previously entered form data.
        $data = JFactory::getApplication()->getUserState('com_quiz.edit.sign.data', array());
        if (empty($data))
        {
            $data = $this->getItem();
        }
        return $data;
    }
}