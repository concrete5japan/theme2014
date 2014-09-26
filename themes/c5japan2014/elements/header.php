<?php defined('C5_EXECUTE') or die("Access Denied.");
$c = Page::getCurrentPage();
?>
<!doctype html>
<html lang="<?php echo LANGUAGE ?>">
<head>
<!--
concrete5 Japan 2014 Theme is created by

<< Direction >>
Takuro Hishikawa	@HissyNC	(http://concrete5.co.jp/)
Katz Ueno		@katzueno	(http://concrete5.co.jp/)
Hirofumi Inoue		@acliss19xx	(concrete5 Kansai User Group)

<< Design >>
Atsushi Sugiyama	@pictron2009	(http://pictron.net)

<< Coding >>
Naoko Tokumoto		@twit_natasha	(http://natasha.jp/)
Junko Kodera		@kozaru_kodera	(http://corogari.net/)

<< Special Thanks >>
Kojiro Fukazawa, Kazuki Maruyama, Hisayoshi Izaki, Hiromasa Ishizaki, Mami Kuroki, Takayuki Kaneko, Kawaguchan, Yoshiko Sarakai, Shinichi Nakane, Tomohisa Yoshikawa, Yuriko Horikawa

JUSO Coworking

-->
	<?php Loader::element('header_required'); ?>
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="<?php echo $this->getThemePath(); ?>/css/bootstrap.min.css">
	<link rel="stylesheet" href="<?php echo $this->getThemePath(); ?>/css/font-awesome.min.css">
	<link rel="stylesheet" href="<?php echo $this->getThemePath(); ?>/main.css">
    <script src="<?php echo $this->getThemePath(); ?>/js/bootstrap.min.js"></script>
    
</head>

<body>
<div class="container">
	<header>
		<div class="row">
			<div class="col-sm-6 col-xs-12">
			<?php
				$a = new GlobalArea('Site Name');
				$a->display();
			?>
			</div>
			<div class="col-sm-6 hidden-xs">
				<aside class="header-sns">
					<ul class="fa-ul sns-link">
						<li><a href="https://www.facebook.com/concrete5japan" target="_blank"><i class="fa fa-facebook-square"></i></a></li>
						<li><a href="https://twitter.com/concrete5japan" target="_blank"><i class="fa fa-twitter-square"></i></a></li>
						<li><a href="https://www.youtube.com/user/concrete5japan" target="_blank"><i class="fa fa-youtube-square"></i></a></li>
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
		<?php 
		$u = new User();
		if ($u->isRegistered()) { ?>
			<?php  
			if (Config::get("ENABLE_USER_PROFILES")) {
				$userName = '<a href="' . $this->url('/profile') . '"><i class="fa fa-user"></i>' . $u->getUserName() . 'さんのプロフィール</a>';
			} else {
				$userName = '<i class="fa fa-user"></i>'.$u->getUserName();
			}
			?>
		<ul class="nav navbar-nav navbar-right fa-ul">
				<li class="logged-in"><b><?php echo $userName ;?></b></li>
				<li><a href="<?php echo $this->url('/login', 'logout')?>"><i class="fa fa-sign-out"></i> <?php echo t('Sign Out')?></a></li>
		</ul>
		<?php  } else { ?>
		<ul class="nav navbar-nav navbar-right fa-ul">
				<li><a href="<?php echo $this->url('/login', 'forward') . $c->getCollectionID() . '/';?>"><i class="fa fa-unlock-alt"></i> ログイン</a></li>
				<li><a href="<?php echo $this->url('/register')?>"><i class="fa fa-user"></i> 新規登録</a></li>
		</ul>
		<?php  } ?>
			<form action="http://concrete5-japan.org/search/" id="cse-search-box" class="navbar-form" role="search">
				<input type="hidden" name="cx" value="partner-pub-9838343653530325:5379575045">
				<input type="hidden" name="cof" value="FORID:10">
				<input type="hidden" name="ie" value="UTF-8">
				<div class="form-responsive">
					<div class="form-group">
						<input type="text" class="form-control" name="q" placeholder="Search">
					</div>
					<button type="submit" name="sa" class="btn-search"><i class="fa fa-search"></i></button>
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
