<?php
defined('C5_EXECUTE') or die("Access Denied.");
$this->inc('elements/header.php');
?>

<div class="breadcrumb-container">
	<nav class="container">
		<?php
		    $a = new GlobalArea('breadcrumb');
		    $a->display();
		?>
	</nav>
</div>

<div class="container">
	<div class="row">
		<div id="main" class="col-md-8" role="main">
			<article class="default-article">
				<h1>
					<?php
						$a = new Area('h1');
						$a->display($c);
					?>
				</h1>
				<?php
					$a = new Area('content');
					$a->display($c);
				?>
			</article>
		</div>
		<div id="sidebar" class="col-md-4" role="complementary">
			<aside class="sidebar-title">
				<?php
					$a = new Area('sidebar-title-link');
					$a->display($c);
				?>
			</aside>
			<nav class="nav-sidebar">
				<?php
					$a = new Area('sidebar-nav');
					$a->display($c);
				?>
				<ul class="nav sidenav fa-ul">
					<li><a href="#"><i class="fa fa-chevron-right pull-right"></i>インストール・アップグレード</a>
						<ul class="fa-ul">
							<li><a href="#"><i class="fa fa-li fa-play"></i>インストール準備インストール準備インストール準備</a></li>
							<li><a href="#"><i class="fa fa-li fa-play"></i>インストール準備インストール準備インストール準備</a></li>
							<li><a href="#"><i class="fa fa-li fa-play"></i>インストール準備</a>
								<ul class="fa-ul">
									<li><a href="#"><i class="fa fa-li fa-angle-right"></i>インストール準備</a></li>
									<li><a href="#"><i class="fa fa-li fa-angle-right"></i>インストール準備インストール準備インストール準備インストール準備インストール準備</a></li>
									<li><a href="#"><i class="fa fa-li fa-angle-right"></i>インストール準備</a></li>
									<li><a href="#"><i class="fa fa-li fa-angle-right"></i>インストール準備</a></li>
								</ul>
							</li>
							<li><a href="#"><i class="fa fa-li fa-play"></i>インストール準備インストール準備インストール準備</a></li>
							<li><a href="#"><i class="fa fa-li fa-play"></i>インストール準備インストール準備インストール準備</a></li>
							<li><a href="#"><i class="fa fa-li fa-play"></i>インストール準備</a>
								<ul class="fa-ul">
									<li><a href="#"><i class="fa fa-li fa-angle-right"></i>インストール準備</a></li>
									<li><a href="#"><i class="fa fa-li fa-angle-right"></i>インストール準備インストール準備インストール準備インストール準備インストール準備</a></li>
									<li><a href="#"><i class="fa fa-li fa-angle-right"></i>インストール準備</a></li>
									<li><a href="#"><i class="fa fa-li fa-angle-right"></i>インストール準備</a></li>
								</ul>
							</li>
						</ul>
					</li>
					<li><a href="#"><i class="fa fa-chevron-right pull-right"></i>インストール・アップグレード</a></li>
					<li><a href="#"><i class="fa fa-chevron-right pull-right"></i>インストール・アップグレード</a></li>
				</ul>
			</nav>
		</div>
	</div><!--row-->
</div><!--container-->


<?php $this->inc('elements/footer.php');?>