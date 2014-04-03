<?php defined('C5_EXECUTE') or die("Access Denied.");
 
$navItems = $controller->getNavItems();
 
/**
 * The $navItems variable is an array of objects, each representing a nav menu item.
 * It is a "flattened" one-dimensional list of all nav items -- it is not hierarchical.
 * However, a nested nav menu can be constructed from this "flat" array by
 * looking at various properties of each item to determine its place in the hierarchy
 * (see below, for example $navItem->level, $navItem->subDepth, $navItem->hasSubmenu, etc.)
 *
 * Items in the array are ordered with the first top-level item first, followed by its sub-items, etc.
 *
 * Each nav item object contains the following information:
 *	$navItem->url        : URL to the page
 *	$navItem->name       : page title (already escaped for html output)
 *	$navItem->target     : link target (e.g. "_self" or "_blank")
 *	$navItem->level      : number of levels deep the current menu item is from the top (top-level nav items are 1, their sub-items are 2, etc.)
 *	$navItem->subDepth   : number of levels deep the current menu item is *compared to the next item in the list* (useful for determining how many <ul>'s to close in a nested list)
 *	$navItem->hasSubmenu : true/false -- if this item has one or more sub-items (sometimes useful for CSS styling)
 *	$navItem->isFirst    : true/false -- if this is the first nav item *in its level* (for example, the first sub-item of a top-level item is TRUE)
 *	$navItem->isLast     : true/false -- if this is the last nav item *in its level* (for example, the last sub-item of a top-level item is TRUE)
 *	$navItem->isCurrent  : true/false -- if this nav item represents the page currently being viewed
 *	$navItem->inPath     : true/false -- if this nav item represents a parent page of the page currently being viewed (also true for the page currently being viewed)
 *	$navItem->attrClass  : Value of the 'nav_item_class' custom page attribute (if it exists and is set)
 *	$navItem->isHome     : true/false -- if this nav item represents the home page
 *	$navItem->cID        : collection id of the page this nav item represents
 *	$navItem->cObj       : collection object of the page this nav item represents (use this if you need to access page properties and attributes that aren't already available in the $navItem object)
 */

echo '<nav class="panel-group" id="side-menu' . $bID . '">'; //opens the top-level menu
 
foreach ($navItems as $ni) {
	if ($ni->hasSubmenu && $ni->level === 1){
		$menuno = $ni->cID;
		echo '<div class="panel panel-default">';
		echo '<div class="panel-heading">';
		echo '<h2 class="panel-title">';
		echo '<a data-toggle="collapse" data-parent="#side-menu' . $bID . '" href="#collapse' . $menuno . '">';
		echo '<i class="fa fa-chevron-right pull-right"></i>';
		echo $ni->name;
		echo '</a>';
		echo '</h2>';
		echo '</div>';
		if($ni->inPath) {
			echo '<div id="collapse' . $menuno . '" class="panel-collapse collapse in">';
		} else {
			echo '<div id="collapse' . $menuno . '" class="panel-collapse collapse">';
		}
		echo '<div class="panel-body">';
		echo '<ul class="nav sidenav fa-ul" style="list-style:none ">';
	} elseif($ni->isLast && $ni->level >= 3){
		echo '<li><a href="' . $ni->url . '"><i class="fa fa-li fa-angle-right"></i>' . $ni->name . '</a></li>';
		echo '</ul>';
	} elseif($ni->hasSubmenu && $ni->level >= 2){
		echo '<li><a href="' . $ni->url . '"><i class="fa fa-li fa-play"></i>' . $ni->name . '</a></li>';
		echo '<ul class="fa-ul">';
	} elseif($ni->isLast && $ni->level === 2) {
		echo '<li><a href="' . $ni->url . '"><i class="fa fa-li fa-play"></i>' . $ni->name . '</a></li>';
		echo '</ul>';
		echo '</div>';
		echo '</div>';
		echo '</div>';
	} elseif($ni->level >= 3) {
		echo '<li><a href="' . $ni->url . '"><i class="fa fa-li fa-angle-right"></i>' . $ni->name . '</a></li>';
	} elseif($ni->level === 2) {
		echo '<li><a href="' . $ni->url . '"><i class="fa fa-li fa-play"></i>' . $ni->name . '</a></li>';
	}
}

echo '</nav>'; //closes the top-level menu
