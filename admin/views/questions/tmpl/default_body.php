<?php defined('_JEXEC') or die('Restricted Access'); ?>

<?php foreach($this->items as $i => $item): ?>
<tr class="row<?php echo $i % 2; ?>">
    <td>
        <?php echo $item->id; ?>
    </td>
    <td>
        <?php echo JHtml::_('grid.id', $i, $item->id); ?>
    </td>
    <td class="center" style="color:red; font-size: 14pt;">
        <?php echo $item->position; ?>
    </td>
    <td>
        <?php echo $item->body; ?>
    </td>
</tr>
<?php endforeach; ?>