<?php defined('_JEXEC') or die;

jimport('joomla.form.helper');
JFormHelper::loadFieldClass('list');

class JFormFieldQuiz extends JFormFieldList
{
    protected $type = 'Quiz';
}