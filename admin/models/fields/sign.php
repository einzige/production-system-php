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
        $query->select('quiz_signs.id as id,name');
        $query->from('quiz_signs');

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