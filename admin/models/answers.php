<?php defined('_JEXEC') or die('Restricted access');

jimport('joomla.application.component.modellist');

class QuizModelAnswers extends JModelList
{
    /**
     * Method to build an SQL query to load the list data.
     *
     * @return	string	An SQL query
     */
    protected function getListQuery()
    {
        return JFactory::getDBO()->getQuery(true)->select('quiz_answers.id as id,quiz_answers.body as body,quiz_answers.position as position,quiz_questions.body as question')
                                                  ->from('quiz_answers')
                                                  ->leftJoin('quiz_questions on question_id = quiz_questions.id')
                                                  ->order('quiz_questions.position, position');
    }
}
