<?php defined( '_JEXEC' ) or die( 'Restricted access' );

jimport('joomla.application.component.model');

class QuizModelQuestions
{
    public function all() {
        $db = JFactory::getDBO();

        $questions = $db->setQuery("select * from quiz_questions")->loadObjectList();

        foreach($questions as &$q) {
            $q->answers = $db->setQuery("select * from quiz_answers where question_id = $q->id")->loadObjectList();
        }

        return $questions;
    }
}