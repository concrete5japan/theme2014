<?php
defined('C5_EXECUTE') or die("Access Denied.");
$this->inc('elements/header.php');
$c = Page::getCurrentPage();
$th = Loader::helper('text');
$ih = Loader::helper('image');
$nh = Loader::helper('navigation');

// Case Detail
$title = $th->entities($c->getCollectionName());
$description = $c->getCollectionDescription();
$description = $th->makenice($description);	
$img = $c->getAttribute('page_thumbnail');
$thumb = $ih->getThumbnail($img, 375, 2000, false);
$caseurl = $th->sanitize($c->getAttribute('partner_case_url'));		

$role = $c->getAttribute('partner_case_role');
echo '<!--
';
var_dump($role);
echo '-->';
$role = str_replace ("\n", ', ', $role);

$category = $th->entities($c->getAttribute('partner_case_category'));
$category = str_replace ("\n", ', ', $category);


// Get the parent ID
$ParentPage = page::getByID($c->getCollectionParentID());
$partnerName = $th->entities($ParentPage->getCollectionName());
$partnerPage = $nh->getLinkToCollection($ParentPage);
$partnerDescription = $ParentPage->getCollectionDescription();
$partnerDescription = $controller->truncateSummaries ? $th->wordSafeShortText($description, $controller->truncateChars) : $partnerDescription;
$partnerDescription = $th->makenice($partnerDescription);	
$partnerImg = $ParentPage->getAttribute('partner_logo');
$partnerThumb = $ih->getThumbnail($partnerImg, 230, 230, true);

$partnerType = $ParentPage->getAttribute('partner_type');

$zip = $th->entities($ParentPage->getAttribute('partner_zip'));
$address1 = $th->entities($ParentPage->getAttribute('partner_address1'));
$address2 = $th->entities($ParentPage->getAttribute('partner_address2'));
$dept = $th->entities($ParentPage->getAttribute('partner_department'));
$tel = $th->entities($ParentPage->getAttribute('partner_tel'));
$fax = $th->entities($ParentPage->getAttribute('partner_fax'));
$email = $th->sanitize($ParentPage->getAttribute('partner_email'));
$partnerUrl = $th->sanitize($ParentPage->getAttribute('partner_url'));		
?>

<div class="breadcrumb-container">
	<nav class="container">
		<?php
		    $a = new GlobalArea('Header');
		    $a->display();
		?>
	</nav>
</div>

<div class="container">
	<div class="row">
		<div id="main" class="col-md-8" role="main">
			<article class="default-article">
				<?php
					$a = new GlobalArea('SocialButton');
					$a->display();
?>					




<div class="row"><h1 class="parter-case-title">事例：<?php echo $title ?></h1></div>
<div class="row">
	<div class="partner-case-image col-sm-6 col-sm-push-6">
		<?php if ($caseurl) { ?><a href="<?php echo $caseurl ?>" target="<?php echo $target ?>"><?php } ?><img src="<?php echo $thumb->src ?>" width="<?php echo $thumb->width ?>" height="<?php echo $thumb->height ?>" alt="" class="img-thumbnail" /><?php if ($caseurl) { ?></a><?php } ?>
	</div>
	<div class="col-sm-6 col-sm-pull-6">
	<div class="partner-case-desc">
		<?php echo $description; ?>
	</div>
	<table class="partner-address table table-striped table-bordered">
	<?php
	if ($caseurl) echo '
<tr><th class="info partner-columnhead">URL:</th><td class="partner-url"><a href="'. $caseurl . '" target="_blank">'. $caseurl . '</a></td></tr>
';
	if ($role) echo '<tr><th class="info">担当:</th><td>' . $role . '</td></tr>
';
	if ($category) echo '<tr><th class="info partner-columnhead">カテゴリ:</th><td>' . $category . '</td></tr>
';
?>
	</table>
	</div>
</div>


<div class="row partner-case-credit">
	<div class="row"><div class="col-sm-8"><h3><a href="<?php echo $partnerPage ?>"><?php echo $partnerName;?></a></h3></div>
	<div class="col-sm-4">
		<?php
			if ($partnerType == 'Corporation') echo '<button type="button" class="btn btn-info  btn-sm">法人</button>';
			if ($partnerType == 'Individual') echo '<button type="button" class="btn btn-info  btn-sm">個人</button>';
		?>
	</div></div>
	<div class="row">
		<div class="col-sm-4 col-sm-push-8">
			<div class="partner-logo"><a href="<?php echo $partnerPage ?>"><img src="<?php echo $partnerThumb->src ?>" width="<?php echo $partnerThumb->width ?>" height="<?php echo $partnerThumb->height ?>" alt="" class="img-thumbnail" /></a></div>
			<p><a href="<?php echo $partnerPage ?>"><?php echo $partnerName;?>の他の事例を見る</a></p>
		</div>
		<div class="partner-desc col-sm-8 col-sm-pull-4">
			<p><?php echo $partnerDescription; ?></p>
			<address class="partner-address">
			<dl class="dl-horizontal">
			<?php
			if ($partnerUrl) echo '
			<dt class="partner-columnhead">ウェブサイト:</dt><dd class="partner-url"><a href="'. $partnerUrl . '" target="_blank">'. $partnerUrl . '</a></dd>
			';
			if ($address1) echo '<dt>住所:</dt>
			<dd>' . $zip . '<br>' . $address1;
			if ($address2) echo '<br>' . $address2;
			if ($dept) echo '<br>' . $dept;
			if ($address1) echo '</dd>
			';
			if ($tel) echo '<dt>TEL:</dt><dd>' . $tel . '</dd>
			';
			if ($fax) echo '<dt>FAX:</dt><dd> ' . $fax . '</dd>
			';
			if ($email) echo '<dt>Email:</dt><dd><a href="mailto:'. $email . '">お問合せ</a></dd>
			';
			?>
			</dl>
			</address>
		</div>
	</div>
</div>
<?php					
					$a = new Area('Main');
					$a->display($c);
					$a = new GlobalArea('SocialButton');
					$a->display();
				?>
			</article>
		</div>
		<div id="sidebar" class="col-md-4" role="complementary">
			<?php
				$a = new Area('Sidebar');
				$a->display($c);
			?>
		</div>
	</div><!--row-->
</div><!--container-->


<?php $this->inc('elements/footer.php');?>