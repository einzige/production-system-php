<?php defined('_JEXEC') or die('Restricted access');
JHtml::_('behavior.tooltip');
JHtml::_('behavior.formvalidation');
?>
<form action="<?php echo JRoute::_('index.php?option=com_quiz'); ?>" method="post" name="form" id="quiz-form">
    <div>
        <?php foreach($this->form->getFieldset() as $field): ?>
        <?php if (!$field->hidden): ?>
            <?php echo $field->label; ?>
            <?php endif; ?>
        <?php echo $field->input; ?>
        <?php endforeach; ?>

        <input type="hidden" name="task" value="quiz.answer" />
        <?php echo JHtml::_('form.token'); ?>
    </div>
    <h1>Questions</h1>
    <div>
        <?php foreach($this->item->questions as $q): ?>
            <p><?php echo $q->body ?></p>
            <ul>
                <?php foreach($q->answers as $a): ?>
                    <input type="radio" name="jform[quiz_answers_ids][<?php echo $q->id ?>]" value="<?php echo $a->id ?>">&nbsp;<?php echo $a->body ?><br>
                <?php endforeach ?>
            </ul>
        <?php endforeach ?>
    </div>
    <input type="submit" value="Answer!" />
</form>