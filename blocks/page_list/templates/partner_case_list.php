<?php
defined('C5_EXECUTE') or die("Access Denied.");
$rssUrl = $showRss ? $controller->getRssUrl($b) : '';
$th = Loader::helper('text');
$ih = Loader::helper('image'); //<--uncomment this line if displaying image attributes (see below)
//Note that $nh (navigation helper) is already loaded for us by the controller (for legacy reasons)
?>

<div class="partner-case-list">
<h2>事例詳細</h2>

	<?php foreach ($pages as $page):

		// Prepare data for each page being listed...
		$title = $th->entities($page->getCollectionName());
		$url = $nh->getLinkToCollection($page);
		$target = ($page->getCollectionPointerExternalLink() != '' && $page->openCollectionPointerExternalLinkInNewWindow()) ? '_blank' : $page->getAttribute('nav_target');
		$target = empty($target) ? '_self' : $target;
		$description = $page->getCollectionDescription();
		$description = $th->wordSafeShortText($description, 250);
		$description = $th->makenice($description);	

		$img = $page->getAttribute('page_thumbnail');
		$thumb = $ih->getThumbnail($img, 375, 500, true);

		$caseurl = $th->sanitize($page->getAttribute('partner_case_url'));		

		$role = $page->getAttribute('partner_case_role');
		$role = str_replace ('\n', ', ', $role);
		
		$category = $th->entities($page->getAttribute('partner_case_category'));
		$category = str_replace ('\n', ', ', $category);
		
		/* The HTML from here through "endforeach" is repeated for every item in the list... */ ?>
		<div class="row partner-case-divider">
			<div class="partner-case-image col-sm-6 col-sm-push-6">
				<?php if ($caseurl) { ?><a href="<?php echo $caseurl ?>" target="_blank"><?php } ?><img src="<?php echo $thumb->src ?>" width="<?php echo $thumb->width ?>" height="<?php echo $thumb->height ?>" alt="" class="img-thumbnail" /><?php if ($caseurl) { ?></a><?php } ?>
			</div>
			<div class="col-sm-6 col-sm-pull-6">
			<h3 class="parter-case-title">
				<a href="<?php echo $url ?>"><?php echo $title ?></a>
			</h3>
			<div class="partner-case-desc">
				<?php echo $description; ?>
			</div>
			<dl class="dl-horizontal">
			<?php
			if ($caseurl) echo '
<dt class="partner-columnhead">ウェブサイトURL</dt><dd class="partner-url"><a href="'. $caseurl . '" target="_blank">'. $caseurl . '</a></dd>
	';
			if ($role) echo '<dt>担当:</dt><dd>' . $role . '</dd>
	';
			if ($category) echo '<dt>サイトカテゴリ:</dt><dd>' . $category . '</dd>
	';
?>
			</dl>
			</div>
		</div>
		
	<?php endforeach; ?>
  
</div><!-- end .ccm-page-list -->


<?php if ($showPagination): ?>
	<div id="pagination">
		<div class="ccm-spacer"></div>
		<div class="ccm-pagination">
			<span class="ccm-page-left"><?php echo $paginator->getPrevious('&laquo; ' . t('Previous')) ?></span>
			<?php echo $paginator->getPages() ?>
			<span class="ccm-page-right"><?php echo $paginator->getNext(t('Next') . ' &raquo;') ?></span>
		</div>
	</div>
<?php endif; ?>
