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
		    		<h1><?php echo h($c->getCollectionName()); ?></h1>
					<?php
					$a = new GlobalArea('SocialButton');
					$a->display();
					$week = array("(日) ", "(月) ", "(火) ", "(水) ", "(木) ", "(金) ", "(土)");
					$event_start	= strtotime($c->getCollectionAttributeValue("event_start"));
					$event_start_d	= date('Y年m月d日 ', $event_start);
					$event_start_w	= date("w", $event_start);
					$event_end		= strtotime($c->getCollectionAttributeValue("event_end"));
					$event_end_d	= date('Y年m月d日 ', $event_end);
					$event_end_w	= date("w", $event_end);
		
					if($event_start){
						echo '<p>開催日時：'. $event_start_d . $week[$event_start_w] . date(' H:i', $event_start);
						if($event_end){
							echo '〜';
							if ($event_start_d != $event_end_d) {
								echo $event_end_d . $week[$event_end_w];
							}
						echo date('H:i', $event_end);
						}
						echo '</p>';
					}
					$a = new Area('Main');
					$a->display($c);
					$a = new GlobalArea('SocialButton');
					$a->display();
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