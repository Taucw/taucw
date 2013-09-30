<?php $this->startCapture('stat')?>
<table class="table table-bordered table-striped"><thead><tr>
<th></th>
<?php foreach($indexes as $idx):?>
<th><?php echo str_replace('_',' ',$idx)?></th>
<?php endforeach?></tr></thead>
<tbody>
<?php foreach($stats as $date => $items):?>
  <tr><td><strong><?php echo $date?></strong></td>
    <?php foreach($indexes as $idx):?>
      <?php if($items[$idx]):?>
        <td><?php echo $items[$idx]?></td>
      <?php else:?>
        <td class="empty">-</td>
      <?php endif?>
      <?php endforeach?>
  </tr>
<?php endforeach?>

</tbody>
</table>
<?php $this->endCapture() ?>

<?php $this->i('widget',array('content' => $this->getCapture('stat'), 'title' => $title, 'size' => 4, 'icon' => 'signal'))?>