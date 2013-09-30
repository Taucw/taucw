<?php if(empty($_REQUEST['module'])) $activeClass="active" ?>
<a href="<?php echo ROOT_ADMIN_URL.ROOT_ADMIN_SCRIPT ?>" class="<?php echo $activeClass?> visible-phone"><i class="icon icon-home"></i> <?php _e('Dashboard')?></a>
<ul>
	<li class="<?php echo $activeClass?>"><a href="<?php echo ROOT_ADMIN_URL.ROOT_ADMIN_SCRIPT ?>"><i class="icon icon-home"></i> <span><?php _e('Dashboard')?></span></a></li>
  <?php foreach($items as $item):?>
    <li class="<?php if($item['submodules']):?>submenu<?php endif?> <?php if($item['expanded']):?>open active<?php elseif($item['active']):?>active<?php endif?>">
      <?php $icon = $item['icon'] ? 'icon-'.$item['icon'] : 'icon-th-list' ?>
      <a href="<?php echo $item['url'] ? $item['url']: '#'?>">
        <i class="icon <?php echo $icon ?>"></i> <span><?php echo $item['title']?></span>
        <?php if($item['submodules']):?>
          <span class="label"><?php echo count($item['submodules'])?></span>
        <?php endif?>
      </a>
      <?php if($item['submodules']):?>
        <ul>
          <?php foreach($item['submodules'] as $subitem):?>
            <li class="<?php if($subitem['active']):?>active<?php endif?>"><a href="<?php echo $subitem['url']?>"><?php echo $subitem['title']?></a></li>
          <?php endforeach?>
        </ul>
        <?php endif?>
    </li>
  <?php endforeach?>
</ul>