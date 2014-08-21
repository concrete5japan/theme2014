<?php
defined('C5_EXECUTE') or die("Access Denied.");
$rssUrl = $showRss ? $controller->getRssUrl($b) : '';
$th = Loader::helper('text');
$ih = Loader::helper('image'); //<--uncomment this line if displaying image attributes (see below)
//Note that $nh (navigation helper) is already loaded for us by the controller (for legacy reasons)
?>

<div class="partner-list">

	<?php foreach ($pages as $page):

		// Prepare data for each page being listed...
		$title = $th->entities($page->getCollectionName());
		$url = $nh->getLinkToCollection($page);
		$target = ($page->getCollectionPointerExternalLink() != '' && $page->openCollectionPointerExternalLinkInNewWindow()) ? '_blank' : $page->getAttribute('nav_target');
		$target = empty($target) ? '_self' : $target;
		$description = $page->getCollectionDescription();
		$description = $th->wordSafeShortText($description, 250);
		$description = $th->makenice($description);	
		$img = $page->getAttribute('partner_logo');
		$thumb = $ih->getThumbnail($img, 230, 230, true);

		$type = $page->getAttribute('partner_type');
		
		$zip = $th->entities($page->getAttribute('partner_zip'));
		$address1 = $th->entities($page->getAttribute('partner_address1'));
		$address2 = $th->entities($page->getAttribute('partner_address2'));
		$dept = $th->entities($page->getAttribute('partner_department'));
		$tel = $th->entities($page->getAttribute('partner_tel'));
		$fax = $th->entities($page->getAttribute('partner_fax'));
		$email = $th->sanitize($page->getAttribute('partner_email'));
		$partnerurl = $th->sanitize($page->getAttribute('partner_url'));		
		
		/* The HTML from here through "endforeach" is repeated for every item in the list... */ ?>
		<div class="partner-divider">
			<div class="row">
				<div class="col-sm-8"><h3 class="parter-title">
					<a href="<?php echo $url ?>" target="<?php echo $target ?>"><?php echo $title ?></a>
				</h3></div>
				<div class="partner-type col-sm-4">
					<?php
					if ($type == 'Corporation') echo '<button type="button" class="btn btn-info  btn-sm">法人</button>';
					if ($type == 'Individual') echo '<button type="button" class="btn btn-info  btn-sm">個人</button>';
					?>
				</div>
			</div>
			<div class="row">
				<div class="partner-type col-sm-4 col-sm-push-8">
					<div class="partner-logo"><a href="<?php echo $url ?>" target="<?php echo $target ?>"><img src="<?php echo $thumb->src ?>" width="<?php echo $thumb->width ?>" height="<?php echo $thumb->height ?>" alt="" class="img-thumbnail" /></a></div>
				</div>
				<div class="col-sm-8 col-sm-pull-4">
					<div class="partner-desc">
						<?php echo $description; ?>
					</div>
					<address class="partner-address">
					<dl class="dl-horizontal">
					<?php
					if ($partnerurl) echo '
		<dt class="partner-columnhead">ウェブサイト</dt><dd class="partner-url"><a href="'. $partnerurl . '" target="_blank">'. $partnerurl . '</a></dd>
		';
					if ($address1) echo '<dt>住所</dt>
		<dd>' . $zip . '<br>' . $address1;
					if ($address2) echo '<br>' . $address2;
					if ($dept) echo '<br>' . $dept;
					if ($address1) echo '</dd>
		';
					if ($tel) echo '<dt>TEL:</dt><dd>' . $tel . '</dd>
		';
					if ($fax) echo '<dt>FAX:</dt><dd> ' . $fax . '</dd>
		';
					if ($email) echo '<dt>Email</dt><dd><a href="mailto:'. $email . '">お問合せ</a></dd>
		';
					?>
					</dl>
					</address>
				</div>
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
