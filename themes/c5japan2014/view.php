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
	<?php if (isset($error) && $error != '') {
		if ($error instanceof Exception) {
			$_error[] = $error->getMessage();
		} else if ($error instanceof ValidationErrorHelper) { 
			$_error = $error->getList();
		} else if (is_array($error)) {
			$_error = $error;
		} else if (is_string($error)) {
			$_error[] = $error;
		}
		
		if($_error) { ?>
<div class="container">
		<div class="row">
		<div class="col-md-8 col-md-offset-2">
		<div class="alert alert-danger">
			<?php foreach($_error as $e) { ?>
				<p><?php echo $e?></p>
			<?php } ?>
		<?php } ?>
		</div>
		</div>
		</div>
</div>
	<?php } ?>

<div class="container">
	<div class="row">
		<div id="main" role="main">
			<article class="default-article">
	<?php print $innerContent; ?>
			</article>
		</div>
	</div>
</div>
<!-- end full width content area -->

<?php $this->inc('elements/footer.php'); ?>
