<?php defined('_JEXEC') or die('Restricted access');

jimport('joomla.application.component.modellist');

class QuizModelSigns extends JModelList
{
    /**
     * Method to build an SQL query to load the list data.
     *
     * @return	string	An SQL query
     */
    protected function getListQuery()
    {
        return JFactory::getDBO()->getQuery(true)->select('id,name,description')
                                                 ->from('quiz_signs');
    }
}