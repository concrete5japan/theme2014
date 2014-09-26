<?php
defined('C5_EXECUTE') or die("Access Denied.");
$this->inc('elements/header.php');
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
		<div id="main" role="main">
			<article class="default-article">
				<div class="visible-xs visible-sm">
						<h1 class="partner-top-title"><img src="<?php echo DIR_REL ?>/files/3414/1037/9714/partner_top_mobile.jpg" alt="concrete5 Japan Partner"></h1>
				</div>
				<div class="visible-md visible-lg">
					<div class="row partner-top-bg1">
						<div class="col-md-12">
							&nbsp;
						</div>
					</div>
					<div class="row partner-top-bg2">
						<div class="col-md-10 col-md-offset-1">
							<div class="row">
								<div class="col-md-4">
									<button type="button" class="btn btn-primary btn-lg btn-block" role="button"><a href="<?php echo DIR_REL ?>/partners/integrate/" class="partner-top-link"><i class="fa fa-wrench"></i> インテグレートパートナー</a></button>
									<p>日本国内で concrete5 を使ったサイト制作を請け負うインテグレートパートナーを紹介します。</p>
									<p><a href="<?php echo DIR_REL ?>/partners/integrate/"><img src="<?php echo DIR_REL ?>/files/7414/1038/3449/integrate.png" alt="concrete5 Integrate Partner"></a></p>
								</div>
								<div class="col-md-4">
									<button type="button" class="btn btn-primary btn-lg btn-block" role="button"><a href="<?php echo DIR_REL ?>/partners/showcase/" class="partner-top-link"><i class="fa fa-list-alt"></i> concrete5 サイト事例</a></button>
									<p>インテグレートパートナーが制作した concrete5 サイトの事例一覧をご紹介します。</p>
								</div>
								<div class="col-md-4">
									<button type="button" class="btn btn-primary btn-lg btn-block" role="button"><a href="<?php echo DIR_REL ?>/partners/solution/" class="partner-top-link"><i class="fa fa-globe"></i> ソリューションパートナー</a></button>
									<p>日本国内で concrete5 を使ったサイト制作サービスを提供するソリューションパートナーを紹介します。</p>
									<p><a href="<?php echo DIR_REL ?>/partners/solution/"><img src="<?php echo DIR_REL ?>/files/4414/1038/3449/solution.png" alt="concrete5 Solution Partner"></a></p>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="visible-xs visible-sm">
					<div class="row">
						<div class="col-sm-6">
							<button type="button" class="btn btn-primary btn-lg btn-block" role="button"><a href="<?php echo DIR_REL ?>/partners/integrate/" class="partner-top-link"><i class="fa fa-wrench"></i> インテグレート−パートナー</a></button>
							<p>日本国内で concrete5 を使ったサイト制作を請け負うインテグレートパートナーを紹介します。</p>
						</div>
						<div class="col-sm-6">
							<button type="button" class="btn btn-primary btn-lg btn-block" role="button"><a href="<?php echo DIR_REL ?>/partners/showcase/" class="partner-top-link"><i class="fa fa-list-alt"></i> concrete5 サイト事例</a></button>
							<p>インテグレートパートナーが制作した concrete5 サイトの事例一覧をご紹介します。</p>
						</div>
						<div class="col-sm-6">
							<button type="button" class="btn btn-primary btn-lg btn-block" role="button"><a href="<?php echo DIR_REL ?>/partners/solution/" class="partner-top-link"><i class="fa fa-globe"></i> ソリューションパートナー</a></button>
							<p>日本国内で concrete5 を使ったサイト制作サービスを提供するソリューションパートナーを紹介します。</p>
						</div>
					</div>
				</div>
					
				
				<?php
					$a = new Area('Main');
					$a->display($c);
				?>
			</article>
		</div>
	</div><!--row-->
</div><!--container-->


<?php $this->inc('elements/footer.php');?>