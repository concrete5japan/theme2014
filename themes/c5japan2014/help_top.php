<?php defined('C5_EXECUTE') or die("Access Denied."); ?>
<?php $this->inc('elements/header.php');?>

<script src="<?php echo $this->getThemePath(); ?>/js/tile.min.js"></script>
<script>
  $(function(){
    $(".tile").tile();
});
</script>

<div class="breadcrumb-container">
	<nav class="container">
		<?php
		    $a = new GlobalArea('header');
		    $a->display();
		?>
	</nav>
</div>
<div class="container help">
	<div class="row">
		<div id="main" class="col-md-12" role="main">
			<article class="default-article">
				<?php
					$a = new Area('main');
					$a->display($c);
				?>
			</article>
		</div>
	</div>

	<div class="row">
		<?php
			$a = new Area('help_auto_nav');
			$a->display($c);
		?>
	</div>
		
</div><!--container-->

<?php $this->inc('elements/footer.php');?>