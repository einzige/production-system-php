<?php defined( '_JEXEC' ) or die( 'Restricted access' );

jimport('joomla.application.component.modeladmin');

class QuizModelAnswer extends JModelAdmin
{
    var $signs = Array();

    public function getTable($type = 'Answers', $prefix = 'QuizTable', $config = array())
    {
        return JTable::getInstance($type, $prefix, $config);
    }

    public function getForm($data = array(), $loadData = true)
    {
        $form = $this->loadForm('com_quiz.answer', 'answer', array('control' => 'jform', 'load_data' => $loadData));
        if (empty($form))
        {
            return false;
        }
        return $form;
    }

    public function getScript()
    {
        return 'administrator/components/com_quiz/models/forms/answer.js';
    }

    // TODO: refactor, avoid using plainsql.
    public function save($data)
    {
        $result = parent::save($data);

        if( ! $result) return $result;

        // How to get an id in a right way?
        $pk	= (!empty($data['id'])) ? $data['id'] : (int)$this->getState($this->getName().'.id');

        $db = JFactory::getDBO();

        $db->setQuery("DELETE FROM quiz_answers_signs WHERE answer_id = $pk");
        $db->query();

        $sign_ids = Array();
        if (! isset($data['sign_ids'])) {
            $db->setQuery("SElECT id, 0 as weight FROM quiz_signs");
            $signs = $db->loadObjectList();

            foreach($signs as $sign) $sign_ids[$sign->id] = '0';
        } else {
            $sign_ids = $data['sign_ids'];
        }

        foreach($sign_ids as $sign_id => $weight) {
            $db->setQuery("INSERT INTO quiz_answers_signs(answer_id, sign_id, weight) VALUES($pk, $sign_id, $weight)");
            $db->query();
        }

        return $result;
    }

    public function getItem($pk=null) {
        $item = parent::getItem($pk);

        // How to get a pk? wtf?
        $pk	= (!empty($pk)) ? $pk : (int) $this->getState($this->getName().'.id');

        $db = JFactory::getDBO();

        $query = $db->getQuery(true);
        $query->select('quiz_signs.id as id,quiz_signs.name as name,quiz_answers_signs.weight as weight')->from('quiz_signs')
              ->leftJoin("quiz_answers_signs on quiz_signs.id = quiz_answers_signs.sign_id AND quiz_answers_signs.answer_id = $pk");

        $db->setQuery((string)$query);
        $item->signs = $db->loadObjectList();

        return $item;
    }

    protected function loadFormData()
    {
        // Check the session for previously entered form data.
        $data = JFactory::getApplication()->getUserState('com_quiz.edit.answer.data', array());
        if (empty($data))
        {
            $data = $this->getItem();
        }
        return $data;
    }
}