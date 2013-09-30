<?php $this->startCapture('stat')?>
<ul class="site-stats">
<?php foreach($counts as $key=>$count):?>
  <li><strong><?php echo $count?></strong>
    <small><?php echo $key?></small>
</li>
<?php endforeach?>
</ul>
<?php $this->endCapture()?>
<?php $this->i('widget',array('content' => $this->getCapture('stat'), 'title' => 'Expéditions à faire', 'size' => 4, 'icon' => 'road'))?>