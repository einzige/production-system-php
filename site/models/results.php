<?php jimport('joomla.application.component.model');

class QuizModelResults extends JModel
{
    function __construct()
    {
        parent::__construct();

        $array = JRequest::getVar('cid',  0, '', 'array');
        $this->setId((int)$array[0]);
    }

    function setId($id)
    {
        $this->_id = $id;
        $this->_data = null;
    }


    public function getTable($type = 'Quizzes', $prefix = 'QuizTable', $config = array())
    {
        return JTable::getInstance($type, $prefix, $config);
    }

    function &getData()
    {
        if (empty( $this->_data )) {
            $query = $this->_db->getQuery(true);
            $query->select("quiz_quizzes_results.weight as weight, quiz_results.name as name")
                  ->from("quiz_quizzes_results")
                  ->leftJoin("quiz_results on quiz_quizzes_results.result_id = quiz_results.id")
                  ->where("quiz_quizzes_results.quiz_id = $this->_id")
                  ->order('weight DESC');

            $this->_db->setQuery((string)$query);
            $this->_data = $this->_db->loadObjectList();
        }
        return $this->_data;
    }
}
