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

$solutionName = $th->sanitize($c->getAttribute('partner_solution_name'));		
$pageThumbnailImage = $c->getAttribute('page_thumbnail');
$poaeThumbnailDisp = $ih->getThumbnail($pageThumbnailImage, 375, 9999, false);
$serviceContactMethod = $th->makenice($c->getAttribute('partner_solution_contactmethod'));
$servicePhone = $th->entities($c->getAttribute('partner_solution_phone'));
$serviceEmail = $th->entities($c->getAttribute('partner_solution_email'));
$serviceBizHour = $th->makenice($c->getAttribute('partner_solution_bizhour'));
$serviceUrl = $th->entities($c->getAttribute('partner_solution_url'));
$serviceEntryUrl = $th->entities($c->getAttribute('partner_solution_entryurl'));
$serviceDesc = $th->makenice($c->getAttribute('partner_solution_description'));



$gaTrackingCompURL = 'onClick="ga(\'send\', \'event\', \'partnerCompLink\', \'click\', \'' . $partnerurl .'\'); " ';
$gaTrackingEmail = 'onClick="ga(\'send\', \'event\', \'partnerEmail\', \'click\', \'' . $email .'\'); " ';
$gaTrackingServiceEmail = 'onClick="ga(\'send\', \'event\', \'partnerServiceEmail\', \'click\', \'' . $serviceEmail .'\'); " ';
$gaTrackingServiceUrl = 'onClick="ga(\'send\', \'event\', \'partnerServiceURL\', \'click\', \'' . $serviceUrl .'\'); " ';
$gaTrackingServiceEntryUrl = 'onClick="ga(\'send\', \'event\', \'partnerServiceEntryURL\', \'click\', \'' . $serviceEntryUrl .'\' ); " ';


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
					$a = new Area('Main');
					$a->display($c);
				?>					
				<div class="row">
					<div class="col-sm-12">
						<h1><?php echo $solutionName ?> <small>by <?php echo $title; ?></small></h1>
					</div>
				</div>
				<div class="row">
					<div class="col-sm-6 col-sm-push-6">
						<div class="partner-logo"><?php if ($serviceUrl) { ?><a href="<?php echo $serviceUrl ?>" target="_blank" <?php echo $gaTrackingServiceUrl ?> ><?php } ?><img src="<?php echo $poaeThumbnailDisp->src ?>" width="<?php echo $poaeThumbnailDisp->width ?>" height="<?php echo $poaeThumbnailDisp->height ?>" alt="" class="img-thumbnail" /><?php if ($serviceUrl) { ?></a><?php } ?></div>
					</div>
					<div class="col-sm-6 col-sm-pull-6">
						<p><?php echo $description ?></p>
				
						<table class="partner-address table table-striped table-bordered">
						<?php
						if ($serviceContactMethod) echo '<tr><th class="info partner-columnhead">申込み方法</th><td>' . $serviceContactMethod . '</td></tr>
						';
						if ($servicePhone) echo '<tr><th class="info">TEL</th><td>' . $servicePhone . '</td></tr>
						';
						if ($serviceEmail) echo '<tr><th class="info">Email</th><td><a href="mailto:'. $serviceEmail . '" ' . $gaTrackingServiceEmail . '>お問合せメール</a></td></tr>
						';
						if ($serviceUrl) echo '
						<tr><th class="info ">Webサイト</th><td class="partner-url"><a href="'. $serviceUrl . '" target="_blank" ' . $gaTrackingServiceUrl . '>'. $serviceUrl . '</a></td></tr>
						';
						?>
						</table>
					</div>
				</div>
				<?php if  ($serviceEntryUrl) { ?>
					<div class="row">
						<div class="col-sm-12">
						<a href="<?php echo $serviceEntryUrl ?>" target="_blank" <?php echo $gaTrackingServiceEntryUrl?>><img src="<?php echo DIR_REL ?>/files/8714/1034/0818/entrybutton.png" alt="お申し込みはこちら"></a>
						</div>
					</div>
				<?php } ?>
				<div class="row partner-solution-credit">
					<div class="col-sm-12">
						<div class="row">
							<div class="col-sm-8"><h3><?php echo $title;?></h3></div>
							<div class="col-sm-4">
							<?php
								if ($partnerType == 'Corporation') echo '<button type="button" class="btn btn-info  btn-sm">法人</button>';
								if ($partnerType == 'Individual') echo '<button type="button" class="btn btn-info  btn-sm">個人</button>';
							?>
							</div>
						</div>
						<div class="row">
							<div class="col-sm-4 col-sm-push-8">
								<div class="partner-logo"><?php if ($partnerUrl) { ?><a href="<?php echo $partnerUrl ?>" target="_blank" <?php echo $gaTrackingURL ?>><?php } ?><img src="<?php echo $thumb->src ?>" width="<?php echo $thumb->width ?>" height="<?php echo $thumb->height ?>" alt="" class="img-thumbnail" /><?php if ($partnerUrl) { ?></a><?php } ?></div>
							</div>
							<div class="partner-desc col-sm-8 col-sm-pull-4">
								<p><?php echo $serviceDesc; ?></p>
								<address class="partner-address">
								<dl class="dl-horizontal">
								<?php
								if ($partnerUrl) echo '
								<dt class="partner-columnhead">ウェブサイト:</dt><dd class="partner-url"><a href="'. $partnerUrl . '" target="_blank" ' . $gaTrackingURL .'>'. $partnerUrl . '</a></dd>
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
								if ($email) echo '<dt>Email:</dt><dd><a href="mailto:'. $email . '" ' . $gaTrackingEmail . '>お問合せ</a></dd>
								';
								?>
								</dl>
								</address>
							</div>
						</div>
					</div>
				</div>				
				<?php					
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