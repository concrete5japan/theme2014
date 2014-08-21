<?php 
defined('C5_EXECUTE') or die(_("Access Denied."));

$c = Page::getCurrentPage();
$u = new User();
$loginURL= $this->url('/login', 'do_login' );

if ($u->isRegistered() && $hideFormUponLogin) { ?>
<div class="row">
	<?php   
		if (Config::get("ENABLE_USER_PROFILES")) { ?>
			<div class="col-xs-6">
				<div class="btn-navy text-center"><a class="btn btn-success btn-lg" href="<?php echo $this->url('/profile') ?>"><i class="fa fa-user pull-left icon-btn-navy"></i>プロフィール</a></div>
			</div>
	<?php } ?>
	<div class="col-xs-6">
		<div class="btn-navy text-center"><a href="<?php  echo $this->url('/login', 'logout')?>" class="btn btn-success btn-lg"><b><?php echo $userName ;?></b><i class="fa fa-sign-out"></i></i>ログアウト</a></div>
	</div>
</div>
<?php   } else { ?>	
<div class="row">
	<div class="col-xs-6">
		<div class="btn-navy text-center"><a class="btn btn-success btn-lg" href="<?php echo $this->url('/login', 'forward') . $c->getCollectionID() . '/';?>"><i class="fa fa-unlock-alt pull-left icon-btn-navy"></i> ログイン</a></div>
	</div>
	<div class="col-xs-6">
		<div class="btn-navy text-center"><a class="btn btn-success btn-lg" href="<?php echo $this->url('/register')?>"><i class="fa fa-user pull-left icon-btn-navy"></i>  新規登録</a></div>
	</div>
</div>
<?php  } // end if not logged in  ?>