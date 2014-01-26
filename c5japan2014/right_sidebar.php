<?php
defined('C5_EXECUTE') or die("Access Denied.");
$this->inc('elements/header.php');
?>

<div class="row container">

	<div id="main-content-container" class="col-sm-8 container">
		<div id="main-content-inner">
			<?php
			$a = new Area('Main');
			$a->display($c);
			?>
		</div>
	</div>

	<div id="right-sidebar-container" class="col-sm-4 container">
		<div id="right-sidebar-inner">
			<?php
			$a = new Area('Sidebar');
			$a->display($c);
			?>
		</div>
	</div>
</div>	
<!-- end main content columns -->

<?php $this->inc('elements/footer.php'); ?>
