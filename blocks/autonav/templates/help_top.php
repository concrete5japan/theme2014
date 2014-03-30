<?php	 defined('C5_EXECUTE') or die("Access Denied.");

$navItems = $controller->getNavItems();

$navSectionCount = 0; //div.rowを3カラムごとに入れる用
$navDepthCount = 0;   //sectionの開始を判定する用
$navhasSubmenuOn = 0; //submenuの有無と階層を判定する用

foreach ($navItems as $ni) {
	//新しいsectionかどうかの判定
	if($navDepthCount === 0){

		//div.rowを3カラムごとに入れる（最後の閉じタグはループの最後）
		if(($navSectionCount % 3)===0 && $navSectionCount===0){
			echo '<div class="row">';
		}
		if(($navSectionCount % 3)===0 && $navSectionCount>0){
			echo '</div>';
			echo '<div class="row">';
		}

		//新しいsectionの場合
		$navSectionCount++;
		echo '<section class="outline col-md-4">';
		echo '<h2><a href="' . $ni->url . '" target="' . $ni->target . '">'. $ni->name . '</a></h2>';

		//submenuがある場合
		if ($ni->hasSubmenu) {
			$navDepthCount++;
			$navhasSubmenuOn++;
			echo '<div class="tile"><ul class="fa-ul icon-play">';
		}
	}else{

		//新しいsectionではない場合
		echo '<li>';
		echo '<a href="' . $ni->url . '" target="' . $ni->target . '"><i class="fa fa-li fa-play"></i>'. $ni->name . '</a>';

		//さらにサブメニューがあるかどうか判定（css未設定）
		if ($ni->hasSubmenu) {
			$navDepthCount++;
			echo '<ul>';
		}else{
			echo '</li>';
			$navDepthCount = $navDepthCount-($ni->subDepth);
			echo str_repeat('</ul></li>', $ni->subDepth);
		}
	}

	//section終了時の処理（submenuなし）
	if($navDepthCount === 0 && $navhasSubmenuOn === 0){
		echo '</section>';
	}

	//section終了時の処理（submenuあり）
	if($navDepthCount === 0 && $navhasSubmenuOn > 0){
		echo '</ul>';
		echo '</div>';		
		echo '</section>';
		$navhasSubmenuOn=0;
	}
}
echo '</div>';