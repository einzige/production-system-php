<h1>Results</h1>
<?php if (is_array($this->results)): ?>
    <ul>
    <?php foreach($this->results as $r): ?>
      <?php if ($r->weight > 0): ?>
        <li>
          <b><?php echo $r->name ?></b>:&nbsp;<?php echo $r->weight ?>&nbsp;баллов
          <div style="color: gray"><?php echo $r->description ?></div>
        </li>
      <?php endif ?>
    <?php endforeach ?>
    </ul>
<?php endif ?>
