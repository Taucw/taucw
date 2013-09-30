<div id="homewidgets">
<?php
if(can('create_online_commande', 'home')) echo $this->c('home', 'create_online_commandes');
if(can('view_stats', 'home')) $this->i('home/widgets');
?>
</div>
<?php
$this->startCapture('isojs')?>
$('#homewidgets').imagesLoaded(function(){
var $container = $('#homewidgets');
$container.isotope({
  gutterWidth: 10
});

})
<?php $this->endCapture()?>
<?php Mtpl::addJSinline($this->getCapture('isojs'))?>
