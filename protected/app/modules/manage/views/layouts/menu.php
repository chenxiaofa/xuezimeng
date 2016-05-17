<ul class="nav nav-list">
	<?php
	$this->renderMenu();
	foreach($this->menu as $menu):
		$text = array_key_exists('name',$menu)?$menu['name']:'';
		$icon = array_key_exists('icon',$menu)?$menu['icon']:'';
		$url = array_key_exists('url',$menu)?$menu['url']:'javascript:void(0);';
		$subMenu = array_key_exists('sub_menu',$menu)?$menu['sub_menu']:array();
		$hasMenu = !empty($subMenu);
		$isActive = array_key_exists('is_active',$menu);
		?>
		<li class="<?php if ($isActive)echo 'active'; ?>">
			<a href="<?php echo $url;?>" class="<?php if ($hasMenu)echo 'dropdown-toggle'; ?>">
				<i class="<?php echo $icon?>"></i>
				<span class="menu-text"> <?php echo $text?> </span>
				<?php if ($hasMenu && !$isActive): ?><b class="arrow icon-angle-down"></b><?php endif;?>
			</a>
			<?php if ($hasMenu): ?>
				<ul class="submenu">
					<?php foreach($subMenu as $m):
						$text = array_key_exists('name',$m)?$m['name']:'';
						$icon = array_key_exists('icon',$m)?$m['icon']:'';
						$url = array_key_exists('url',$m)?$m['url']:'javascript:void(0);';
						$subIsActive = array_key_exists('is_active',$m);
						?>
						<li class="<?php if ($subIsActive)echo 'active'; ?>">
							<a  href="<?php echo $url;?>">
								<i class="<?php echo $icon;?>"></i>
								<?php echo $text;?>
							</a>
						</li>
					<?php endforeach; ?>
				</ul>
			<?php endif;?>
		</li>
	<?php endforeach;?>
</ul><!-- /.nav-list -->