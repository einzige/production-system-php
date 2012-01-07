<h1>Results</h1>
<?php if (is_array($this->results)): ?>
    <ul>
    <?php foreach($this->results as $r): ?>
        <li><b><?php echo $r->name ?></b>:&nbsp;<?php echo $r->weight ?>&nbsp;баллов</li>
    <?php endforeach ?>
    </ul>
<?php endif ?>