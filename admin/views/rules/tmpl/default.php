<div>
    <h1>List of rules.</h1>
    <table class="adminlist">
        <thead>
            <th class="left">ID</th>
            <th class="nowrap">Weight</th>
            <th class="nowrap">Description</th>
            <th class="nowrap"></th>
        </thead>
        <tfoot></tfoot>
        <?php foreach ($this->rules as $item ) : ?>
            <tr>
                <td width="5">
                    <?php echo $item->id; ?>
                </td>
                <td width="20" class="center" style="color:red; font-size: 14pt;">
                    <?php echo $item->weight; ?>
                </td>
                <td style="color:green; font-size: 12pt;">
                    <?php echo $item->body; ?>
                </td>
                <td class="center" style="color:orange; font-size: 9pt;">
                    <?php echo '<a href="index.php?option=com_production_system&controller=rules&task=edit&cid='.$item->id.'"'.'>edit</a>'; ?>
                </td>
            </tr>
        <?php endforeach ?>
    </table>
</div>