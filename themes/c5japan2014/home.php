<?php defined('C5_EXECUTE') or die("Access Denied."); ?>

<?php $this->inc('elements/header.php');?>
<div class="home-video">
	<div class="container">
		<div class="row">
			<div class="col-md-1 hidden-sm"></div>
			<div class="col-md-5 col-sm-7">
				<?php
					$a = new Area('Slideshow');
					$a->display($c);
				?>
			</div>
			<div class="col-md-6 col-sm-5">
				<?php
					$a = new Area('Download');
					$a->display($c);
				?>
			</div>
		</div><!--row-->
	</div><!--contain er-->
</div><!--home-video-->


<div class="container">
	<?php
		$a = new Area("Main");
		$a->display($c);
	?>
</div><!--container-->

<div class="home-user">
	<div class="container">
		<div class="row">
			<div class="col-md-4">
				<section class="section-site-editor">
					<h1 class="text-center"><img src="<?php echo $this->getThemePath(); ?>/images/site_editors.png" alt="サイトエディター" class="img-circle"></h1>
					<?php
						$a = new Area('SiteEditer');
						$a->display($c);
					?>
				</section>
			</div>

			<div class="col-md-4">
				<section class="section-designer">
					<h1 class="text-center"><img src="<?php echo $this->getThemePath(); ?>/images/designers.png" alt="デザイナー" class="img-circle"></h1>
					<?php
						$a = new Area('Designer');
						$a->display($c);
					?>
				</section>
			</div>
			<div class="col-md-4">
				<section class="section-developer">
					<h1 class="text-center"><img src="<?php echo $this->getThemePath(); ?>/images/developers.png" alt="デベロッパー" class="img-circle"></h1>
					<?php
						$a = new Area('Developer');
						$a->display($c);
					?>
				</section>
			</div>
		</div><!--row-->
	</div><!--container-->
</div><!--home-user-->

<div class="home-info">
	<div class="container">
		<div class="row">
			<div class="col-md-4">
				<section class="section-info">
					<?php
						 $a = new Area('Col Left');
						 $a->display($c);
					?>
				</section>
			</div>
			<div class="col-md-4">
				<section class="section-example">
					<?php
						 $a = new Area('Col Center');
						 $a->display($c);
					?>
				</section>
			</div>
			<div class="col-md-4">
				<section class="section-weeklycon">
					<?php
						 $a = new Area('Col Right');
						 $a->display($c);
					?>
				</section>
			</div>
		</div><!--row-->
	</div><!--container-->
</div><!--home-info-->

<div class="home-community">
	<div class="container">
		<div class="row">
			<div class="col-md-6">
				<section class="section-forum">
					<?php
						 $a = new Area('Col Bottom Left');
						 $a->display($c);
					?>
				</section>
			</div>
			<div class="col-md-6">
				<section class="section-community">
					<?php
						 $a = new Area('Col Bottom Right');
						 $a->display($c);
					?>
				</section>
			</div>
		</div><!--row-->
	</div><!--container-->
</div><!--home-community-->

<div class="home-sns">
	<div class="container">
		<div class="row">
			<div class="col-md-6">
				<section class="section-facebook">
					<?php
						$a = new Area('facebook');
						$a->display($c);
					?>
				</section>
			</div>
			<div class="col-md-6">
				<section class="section-twitter">
					<?php
						$a = new Area('twitter');
						$a->display($c);
					?>
				</section>
			</div>
		</div><!--row-->
	</div><!--container-->
</div><!--home-sns-->

<?php $this->inc('elements/footer.php');?>
