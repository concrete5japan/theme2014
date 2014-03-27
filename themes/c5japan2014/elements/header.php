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
			$a = new GlobalArea('Top Menu');
			$a->display();
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
