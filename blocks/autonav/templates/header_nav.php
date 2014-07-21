<?php	 defined('C5_EXECUTE') or die("Access Denied.");
$navItems = $controller->getNavItems(true);
?>

<ol class="breadcrumb">

<?php	 foreach ($navItems as $ni) {
	
	$classes = array();
	if ($ni->isCurrent) {
		$classes[] = 'active';
	}
	if ($ni->inPath) {
		$classes[] = 'nav-path-selected';
	}
	if ($ni->isFirst) {
		$classes[] = 'first';
	}
	$classes = implode(" ", $classes);

	if ($ni->isCurrent) {
?>
		<li class="<?php	echo $classes?>">
			<?php	echo $ni->name?>
		</li>

<?php	} else { ?>
		<li class="<?php	echo $classes?>">
			<a class="<?php	echo $classes?>" href="<?php	echo $ni->url?>" target="<?php	echo $ni->target?>"><?php	echo $ni->name?></a>
		</li>
<?php	 } ?>
<?php	 } ?>

</ol>

<div class="ccm-spacer">&nbsp;</div>
