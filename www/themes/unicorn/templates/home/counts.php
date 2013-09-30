<?php

$expli = array(
  'migrkasat'=>array('expli'=>'Commandes Hotbird ayant demandé la migration Kasat','link'=>M_Office::URL('tag:admin/redirect',array('targetmodule'=>'commande','int_tag'=>'migr_kasat'))),
  'migr_kasat_aexpedier'=>array('expli'=>'Dont kits à expédier ce jour','link'=>M_Office::URL('tag:admin/redirect',array('targetmodule'=>'commande','int_tag'=>'migr_kasat_aexpedier'))),
  'newkasat'=>array('expli'=>'Nouvelles commandes depuis la mise en service de Kasat','link'=>M_Office::URL('tag:admin/redirect',array('targetmodule'=>'commande','ex_tag'=>'hotbird,migr_kasat'))),
  'stillhotbird'=>array('expli'=>'Commande encore sur Hotbird','link'=>M_Office::URL('tag:admin/redirect',array('targetmodule'=>'commande','int_tag'=>'hotbird')))
)
?>
<?php $this->startCapture('stat')?>
<ul class="site-stats">
  <?php foreach($counts as $key=>$count):?>
    <li>
      <a href="<?php echo $expli[$key]['link']?>"><strong><?php echo $count?></strong> <?php echo $key?><br />
        <small><?php echo $expli[$key]['expli']?></small>
      </a>
    </li>
  <?php endforeach?>
  </ul>
<?php $this->endCapture('stat')?>
<?php $this->i('widget',array('content' => $this->getCapture('stat'), 'title' => 'Global', 'size' => 4, 'icon' => 'signal'))?>