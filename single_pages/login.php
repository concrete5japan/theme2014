<?php defined('C5_EXECUTE') or die("Access Denied."); ?>
<?php Loader::library('authentication/open_id');?>
<?php $form = Loader::helper('form'); ?>

<script type="text/javascript">
$(function() {
	$("input[name=uName]").focus();
});
</script>

<div class="row">
<div class="col-md-8 col-md-offset-2">

<?php if (isset($intro_msg)) { ?>
<div class="alert alert-success"><p><?php echo $intro_msg?></p></div>
<?php } ?>

<div class="panel panel-default">
<div class="panel-heading">
<h1 class="panel-title"><?php echo t('Sign in to %s', SITE)?></h1>
</div>
<div class="panel-body">

<?php if( $passwordChanged ){ ?>

	<div class="alert alert-success"><p><?php echo t('Password changed.  Please login to continue. ') ?></p></div>

<?php } ?> 

<?php if($changePasswordForm){ ?>

	<div class="ccm-form">	

	<form method="post" action="<?php echo $this->url( '/login', 'change_password', $uHash )?>" class="form-horizontal"> 
	<fieldset>
		
		<legend><?php echo t('Enter your new password below.') ?></legend>

		<div class="form-group">
		<label for="uPassword" class="col-md-3 control-label"><?php echo t('New Password')?></label>
		<div class="col-md-6">
			<input type="password" name="uPassword" id="uPassword" class="ccm-input-text form-control">
		</div>
		</div>
		<div class="form-group">
		<label for="uPasswordConfirm"  class="col-md-3 control-label"><?php echo t('Confirm Password')?></label>
		<div class="col-md-6">
			<input type="password" name="uPasswordConfirm" id="uPasswordConfirm" class="ccm-input-text form-control">
		</div>
		</div>

		<div class="form-group">
		<div class="col-md-8 col-md-offset-3">
		<?php echo $form->submit('submit', t('Sign In') . ' &gt;', array('class' => 'btn btn-primary'))?>
		</div>
		</div>
		
	</fieldset>
	</form>
	
	</div>

<?php }elseif($validated) { ?>

<h3><?php echo t('Email Address Verified')?></h3>

<div class="alert alert-success">
<p>
<?php echo t('The email address <b>%s</b> has been verified and you are now a fully validated member of this website.', $uEmail)?>
</p>
</div>
<a class="btn btn-default" href="<?php echo $this->url('/')?>"><?php echo t('Continue to Site')?></a>


<?php } else if (isset($_SESSION['uOpenIDError']) && isset($_SESSION['uOpenIDRequested'])) { ?>

<div class="ccm-form">

<?php switch($_SESSION['uOpenIDError']) {
	case OpenIDAuth::E_REGISTRATION_EMAIL_INCOMPLETE: ?>

		<form method="post" action="<?php echo $this->url('/login', 'complete_openid_email')?>">
			<p><?php echo t('To complete the signup process, you must provide a valid email address.')?></p>
			<label for="uEmail"><?php echo t('Email Address')?></label><br/>
			<?php echo $form->text('uEmail')?>
				
			<div class="ccm-button">
			<?php echo $form->submit('submit', t('Sign In') . ' &gt;')?>
			</div>
		</form>

	<?php break;
	case OpenIDAuth::E_REGISTRATION_EMAIL_EXISTS:
	
	$ui = UserInfo::getByID($_SESSION['uOpenIDExistingUser']);
	
	?>

		<form method="post" action="<?php echo $this->url('/login', 'do_login')?>">
			<p><?php echo t('The OpenID account returned an email address already registered on this site. To join this OpenID to the existing user account, login below:')?></p>
			<label for="uEmail"><?php echo t('Email Address')?></label><br/>
			<div><strong><?php echo $ui->getUserEmail()?></strong></div>
			<br/>
			
			<div>
			<label for="uName"><?php if (USER_REGISTRATION_WITH_EMAIL_ADDRESS == true) { ?>
				<?php echo t('Email Address')?>
			<?php } else { ?>
				<?php echo t('Username')?>
			<?php } ?></label><br/>
			<input type="text" name="uName" id="uName" <?php echo (isset($uName)?'value="'.$uName.'"':'');?> class="ccm-input-text">
			</div>			<div>

			<label for="uPassword"><?php echo t('Password')?></label><br/>
			<input type="password" name="uPassword" id="uPassword" class="ccm-input-text">
			</div>

			<div class="ccm-button">
			<?php echo $form->submit('submit', t('Sign In') . ' &gt;')?>
			</div>
		</form>

	<?php break;

	}
?>

</div>

<?php } else if ($invalidRegistrationFields == true) { ?>

<div class="ccm-form">
	
<form method="post" action="<?php echo $this->url('/login', 'do_login')?>">
	<fieldset>
	<legend><?php echo t('You must provide the following information before you may login.')?></legend>
	
	<?php 
	$attribs = UserAttributeKey::getRegistrationList();
	$af = Loader::helper('form/attribute');
	
	$i = 0;
	foreach($unfilledAttributes as $ak) { 
		if ($i > 0) { 
			print '<br/><br/>';
		}
		print $af->display($ak, $ak->isAttributeKeyRequiredOnRegister());	
		$i++;
	}
	?>
	
	<?php echo $form->hidden('uName', Loader::helper('text')->entities($_POST['uName']))?>
	<?php echo $form->hidden('uPassword', Loader::helper('text')->entities($_POST['uPassword']))?>
	<?php echo $form->hidden('uOpenID', $uOpenID)?>
	<?php echo $form->hidden('completePartialProfile', true)?>
	
	<hr />

	<div class="ccm-button">
		<?php echo $form->submit('submit', t('Sign In'))?>
		<?php echo $form->hidden('rcID', $rcID); ?>
	</div>
	
	</fieldset>
</form>
</div>	

<?php } else { ?>

<form method="post" action="<?php echo $this->url('/login', 'do_login')?>" class="form-horizontal ccm-login-form">



<fieldset>
	
	<legend><?php echo t('User Account')?></legend>

	<div class="form-group">
	
	<label for="uName" class="col-md-3 control-label"><?php if (USER_REGISTRATION_WITH_EMAIL_ADDRESS == true) { ?>
		<?php echo t('Email Address')?>
	<?php } else { ?>
		<?php echo t('Username')?>
	<?php } ?></label>
	<div class="col-md-6">
		<input type="text" name="uName" id="uName" <?php echo (isset($uName)?'value="'.$uName.'"':'');?> class="ccm-input-text form-control">
	</div>
	
	</div>
	<div class="form-group">

	<label for="uPassword" class="col-md-3 control-label"><?php echo t('Password')?></label>
	
	<div class="col-md-6">
		<input type="password" name="uPassword" id="uPassword" class="ccm-input-text form-control" />
	</div>
	
	</div>
</fieldset>

<?php if (OpenIDAuth::isEnabled()) { ?>
	<fieldset>

	<legend><?php echo t('OpenID')?></legend>

	<div class="form-group">
		<label for="uOpenID" class="col-md-3 control-label"><?php echo t('Login with OpenID')?>:</label>
		<div class="col-md-8">
			<input type="text" name="uOpenID" id="uOpenID" <?php echo (isset($uOpenID)?'value="'.$uOpenID.'"':'');?> class="ccm-input-openid form-control">
		</div>
	</div>
	</fieldset>
<?php } ?>


	<fieldset>

	<legend><?php echo t('Options')?></legend>

	<?php if (isset($locales) && is_array($locales) && count($locales) > 0) { ?>
		<div class="form-group">
			<label for="USER_LOCALE" class="col-md-3 control-label"><?php echo t('Language')?></label>
			<div class="col-md-6"><?php echo $form->select('USER_LOCALE', $locales, '', array('class'=>'form-control'))?></div>
		</div>
	<?php } ?>
	
	<div class="form-group">
		<div class="col-md-8 col-md-offset-3">
		<label class="checkbox"><?php echo $form->checkbox('uMaintainLogin', 1)?> <span><?php echo t('Remain logged in to website.')?></span></label>
		</div>
	</div>
	<?php $rcID = isset($_REQUEST['rcID']) ? Loader::helper('text')->entities($_REQUEST['rcID']) : $rcID; ?>
	<input type="hidden" name="rcID" value="<?php echo $rcID?>" />
	
	</fieldset>

	<div class="form-group">
	<div class="col-md-8 col-md-offset-3">
	<?php echo $form->submit('submit', t('Sign In') . ' &gt;', array('class' => 'btn btn-primary'))?>
	</div>
	</div>

</form>

<a name="forgot_password"></a>

<form method="post" action="<?php echo $this->url('/login', 'forgot_password')?>" class="form-horizontal ccm-forgot-password-form">
<fieldset>

<legend><?php echo t('Forgot Your Password?')?></legend>

<p><?php echo t("Enter your email address below. We will send you instructions to reset your password.")?></p>

<input type="hidden" name="rcID" value="<?php echo $rcID?>" />
	
	<div class="form-group">
		<label for="uEmail" class="col-md-3 control-label"><?php echo t('Email Address')?></label>
		<div class="col-md-6">
			<input type="text" name="uEmail" value="" class="ccm-input-text form-control" >
		</div>
	</div>
	
	<div class="form-group">
	<div class="col-md-8 col-md-offset-3">
		<?php echo $form->submit('submit', t('Reset and Email Password') . ' &gt;', array('class' => 'btn btn-primary'))?>
	</div>
	</div>

</fieldset>
</form>


<?php if (ENABLE_REGISTRATION == 1) { ?>

<h3 class="page-header"><?php echo t('Not a Member')?></h3>
<p><?php echo t('Create a user account for use on this website.')?></p>
<div class="col-md-8 col-md-offset-3">
<a class="btn btn-default" href="<?php echo $this->url('/register')?>"><?php echo t('Register here!')?></a>
</div>

<?php } ?>

<?php } ?>

</div><!-- /.panel-body -->
</div><!-- /.panel panel-default -->
</div><!-- /.col-md-8 col-md-offset-2 -->
</div><!-- /.row -->
