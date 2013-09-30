<?php $this->startCapture('stat')?>
  <p>
    <a class="btn btn-block" target="_blank" href="<?php echo SECURE_SITE_URL.'/inscription/pays' ?>">Nouvelle commande manuelle ou installateur</a><br />
    <?php foreach($pays as $p):?>

      <a class="btn btn-block" target="_blank" href="<?php echo SECURE_SITE_URL.'/inscription?country='.$p->code.'&coupon=' ?>">Nouvelle commande manuelle <?php echo $p->name ?></a><br />

    <?php endforeach?>
    <?php foreach($coupons as $coupon):?>

      <a class="btn btn-block" target="_blank" href="<?php echo SECURE_SITE_URL.'/inscription?coupon='.$coupon->code.'&country=fr' ?>">Nouvelle commande <?php echo $coupon->operator_shortcut_name?></a><br />

    <?php endforeach ?>
<?php $this->endCapture('stat')?>
<?php $this->i('widget',array('content' => $this->getCapture('stat'), 'title' => 'Créer une commande', 'size' => 4, 'icon' => 'plus-sign'))?>