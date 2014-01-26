<?php defined('C5_EXECUTE') or die("Access Denied."); ?>
	<footer id="footer">
		<div class="container">
			<div class="row">
				
						<div class="col-sm-4">
									<?php
									$a = new GlobalArea('Footer 1');
									$a->display();
									?>
						</div>
						
						<div class="col-sm-4">
									<?php
									$a = new GlobalArea('Footer 2');
									$a->display();
									?>
						</div>
						
						<div class="col-sm-4">
									<?php
									$a = new GlobalArea('Footer 3');
									$a->display();
									?>
						</div>
		</div>
		</div>
		
		
	</footer>
</div>
<?php Loader::element('footer_required'); ?>
</body>
</html>