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
		$a = new Area("Top Bannar");
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
					<h1>お知らせ</h1>
					<?php
						 $a = new Area('Main');
						 $a->display($c);
					?>
				</section>
			</div>
			<div class="col-md-4">
				<section class="section-example">
					<h1>導入事例</h1>
					<?php
						$a = new Area('Showcase');
						$a->display($c);
					?>
				</section>
			</div>
			<div class="col-md-4">
				<section class="section-weeklycon">
					<h1>週間 concrete5</h1>
					<p class="UstreamStatus text-center">
						<a href="http://youtube.com/concrete5japan" alt="YouTube公式チャンネル" target="_blank"><img src="http://concrete5-japan.org/blocks/ustream_status_simple/images/ust_status_2_off.gif" alt="YouTubeチャンネル"></a>
					</p>
					<p>concrete5 で、Ustream勉強会を全5回開催して来ましたが、月1回よりも定期的に、そして気楽に concrete5 のことを話し合えるような場所を設けたいという気持ちから「週刊 concrete5」というUstreamでのトーク番組を開始しました。</p>
					<p class="text-center"><a href="http://youtube.com/concrete5japan" class="btn btn-primary btn-xs"><i class="fa fa-play pull-left icon-btn-more"></i> and more...</a></p>
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
					<h1>フォーラム</h1>
					<?php
						 $a = new Area('Main2');
						 $a->display($c);
					?>
				</section>
			</div>
			<div class="col-md-6">
				<section class="section-community">
					<h1>コミュニティ</h1>
					<p>ここは、concrete5 日本語版の公式コミュニティーサイトです。</p>
					<div class="row">
						<div class="col-xs-6">
							<div class="btn-navy text-center"><a class="btn btn-success btn-lg" href="/login/?rcID=1"><i class="fa fa-unlock-alt pull-left icon-btn-navy"></i> ログイン</a></div>
						</div>
						<div class="col-xs-6">
							<div class="btn-navy text-center"><a class="btn btn-success btn-lg" href="/register/?rcID=1"><i class="fa fa-user pull-left icon-btn-navy"></i>  新規登録</a></div>
						</div>
					</div>
					<p>カテゴリー全体、もしくは個々のスレッドに新規投稿があった場合、メールでお知らせします。カテゴリースレッド一覧。もしくは、各スレッドのどこかにある「モニタリング（新着メール通知）」をクリックしてみて下さい。</p>
					<p class="btn-more text-right"><a href="#" class="btn btn-primary btn-xs"><i class="fa fa-play pull-left icon-btn-more"></i> and more...</a></p>
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