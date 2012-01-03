<?php defined('_JEXEC') or die('Restricted Access'); ?>
<tr>
    <th width="5">
        #ID
    </th>
    <th width="20">
        <input type="checkbox" name="toggle" value="" onclick="checkAll(<?php echo count($this->items); ?>);" />
    </th>
    <th>Weight</th>
    <th>
        Description
    </th>
    <th>
    </th>
</tr>