<?php defined('_JEXEC') or die('Restricted Access'); ?>

<?php foreach($this->items as $i => $item): ?>
<tr class="row<?php echo $i % 2; ?>">
    <td>
        <?php echo $item->id; ?>
    </td>
    <td>
        <?php echo JHtml::_('grid.id', $i, $item->id); ?>
    </td>
    <td style="color:green; font-size: 12pt;">
        <?php echo $item->name; ?>
    </td>
    <td>
        <?php echo $item->description; ?>
    </td>
</tr>
<?php endforeach; ?>