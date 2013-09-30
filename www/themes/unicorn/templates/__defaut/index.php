<!DOCTYPE html>
<html lang="<?php echo T::getLang()?>">
	<head>
		<title><?php echo $adminTitle ?></title>
		<meta charset="UTF-8" />
    <meta name="pusher-key" content="<?php echo PUSHER_AUTH_KEY?>" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <?php
    foreach (Mtpl::getCSS() as $css){
            echo '<link rel="stylesheet" href="/themes/'.Config::getPref('theme').'/css/'.$css['name'].'.css" />';
    }
    foreach (Mtpl::getJS() as $js){
      echo '<script src="/themes/'.Config::getPref('theme').'/js/'.$js.'.js"></script>';
    }
    ?>
	</head>
	<body>
		<div id="header">
			<h1>
        <a href="<?php echo ROOT_ADMIN_URL.ROOT_ADMIN_SCRIPT?>"><?php echo $adminTitle?></a>
      </h1>
		</div>
		<div id="search">
			<input type="text" placeholder="<?php _e('Search Here')?>..."/><button type="submit" class="tip-right" title="Search"><i class="icon-search icon-white"></i></button>
		</div>
		<div id="user-nav" class="navbar navbar-inverse">
        <ul class="nav btn-group">
          <?php $this->i('profile')?>
            <li class="btn btn-inverse" ><a title="" href="#"><i class="icon icon-user"></i> <span class="text"><?php echo $username?></span></a></li>
            <?php $this->i('header')?>
            <?php if(can('edit','preferences')):?>
              <li class="btn btn-inverse"><a title="" href="<?php echo M_Office::URL(array('module'=>'preferences'))?>"><i class="icon icon-cog"></i> <span class="text"><?php _e('Settings')?></span></a></li>
            <?php endif?>
            <li class="btn btn-inverse"><a title="" href="<?php echo ROOT_ADMIN_URL.ROOT_ADMIN_SCRIPT?>?logout=1"><i class="icon icon-share-alt"></i> <span class="text"><?php _e('Logout')?></span></a></li>
        </ul>
    </div>

		<div id="sidebar">
      <?php $this->i('choosetable',array('items' => $choosetable)) ?>
		</div>
		<div id="content">
			<div id="content-header">
				<h1><?php echo $adminHeader ?></h1>

        <!-- <div class="btn-group">
          <a class="btn btn-large tip-bottom" title="Manage Files"><i class="icon-file"></i></a>
          <a class="btn btn-large tip-bottom" title="Manage Users"><i class="icon-user"></i></a>
          <a class="btn btn-large tip-bottom" title="Manage Comments"><i class="icon-comment"></i><span class="label label-important">5</span></a>
          <a class="btn btn-large tip-bottom" title="Manage Orders"><i class="icon-shopping-cart"></i></a>
        </div> -->
			</div>
			<div class="container-fluid">
				<div class="row-fluid">
          <div class="span12">
            <?php $this->i($__action, null, true) ?>
          </div>
        </div>
    </div>
    <div id="overDiv" style="position:absolute; visibility:hidden; z-index:1000;"></div>
		<div id="doc3">
      <div id="hd">
        <div id="messagePanel" style="z-index:1001;display:none">
        	<div class="messageContent">
		    <?php if(is_array($messages) && count($messages)>0):?>
          <?php Mtpl::addJSinline($this->fetch('dialogbox',array('messages'=>$messages)))?>
        <?php endif?>
          	</div>
          	<div class="messageFooter">
          		<a href="javascript:void(0)" id="closepanel">Fermer</a>
          	</div>
          </div>

			<?php
            $menu = $this->i('actionmenu',array('actions'=>$subActions));
			echo $menu;
			?>
			</div>
			<div class="row-fluid">
				<div id="footer" class="span9">
          <?php $this->i('footer',array('regenerate'=>$regenerate,'module'=>$currentmodule))?>
        </div>
        <div class="span3">
          <div style="float:right;font-family:courier;font-size:10px;color:#555">
          <?php echo memory_get_usage()/(1024*1024)?> Mb -
          <?php echo microtime(true) - Config::get('timestarted')?> s
          </div>
				</div>
			</div>
		</div>
		<script type="text/javascript">
		<?php
		if(is_array($javascript)){
				foreach($javascript as $inst) {
					echo $inst."\n";
				}
		}
// =====================================================
// = Javascript for dialog window and any ajax request =
// =====================================================
?>
    $(function() {
       say = function(text) {
         $.gritter.add({
           title:	'',
           text:	text,
           sticky: false
         });
       }
<?php
foreach(Mtpl::getJSinline('ready') as $inst){
	echo $inst."\n";
}
?>
    });
<?php
		if(is_array($onbeforeunLoad)){
			echo 'window.onbeforeunload=function() {
				';
			foreach($onbeforeunLoad as $inst){
				echo $inst."\n";
			}
			echo '}
			';
		}
		if(is_array($onunLoad)){
			echo '$(window).unload(function() {
				';
			foreach($onunLoad as $inst){
				echo $inst."\n";
			}
			echo '});
			';
		}
?>
		</script>

	</body>

</html>