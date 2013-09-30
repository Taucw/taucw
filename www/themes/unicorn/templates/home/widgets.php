<?php
$widgets = array(
  array(
    array('home','counts'),
    array('home','countexpeds'),
  ),
  array(
    array('home','stats',array('title'=>'Clients prélevables','indexes'=>array('recurrent_tasks','annulations'))),
  ),
  array(
    array('home','stats',array('title'=>'Nouvelles commandes','indexes'=>array('nlles_commandes', 'achats_boosters'))),
  ),
  array(
    array('home','statboosters'),
  )
)
    ?>

<?php foreach($widgets[0] as $widget):?>
  <?php echo $this->c($widget[0],$widget[1],$widget[2])?>
<?php endforeach?>
<?php foreach($widgets[1] as $widget):?>
  <?php echo $this->c($widget[0],$widget[1],$widget[2])?>
<?php endforeach?>
<?php foreach($widgets[2] as $widget):?>
  <?php echo $this->c($widget[0],$widget[1],$widget[2])?>
<?php endforeach?>
<?php foreach($widgets[3] as $widget):?>
  <?php echo $this->c($widget[0],$widget[1],$widget[2])?>
<?php endforeach?>
