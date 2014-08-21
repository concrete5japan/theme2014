<?php
	defined('C5_EXECUTE') or die("Access Denied.");
	$textHelper = Loader::helper("text"); 
	// now that we're in the specialized content file for this block type, 
	// we'll include this block type's class, and pass the block to it, and get
	// the content
	
	if (count($cArray) > 0) { ?>
	<div class="ccm-page-list">
	
	<?php
	for ($i = 0; $i < count($cArray); $i++ ) {
		$cobj = $cArray[$i]; 
		$childrenNum=$cobj->getNumChildren();
		$target = $cobj->getAttribute('nav_target');

		if ($cobj->getCollectionPointerExternalLink() != '') {
			if ($cobj->openCollectionPointerExternalLinkInNewWindow()) {
				$target = "_blank";
			}
		}

		$title = $textHelper->entities($cobj->getCollectionName()); ?>
	
	<p class="ccm-page-list-title"><?php echo $cobj->getCollectionDateLastModified ('m/d'); ?> - <a href="<?php echo $nh->getLinkToCollection($cobj)?>"><?php echo $title?></a></p>	
<?php  } 
	if(!$previewMode && $controller->rss) { 
			$btID = $b->getBlockTypeID();
			$bt = BlockType::getByID($btID);
			$uh = Loader::helper('concrete/urls');
			$rssUrl = $controller->getRssUrl($b);
	} 
	?>
</div>
<?php } 
	
	if ($paginate && $num > 0 && is_object($pl)) {
		$pl->displayPaging();
	}
	
?>