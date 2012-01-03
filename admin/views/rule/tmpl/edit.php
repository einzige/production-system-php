<?php defined('_JEXEC') or die('Restricted access');
JHtml::_('behavior.tooltip');
JHtml::_('behavior.formvalidation');
?>
<form action="<?php echo JRoute::_('index.php?option=com_production_system&layout=edit&id='.(int) $this->item->id); ?>" method="post" name="adminForm" id="rule-form" class="form-validate">
    <fieldset class="adminform">
        <legend>Rule editor</legend>
        <?php foreach($this->form->getFieldset() as $field): ?>
        <?php if (!$field->hidden): ?>
            <?php echo $field->label; ?>
            <?php endif; ?>
        <?php echo $field->input; ?>
        <?php endforeach; ?>
    </fieldset>
    <div>
        <input type="hidden" name="task" value="rule.edit" />
        <?php echo JHtml::_('form.token'); ?>
    </div>
</form>