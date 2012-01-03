<?php defined('_JEXEC') or die;

jimport('joomla.form.helper');
JFormHelper::loadFieldClass('list');

class JFormFieldSign extends JFormFieldList
{
    protected $type = 'Sign';

    protected function getOptions()
    {
        $db = JFactory::getDBO();

        $query = new JDatabaseQuery;
        $query->select('#__signs.id as id,name');
        $query->from('#__signs');

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