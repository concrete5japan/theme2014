<?php defined('C5_EXECUTE') or die("Access Denied."); ?>

<!DOCTYPE html>
<html lang="<?= LANGUAGE ?>">

	<head>

		<?php Loader::element('header_required'); ?>

		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<!-- Bootstrap -->
        <link rel="stylesheet" href="<?php echo $this->getThemePath(); ?>/css/bootstrap.min.css" rel="stylesheet">
        <script src="<?php echo $this->getThemePath(); ?>/js/bootstrap.min.js"></script>

	</head>
	<body>
		

			<header id="header" class ="row">
				<div class="container">
					<div class="col-sm-9">
						<?php
						$a = new GlobalArea('Site Name');
						$a->display();
						?>
					</div>
					<div class="col-sm-3">
						<?php
						$a = new GlobalArea('Header Right');
						$a->display();
						?>
					</div>
				</div>
			</header>

			