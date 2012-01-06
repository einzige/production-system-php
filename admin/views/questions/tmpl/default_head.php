<?php defined('_JEXEC') or die('Restricted Access'); ?>
<tr>
    <th width="5">
        #ID
    </th>
    <th width="20">
        <input type="checkbox" name="toggle" value="" onclick="checkAll(<?php echo count($this->items); ?>);" />
    </th>
    <th>Position</th>
    <th>
        Question itself
    </th>
</tr>