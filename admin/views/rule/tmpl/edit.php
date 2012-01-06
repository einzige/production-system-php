<?php defined('_JEXEC') or die('Restricted access');
JHtml::_('behavior.tooltip');
JHtml::_('behavior.formvalidation');
?>
<form action="<?php echo JRoute::_('index.php?option=com_quiz&layout=edit&id='.(int) $this->item->id); ?>" method="post" name="adminForm" id="rule-form" class="form-validate">
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
    <fieldset class="adminform">
        <legend>Weights for Signs*</legend>
        <?php foreach($this->item->signs as $sign): ?>
        <label for="sign_<?php echo $sign->id ?>">Weight for <b><?php echo $sign->name ?></b>:</label>
        <input type="text"
               id="sign_<?php echo $sign->id ?>"
               name="jform[quiz_signs_ids][<?php echo $sign->id ?>]"
               value="<?php echo $sign->weight ?>" />
        <?php endforeach ?>
    </fieldset>
    <fieldset class="adminform">
        <legend>Weights for Results*</legend>
        <?php foreach($this->item->results as $result): ?>
        <label for="result_<?php echo $result->id ?>">Weight for <b><?php echo $result->name ?></b>:</label>
        <input type="text"
               id="result_<?php echo $result->id ?>"
               name="jform[quiz_results_ids][<?php echo $result->id ?>]"
               value="<?php echo $result->weight ?>" />
        <?php endforeach ?>
    </fieldset>
    * &dash; Only dots supported for numeric values.
</form>