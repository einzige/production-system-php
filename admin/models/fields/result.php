<?php defined('_JEXEC') or die;

jimport('joomla.form.helper');
JFormHelper::loadFieldClass('list');

class JFormFieldResult extends JFormFieldList
{
    protected $type = 'Result';

    protected function getOptions()
    {
        $db = JFactory::getDBO();

        $query = new JDatabaseQuery;
        $query->select('quiz_results.id as id,name')->from('quiz_results');

        $db->setQuery((string)$query);

        $messages = $db->loadObjectList();
        $options = array();
        if ($messages)
        {
            foreach($messages as $message)
            {
                $options[] = JHtml::_('select.option', $message->id, $message->name);
            }
        }
        $options = array_merge(parent::getOptions(), $options);
        return $options;
    }
}