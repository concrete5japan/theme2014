<?php	 defined('C5_EXECUTE') or die("Access Denied.");
$navItems = $controller->getNavItems();
?>

<ul class="nav sidenav fa-ul">

<?php	 foreach ($navItems as $ni) {
	
	$classes = array();
	if ($ni->isCurrent) {
		$classes[] = 'nav-selected';
	}
	if ($ni->inPath) {
		$classes[] = 'nav-path-selected';
	}
	if ($ni->isFirst) {
		$classes[] = 'first';
	}
	$classes = implode(" ", $classes);
?>

<?php
	if ($ni->isFirst) {
?>
		<li class="<?php	echo $classes?>">
			<a class="<?php	echo $classes?>" href="<?php	echo $ni->url?>" target="<?php	echo $ni->target?>"><i class="fa fa-chevron-right pull-right"></i><?php	echo $ni->name?></a>
<?php	 } else { ?>
		<ul class="fa-ul">
			<li class="<?php	echo $classes?>">
				<a class="<?php	echo $classes?>" href="<?php	echo $ni->url?>" target="<?php	echo $ni->target?>"><i class="fa fa-chevron-right pull-right"></i><?php	echo $ni->name?></a>
			</li>
		</ul>
<?php	 } ?>

<?php	 } ?>

<?php
	if ($ni->isFirst) {
?>
		</li>
<?php	 } ?>

</ul>

<div class="ccm-spacer">&nbsp;</div>