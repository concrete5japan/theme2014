<?php defined('C5_EXECUTE') or die(_("Access Denied.")); ?>

<ul class="nav navbar-nav fa-ul">
	<?php foreach ($links as $link): ?>
		<li>
			<a href ="<?php echo $link->url ?>" target="_self">
				<?php $nav_item_class = trim($link->cObj->getAttribute('nav_item_class')); ?>
				<?php if (empty($nav_item_class)) { ?>
					<i class="fa fa-lightbulb-o"></i>
				<?php } else { ?>
					<i class="<?php echo h($link->cObj->getAttribute('nav_item_class')) ?>"></i>
				<?php } ?>
				<?php echo h($link->text, ENT_QUOTES, APP_CHARSET); ?>
			</a>
		</li>
	<?php endforeach; ?>
</ul>
