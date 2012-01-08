<?php defined( '_JEXEC' ) or die( 'Restricted access' );

require_once(JPATH_COMPONENT_SITE.DS.'lib'.DS.'models'.DS.'quiz_ext_model.php');
require_once(JPATH_COMPONENT_SITE.DS.'models'.DS.'questions.php');
require_once(JPATH_COMPONENT_SITE.DS.'tables'.DS.'quizzes.php');

class QuizModelQuiz extends QuizExtModel
{
    var $results = Array();
    var $questions = Array();
    var $associations = Array("results" => Array("fk"             => "quiz_id",
                                                 "weights_table"  => "quiz_quizzes_results",
                                                 "weighted_table" => "quiz_results",
                                                 "weighted_fk"    => "result_id"));

    public function getTable($type = 'Quizzes', $prefix = 'QuizTable', $config = array())
    {
        return JTable::getInstance($type, $prefix, $config);
    }

    public function getForm($data = array(), $loadData = true)
    {
        $form = $this->loadForm('com_quiz.quiz', 'quiz', array('control' => 'jform', 'load_data' => $loadData));
        if (empty($form)) return false;
        return $form;
    }

    public function getScript()
    {
        return 'administrator/components/com_quiz/models/forms/quiz.js';
    }

    public function save($data) {
        $result = JModelAdmin::save($data);

        // Calculate sign weights (as a sum of weights for each answer).
        $weights = Array();
        foreach(array_values($data['quiz_answers_ids']) as $answer_id) {
            $this->_db->setQuery("select quiz_answers_signs.weight  as weight,
                                         quiz_answers_signs.sign_id as sign_id
                                  from   quiz_answers_signs
                                  where  answer_id=$answer_id");

            // Initialize weights.
            // NOTE(SZ): you can do it in SQL;
            foreach($this->_db->loadObjectList() as $i)
                $weights[$i->sign_id] = isset($weights[$i->sign_id]) ?
                                              $weights[$i->sign_id] * $i->weight : $i->weight;
        }

        // Build query.
        $conditions = Array();
        $joins      = Array();
        foreach($weights as $s => $w)
        {
            $conditions[]= "(rs$s.weight <= $w AND rs$s.sign_id = $s)";
            $joins     []= "left join quiz_rules_signs AS rs$s on  quiz_rules.id = rs$s.rule_id";
        }
        $where_condition = join(" AND ", $conditions);
        $joins_condition = join(" \n ", $joins);

        // Get rule ids where conditions are passing sign weights.
        $rule_ids = $this->_db->setQuery("select quiz_rules.id from quiz_rules $joins_condition WHERE $where_condition")
                              ->loadResultArray();

        // Get results from rules.
        // Calculate weight for each result.
        $weights = Array();
        foreach($rule_ids as $rule_id) {
            $results = $this->_db->setQuery("select quiz_results.id, quiz_rules_results.weight
                                             from   quiz_results

                                             left join quiz_rules_results on quiz_results.id = quiz_rules_results.result_id
                                             left join quiz_rules         on quiz_rules_results.rule_id = quiz_rules.id

                                             where quiz_rules.id = $rule_id")->loadObjectList();
            foreach($results as $row)
                $weights[$row->id] = isset($weights[$row->id]) ?
                                           $weights[$row->id] * $row->weight : $row->weight;
        }

        // Create report.
        $pk	= $this->getPK($data);
        foreach($weights as $id => $weight)
            $this->_db->setQuery("insert into quiz_quizzes_results(result_id, weight, quiz_id) values($id, $weight, $pk)")->query();

        // Set result here;
        return $result;
    }

    public function getItem($pk=null) {
        $item = parent::getItem($pk);
        $item->questions = QuizModelQuestions::all();

        return $item;
    }

    protected function loadFormData()
    {
        $data = JFactory::getApplication()->getUserState('com_quiz.edit.quiz.data', array());
        if (empty($data)) $data = $this->getItem();
        return $data;
    }
}
