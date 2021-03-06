<?php defined('_JEXEC') or die('Restricted access');

jimport('joomla.application.component.modellist');

class QuizModelRules extends JModelList
{
    /**
     * Method to build an SQL query to load the list data.
     *
     * @return	string	An SQL query
     */
    protected function getListQuery()
    {
        return JFactory::getDBO()->getQuery(true)->select('id,description,name')
                                                 ->from('quiz_rules');
    }
}