<?php defined('C5_EXECUTE') or die("Access Denied.");

// Get parent ID
$cParentID = 0;
switch($controller->displayPages) {
	case 'current':
		$cParentID = $controller->cParentID;
		if ($cParentID < 1) {
			$cParentID = 1;
		}
		break;
	case 'top':
		// top level actually has ID 1 as its parent, since the home page is effectively alone at the top
		$cParentID = 1;
		break;
	case 'above':
		$cParentID = $controller->getParentParentID();
		break;
	case 'below':
		$cParentID = $controller->cID;
		break;
	case 'second_level':
		$cParentID = $controller->getParentAtLevel(2);
		break;
	case 'third_level':
		$cParentID = $controller->getParentAtLevel(3);
		break;
	case 'custom':
		$cParentID = $controller->displayPagesCID;
		break;
	default:
		$cParentID = 1;
		break;
}

$parent = Page::getByID($cParentID);
$parentLink = Loader::helper('navigation')->getLinkToCollection($parent);
?>
<aside class="sidebar-title">
	<a href="<?php echo $parentLink?>"><i class="fa fa-sort-desc"></i><?php echo $parent?></a>
</aside>
<?php
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

echo '<nav class="nav-sidebar">';
echo '<ul class="nav sidenav fa-ul">'; //opens the top-level menu
 
foreach ($navItems as $ni) {
	if ($ni->hasSubmenu && $ni->level === 1){
		$menuno = $ni->cID;
		echo '<li>';
		echo '<a data-toggle="collapse" href="#collapse' . $menuno . '">';
		echo '<i class="fa fa-chevron-right pull-right"></i>';
		echo $ni->name;
		echo '</a>';
		if($ni->inPath) {
			echo '<ul id="collapse' . $menuno . '" class="fa-ul collapse in">';
		} else {
			echo '<ul id="collapse' . $menuno . '" class="fa-ul collapse">';
		}
	} elseif($ni->isLast && $ni->level >= 3){
		echo '<li><a href="' . $ni->url . '"><i class="fa fa-li fa-angle-right"></i>' . $ni->name . '</a></li>';
		echo '</ul></li>';
	} elseif($ni->hasSubmenu && $ni->level >= 2){
		echo '<li><a href="' . $ni->url . '"><i class="fa fa-li fa-play"></i>' . $ni->name . '</a>';
		echo '<ul class="fa-ul">';
	} elseif($ni->isLast && $ni->level === 2) {
		echo '<li><a href="' . $ni->url . '"><i class="fa fa-li fa-play"></i>' . $ni->name . '</a></li>';
		echo '</ul></li>';
	} elseif($ni->level >= 3) {
		echo '<li><a href="' . $ni->url . '"><i class="fa fa-li fa-angle-right"></i>' . $ni->name . '</a></li>';
	} elseif($ni->level === 2) {
		echo '<li><a href="' . $ni->url . '"><i class="fa fa-li fa-play"></i>' . $ni->name . '</a></li>';
	} else {
		echo '<li><a href="' . $ni->url . '">';
		echo '<i class="fa fa-chevron-right pull-right"></i>';
		echo $ni->name;
		echo '</a></li>';
	}

}

echo '</ul>'; //closes the top-level menu
echo '</nav>';