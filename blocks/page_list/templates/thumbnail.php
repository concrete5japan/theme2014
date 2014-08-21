<?php
	defined('C5_EXECUTE') or die("Access Denied.");
	$textHelper = Loader::helper("text"); 
	$ih = Loader::helper("image"); 
	// now that we're in the specialized content file for this block type, 
	// we'll include this block type's class, and pass the block to it, and get
	// the content
	
	if (count($cArray) > 0) { ?>
	<div class="ccm-page-list">
	<div class="divider"></div> 	
	
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
	
	<div class="ccm-page-list-thumbnail">
	<a href="<?php echo $nh->getLinkToCollection($cobj)?>">
	<img src="<?php 
	    $lfb = $cobj->getCollectionAttributeValue('page_thumbnail');
	    $thumb = $ih->getThumbnail($lfb,120,80, true);
	    echo $thumb->src;
	    ?>" alt="<?php echo $title ?>" />
	</a></div>
	<h3 class="ccm-page-list-title"><a <?php if ($target != '') { ?> target="<?php echo $target?>" <?php } ?> href="<?php echo $nh->getLinkToCollection($cobj)?>"><?php echo $title?></a><?php if ($childrenNum !== '0') { echo ' (' . $childrenNum . ')'; } ?></h3>
	<div class="ccm-page-list-date"><?php echo $cobj->getCollectionDateLastModified ('Y年m月d日'); ?></div>
	<div class="ccm-page-list-description">
		<?php
		if(!$controller->truncateSummaries){
			echo $textHelper->entities($cobj->getCollectionDescription());
		}else{
			echo $textHelper->entities($textHelper->shorten($cobj->getCollectionDescription(),$controller->truncateChars));
		}
		?>
	</div>
	<div class="divider"></div> 	
	
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