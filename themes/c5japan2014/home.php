<?php
defined('C5_EXECUTE') or die("Access Denied.");
$this->inc('elements/header.php');
?>
<div class="container">
	
	<div class="row">
		<div class="col-sm-6">
			<?php
			$a = new Area('Main1');
			$a->display($c);
			?>
		</div>
		
		<div class="col-sm-6">
			<?php
			$a = new Area('Main2');
			$a->display($c);
			?>
		</div>
	</div>
	
	
	
	<div class="row">
		<div class="col-sm-6">
			<?php
			$a = new Area('Main3');
			$a->display($c);
			?>
		</div>
		
		<div class="col-sm-6">
			<?php
			$a = new Area('Main4');
			$a->display($c);
			?>
		</div>
		
		<div class="col-sm-6">
			<?php
			$a = new Area('Main5');
			$a->display($c);
			?>
		</div>
	</div>
</div>


<!-- end full width content area -->

<?php $this->inc('elements/footer.php'); ?>
