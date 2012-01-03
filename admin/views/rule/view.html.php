<?php defined( '_JEXEC' ) or die( 'Restricted access' );

jimport( 'joomla.application.component.view');
require_once JPATH_COMPONENT.DS.'models'.DS.'rule'.'.php';

class RulesViewRules extends JView
{
    function display($tpl = null)
    {
        $rule = $this->loadRule();
        $isNew = ($rule->id < 1);

        $text = $isNew ? JText::_( 'New' ) : JText::_( 'Edit' );
        $title = JText::_( 'Rule' ).': <small><small>[ ' . $text.' ]</small></small>';
        JToolBarHelper::title($title);
        JToolBarHelper::title($title);
        JToolBarHelper::save();

        if ($isNew)  {
            JToolBarHelper::cancel();
        } else {
            JToolBarHelper::cancel( 'cancel', 'Close' );
        }

        $this->assignRef('rule', $rule);

        parent::display($tpl);
    }

    // TODO (SZ): move to controller.
    function loadRule() {
        $model = new RulesModelRule();
        $rule = & $model->getData();
        return $rule;
    }
}