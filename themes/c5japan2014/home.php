<?php defined('C5_EXECUTE') or die("Access Denied."); ?>
<!doctype html>
<html lang="<?= LANGUAGE ?>">
<head>
	<?php Loader::element('header_required'); ?>
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta charset="UTF-8">
	<meta http-equiv="content-type" content="text/html; charset=UTF-8">
	<title>concrete5 Japan 日本語公式サイト</title>
	<link rel="stylesheet" href="<?php echo $this->getThemePath(); ?>/css/bootstrap.min.css">
	<link rel="stylesheet" href="<?php echo $this->getThemePath(); ?>/css/font-awesome.min.css">
    <script src="<?php echo $this->getThemePath(); ?>/js/bootstrap.min.js"></script>
</head>

<body>
<div class="container">
	<header>
		<div class="row">
			<div class="col-sm-6 col-xs-12">
				<h1 class="site-logo"><a href="http://concrete5-japan.org/"><img src="http://concrete5-japan.org/themes/c5japan2011/images/c5japanlogo.png" alt="concrete5 日本語公式サイト トップへ"></a></h1>
			</div>
			<div class="col-sm-6 hidden-xs">
				<aside class="header-sns">
					<ul class="fa-ul sns-link">
						<li><a href="#"><i class="fa fa-facebook-square"></i></a></li>
						<li><a href="#"><i class="fa fa-twitter-square"></i></a></li>
						<li><a href="#"><i class="fa fa-youtube-square"></i></a></li>
					</ul>
				</aside>
			</div>
		</div><!--row-->
	</header>
</div><!--container-->

<nav class="navbar navbar-custom" role="navigation">
  <div class="container">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <!-- <span class="navbar-menu">メニュー</span> -->
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
		<?php
			$a = new Area('Top Menu');
			$a->display($c);
		?>
		<ul class="nav navbar-nav navbar-right fa-ul">
				<li><a href="/login/?rcID=1"><i class="fa fa-unlock-alt"></i> ログイン</a></li>
				<li><a href="/register/?rcID=1"><i class="fa fa-user"></i> 新規登録</a></li>
		</ul>

		<form action="http://www.google.co.jp/cse" id="cse-search-box" target="_blank" class="navbar-form" role="search">
				<input type="hidden" name="cx" value="partner-pub-9838343653530325:5ay760-i2hu">
				<input type="hidden" name="ie" value="UTF-8">
				<div class="form-responsive">
					<div class="form-group">
						<input type="text" class="form-control" placeholder="Search">
					</div>
					<button type="submit" class="btn-search"><i class="fa fa-search"></i></button>
				</div>
			</form>
	<!--      <form class="navbar-form navbar-left" role="search">
			<div class="form-group">
			  <input type="text" class="form-control" placeholder="Search">
			</div>
			<button type="submit" class="btn">Submit</button>
		  </form> -->
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>

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

<div class="home-footer">
	<div class="container">
		<div class="row">
			<div class="col-md-4">
				<nav class="footer-nav">
					<?php
						$a = new Area('footer1');
						$a->display($c);
					?>
				</nav>
			</div>
			<div class="col-md-4">
				<nav class="footer-nav">
					<?php
						$a = new Area('footer2');
						$a->display($c);
					?>
				</nav>
			</div>
			<div class="col-md-4">
				<nav class="footer-nav">
					<?php
						$a = new Area('footer3');
						$a->display($c);
					?>
				</nav>
			</div>
		</div><!--row-->
	</div><!--container-->
	<div class="container">
		<footer>
			<p>© 2009-2014 <a href="/">Concrete5 Japan Users Group</a> &amp; <a href="http://concrete5.org" target="_blank">Concrete CMS, Inc.</a>.<br>
			concrete5はMITライセンスで配布されているオープンソースCMSです。<br>
			"concrete5"のロゴならびに名称は、<a href="http://concrete5.org/" target="_blank">Concrete CMS, Inc.</a>と<a href="http://concrete5.co.jp/" target="_blank">コンクリートファイブジャパン株式会社</a>の登録商標です。<a href="/about/use_of_concrete5_logo/">名称とロゴの使用について</a>。<br>
			All rights reserved. サイト内の情報の著作権は放棄しておりません。</p>
		</footer>
	</div><!--container-->
</div><!--home-footer-->
<?php Loader::element('footer_required'); ?>
</body>
</html>