<?php defined('C5_EXECUTE') or die("Access Denied."); ?>

<div class="row">
<div class="col-md-8 col-md-offset-2">

<div class="panel panel-default">
<div class="panel-heading">
<h1 class="panel-title"><?php echo t('Site Registration')?></h1>
</div>
<div class="panel-body">

<div class="ccm-form">

<?php 
$attribs = UserAttributeKey::getRegistrationList();

if($success) { ?>
<div class="form-group">
<div class="col-md-12">
<?php	switch($success) { 
		case "registered": 
			?>
			<p><strong><?php echo $successMsg ?></strong><br/><br/>
			<a href="<?php echo $this->url('/')?>" class="btn btn-primary"><?php echo t('Return to Home')?></a></p>
			<?php 
		break;
		case "validate": 
			?>
			<p><?php echo $successMsg[0] ?></p>
			<p><?php echo $successMsg[1] ?></p>
			<p><a href="<?php echo $this->url('/')?>" class="btn btn-primary"><?php echo t('Return to Home')?></a></p>
			<?php
		break;
		case "pending":
			?>
			<p><?php echo $successMsg ?></p>
			<p><a href="<?php echo $this->url('/')?>" class="btn btn-primary"><?php echo t('Return to Home')?></a></p>
            <?php
		break;
	} ?>
			</div>
</div>
<?php 
} else { ?>

<form method="post" action="<?php echo $this->url('/register', 'do_register')?>" class="form-horizontal">
	<fieldset>
		<legend><?php echo t('Your Details')?></legend>
		<?php if ($displayUserName) { ?>
			<div class="form-group">
				<?php echo $form->label('uName',t('Username'),array('class'=>'col-md-3 control-label')); ?>
				<div class="col-md-9">
					<?php echo $form->text('uName',array('class'=>'form-control')); ?>
					<p class="help-block"><?php echo t('A username must be at least %s characters long.', USER_USERNAME_MINIMUM)?></p>
					<p class="help-block">
					<?php
					if(USER_USERNAME_ALLOW_SPACES) {
						echo t('A username may only contain letters, numbers and spaces.');
					} else {
						echo t('A username may only contain letters or numbers.');
					}
					?>
					</p>
				</div>
			</div>
		<?php } ?>
	
		<div class="form-group">
			<?php echo $form->label('uEmail',t('Email Address'),array('class'=>'col-md-3 control-label')); ?>
			<div class="col-md-9">
				<?php echo $form->text('uEmail',array('class'=>'form-control')); ?>
			</div>
		</div>
		<div class="form-group">
			<?php echo $form->label('uPassword',t('Password'),array('class'=>'col-md-3 control-label')); ?>
			<div class="col-md-9">
				<?php echo $form->password('uPassword',array('class'=>'form-control')); ?>
			</div>
		</div>
		<div class="form-group">
			<?php echo $form->label('uPasswordConfirm',t('Confirm Password'),array('class'=>'col-md-3 control-label')); ?>
			<div class="col-md-9">
				<?php echo $form->password('uPasswordConfirm',array('class'=>'form-control')); ?>
				<p class="help-block"><?php echo t('A password must be between %s and %s characters', USER_PASSWORD_MINIMUM, USER_PASSWORD_MAXIMUM)?></p>
			</div>
		</div>

<?php if (count($attribs) > 0) { ?>

		<legend><?php echo t('Options')?></legend>
	<?php
	
	$af = Loader::helper('form/attribute');
	
	foreach($attribs as $ak) { ?>
		<div class="form-group">
			<div class="col-md-9 col-md-offset-3">
				<?php echo $af->display($ak)?>
			</div>
		</div>
	<?php }?>
<?php } ?>
	<?php if (ENABLE_REGISTRATION_CAPTCHA) { ?>
	
		<div class="form-group">
			<?php $captcha = Loader::helper('validation/captcha'); ?>
			<div class="col-md-9 col-md-offset-3">
			<?php
			echo $captcha->label();
			$captcha->showInput(); 
			$captcha->display();
			?>
			</div>
		</div>
	
		
	<?php } ?>
	</fieldset>

	<div class="clearfix">
	<?php echo $form->hidden('rcID', $rcID); ?>
	<?php echo $form->submit('register', t('Register') . ' &gt;', array('class' => 'btn btn-primary center-block'))?>
	</div>
	

</form>
<?php } ?>

</div>
</div>

</div>
</div>
