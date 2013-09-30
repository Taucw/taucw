<?php $messtot = $nonlu + $nonrepondu + $contratexped ?>
<li class="btn btn-inverse dropdown" id="menu-messages"><a href="#" data-toggle="dropdown" data-target="#menu-messages" class="dropdown-toggle"><i class="icon icon-envelope"></i> <span class="text">Messages</span> <?php if($messtot):?><span class="label label-important"><?php echo $messtot ?></span><?php endif?> <b class="caret"></b></a>
  <ul class="dropdown-menu">
    <li><a class="sAdd" title="" href="<?php echo M_Office::URL('lead',array(),array_keys($_REQUEST))?>">Leads non lus
      <span class="label <?php if($nonlu>0):?>label-important<?php endif?>"><?php echo $nonlu?></span>
    </a></li>
    <li><a class="sAdd" title="" href="<?php echo M_Office::URL('lead',array(),array_keys($_REQUEST))?>">Leads non répondus
      <span class="label <?php if($nonrepondu>0):?>label-important<?php endif?>"><?php echo $nonrepondu?></span>

    </a></li>
    <li><a class="sInbox" title="" href="echo M_Office::URL('envoi_doc',array(),array_keys($_REQUEST))">Contrats à expédier
      <span class="label <?php if($contratexped>0):?>label-important<?php endif?>"><?php echo $contratexped?></span>

    </a></li>
  </ul>
</li>
<?php if(comTools::hasExpedlogs()):?>
  <li class="btn btn-inverse" id="menu-lorry">
    <a href="<?php echo M_Office_Util::getQueryParams(array('module'=>'administration','action'=>'retourexped'),array_keys($_REQUEST))?>"><i class="icon icon-road"></i> <span class="text">Retours exped</span>
    <span class="label label-important">R</span>
    </a>
  </li>
<?php endif?>

<!-- <div id="shoutbox" style="padding:15px 0 0 0">
<div id="leadbox">
    <a title="contrats à expédier" href="<?php echo M_Office::URL('envoi_doc',array(),array_keys($_REQUEST))?>">
      <span class="aexped<?php if($contratexped>0):?> highlighted<?php endif?>">
        <?php echo $contratexped?>
      </span>
    </a>
    <a title="leads non lus" href="<?php echo M_Office::URL('lead',array(),array_keys($_REQUEST))?>">
      <?php if($nonlu>0):?><span class="label label-important"><?php echo $nonlu?></span><?php endif?>
      <span class="nonlu<?php if($nonlu>0):?> highlighted<?php endif?>">
        <?php echo $nonlu?>
      </span>
    </a>
    <a title="leads non répondus" href="<?php echo M_Office::URL('lead',array(),array_keys($_REQUEST))?>">
      <span class="nonrepondu<?php if($nonrepondu>0):?> highlighted<?php endif?>">
        <?php echo $nonrepondu?>
  </span></a>
  </div>
  <?php if(comTools::hasExpedlogs()):?>

<a  title="Retours d'expédition" href="<?php echo M_Office_Util::getQueryParams(array('module'=>'administration','action'=>'retourexped'),array_keys($_REQUEST))?>">
    <span class="shipbox highlighted">
    R
    </span></a>

  <?php else:?>
    <div  title="Aucun retour d'expédition" class="shipbox">
<a href="<?php echo M_Office_Util::getQueryParams(array('module'=>'administration','action'=>'retourexped'),array_keys($_REQUEST))?>">
      <span class="shipbox">
      0
      </span>
      </a>
    </div>
  <?php endif?>
  </a>
  <div id="shoutboxcontainer" style="display:none">
  <a href="#" class="closebutton"><img src="/images/icons/close.png" alt="fermer" /></a>
    <div id="shoutboxcontent"></div>
  </div>
</div>
<script type="text/javascript">
$(function(){
  var nbexped = parseInt($('.aexped').text());
  var nbnonlu = parseInt($('.nonlu').text());
  var nbnonrepondu = parseInt($('.nonrepondu').text());

  updateBoxes = function(json) {
    var notif='';
    if(nbexped<parseInt(json.contratexped)){
      showMessage(
        (parseInt(json.contratexped)-nbexped)+' Nouveau contrat à expédier. ',
        5000,
        'index.php?module=envoi_doc'
        );
      $('.aexped').text(json.contratexped);
    }
    if(nbnonlu<parseInt(json.nonlu)){
      showMessage(
        (json.nonlu-nbnonlu)+' nouveau lead.',
        5000,
        'index.php?module=envoi_doc'
      );
      $('.nonlu').text(json.nonlu);
    }
    nbnonlu=json.nonlu;
    nbexped = json.contratexped;

  }
  scanBoxes = function(){
    $.getJSON('index.php?module=home&action=headerjson',updateBoxes);
  }
//  setInterval('scanBoxes()',15000);
});
</script> -->