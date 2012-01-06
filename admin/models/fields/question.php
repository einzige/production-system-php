<?php defined('_JEXEC') or die;

jimport('joomla.form.helper');
JFormHelper::loadFieldClass('list');

class JFormFieldQuestion extends JFormFieldList
{
    protected $type = 'Question';

    protected function getOptions()
    {
        $db = JFactory::getDBO();

        $query = $db->getQuery(true);
        $query->select('quiz_questions.id as id,body');
        $query->from('quiz_questions');

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