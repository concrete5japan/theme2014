<?php	 defined('C5_EXECUTE') or die("Access Denied.");

$navItems = $controller->getNavItems();

$navDepthCount = 0;
$navhasSubmenuOn = 0;

foreach ($navItems as $ni) {
	if($navDepthCount === 0){
		echo '<section class="outline col-md-4">';
		echo '<h2><a href="' . $ni->url . '" target="' . $ni->target . '">' . $ni->name . '</a></h2>';
		if ($ni->hasSubmenu) {
			$navDepthCount++;
			$navhasSubmenuOn++;
			echo '<div class="tile"><ul class="fa-ul icon-play">';
		}
	}else{
		echo '<li>';
		echo '<a href="' . $ni->url . '" target="' . $ni->target . '">'. $ni->name . '</a>';
		if ($ni->hasSubmenu) {
			$navDepthCount++;
			echo '<ul>';
		}else{
			echo '</li>';
			if($ni->subDepth === 1)$navDepthCount--;
			echo str_repeat('</ul></li>', $ni->subDepth);
		}
	}
	if($navDepthCount === 0 && $navhasSubmenuOn === 0){
		echo '</section>';
	}
	if($navDepthCount === 0 && $navhasSubmenuOn > 0){
		echo '</ul>';
		echo '</div>';		
		echo '</section>';
		$navhasSubmenuOn=0;
	}
}

