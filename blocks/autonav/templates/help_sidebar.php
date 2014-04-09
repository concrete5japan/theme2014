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
	<a href="<?php echo $parentLink?>"><i class="fa fa-sort-desc"></i><?php echo h($parent->getCollectionName());?></a>
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


/*** STEP 1 of 2: Determine all CSS classes (only 2 are enabled by default, but you can un-comment other ones or add your own) ***/
foreach ($navItems as $ni) {
	$classes = array();

	if ($ni->isCurrent) {
		//class for the page currently being viewed
		$classes[] = 'nav-selected';
	}

	if ($ni->inPath) {
		//class for parent items of the page currently being viewed
		$classes[] = 'nav-path-selected';
	}
	
	if ($ni->level == 1) {
		$classes[] = 'fa fa-chevron-right pull-right';
	} elseif ($ni->level == 2) {
		$classes[] = 'fa fa-li fa-play';
	} else {
		$classes[] = 'fa fa-li fa-angle-right';
	}

	/*
	if ($ni->isFirst) {
		//class for the first item in each menu section (first top-level item, and first item of each dropdown sub-menu)
		$classes[] = 'nav-first';
	}
	*/

	/*
	if ($ni->isLast) {
		//class for the last item in each menu section (last top-level item, and last item of each dropdown sub-menu)
		$classes[] = 'nav-last';
	}
	*/

	/*
	if ($ni->hasSubmenu) {
		//class for items that have dropdown sub-menus
		$classes[] = 'nav-dropdown';
	}
	*/

	/*
	if (!empty($ni->attrClass)) {
		//class that can be set by end-user via the 'nav_item_class' custom page attribute
		$classes[] = $ni->attrClass;
	}
	*/

	/*
	if ($ni->isHome) {
		//home page
		$classes[] = 'nav-home';
	}
	*/

	/*
	//unique class for every single menu item
	$classes[] = 'nav-item-' . $ni->cID;
	*/

	//Put all classes together into one space-separated string
	$ni->classes = implode(" ", $classes);
}



//*** Step 2 of 2: Output menu HTML ***/

echo '<nav class="nav-sidebar">';
echo '<ul class="nav sidenav fa-ul">'; //opens the top-level menu

foreach ($navItems as $ni) {

	echo '<li>'; //opens a nav item

	echo '<a href="' . $ni->url . '" target="' . $ni->target . '"><i class="' . $ni->classes . '"></i>' . $ni->name . '</a>';

	if ($ni->hasSubmenu) {
		echo '<ul class="fa-ul">'; //opens a dropdown sub-menu
	} else {
		echo '</li>'; //closes a nav item
		echo str_repeat('</ul></li>', $ni->subDepth); //closes dropdown sub-menu(s) and their top-level nav item(s)
	}
}

echo '</ul>'; //closes the top-level menu
echo '</nav>';
