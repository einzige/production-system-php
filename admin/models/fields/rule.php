<?php defined('_JEXEC') or die;

jimport('joomla.form.helper');
JFormHelper::loadFieldClass('list');

class JFormFieldRule extends JFormFieldList
{
    protected $type = 'Rule';

    protected function getOptions()
    {
        $db = JFactory::getDBO();

        $query = new JDatabaseQuery;
        $query->select('#__rules.id as id,body');
        $query->from('#__rules');

        $db->setQuery((string)$query);

        $messages = $db->loadObjectList();
        $options = array();
        if ($messages)
        {
            foreach($messages as $message)
            {
                $options[] = JHtml::_('select.option', $message->id, $message->body);
            }
        }
        $options = array_merge(parent::getOptions(), $options);
        return $options;
    }
}