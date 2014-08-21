<?php
defined('C5_EXECUTE') or die("Access Denied.");
$this->inc('elements/header.php');
$c = Page::getCurrentPage();
$th = Loader::helper('text');
$ih = Loader::helper('image'); //<--uncomment this line if displaying image attributes (see below)
//Note that $nh (navigation helper) is already loaded for us by the controller (for legacy reasons)

$title = $th->entities($c->getCollectionName());
$description = $c->getCollectionDescription();
$description = $th->makenice($description);	
$img = $c->getAttribute('partner_logo');
$thumb = $ih->getThumbnail($img, 230, 230, true);

$type = $c->getAttribute('partner_type');

$zip = $th->entities($c->getAttribute('partner_zip'));
$address1 = $th->entities($c->getAttribute('partner_address1'));
$address2 = $th->entities($c->getAttribute('partner_address2'));
$dept = $th->entities($c->getAttribute('partner_department'));
$tel = $th->entities($c->getAttribute('partner_tel'));
$fax = $th->entities($c->getAttribute('partner_fax'));
$email = $th->sanitize($c->getAttribute('partner_email'));
$partnerurl = $th->sanitize($c->getAttribute('partner_url'));		
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
<div class="row"><h1><?php echo $title;?></h1></div>
<div class="partner-type row">
	<?php
		if ($type == 'Corporation') echo '<button type="button" class="btn btn-info  btn-sm">法人</button>';
		if ($type == 'Individual') echo '<button type="button" class="btn btn-info  btn-sm">個人</button>';
	?>
</div>
<div class="row">
	<div class="col-sm-4 col-sm-push-8">
		<div class="partner-logo"><a href="<?php echo $partnerurl ?>" target="_blank"><img src="<?php echo $thumb->src ?>" width="<?php echo $thumb->width ?>" height="<?php echo $thumb->height ?>" alt="" class="img-thumbnail" /></a></div>
	</div>
	<div class="partner-desc col-sm-8 col-sm-pull-4">
	<p><?php echo $description; ?></p>
	</div>
</div>
<address>
<table class="partner-address table table-striped table-bordered">
<?php
if ($partnerurl) echo '
<tr><th class="info partner-columnhead">ウェブサイト</th><td class="partner-url"><a href="'. $partnerurl . '" target="_blank">'. $partnerurl . '</a></td></tr>
';
if ($address1) echo '<tr><th class="info">住所</th>
<td>' . $zip . '<br>' . $address1;
if ($address2) echo '<br>' . $address2;
if ($dept) echo '<br>' . $dept;
if ($address1) echo '</td></tr>
';
if ($tel) echo '<tr><th class="info">TEL:</th><td>' . $tel . '</td></tr>
';
if ($fax) echo '<tr><th class="info">FAX:</th><td>' . $fax . '</td></tr>
';
if ($email) echo '<tr><th class="info">Email</th><td><a href="mailto:'. $email . '">お問合せ</a></td></tr>
';
?>
</table>
</address>
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