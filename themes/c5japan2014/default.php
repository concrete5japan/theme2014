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
		<div id="main" class="col-md-8" role="main">
			<article class="default-article">
				<?php
					$a = new Area('Main');
					$a->display($c);
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