<?php defined('C5_EXECUTE') or die("Access Denied."); ?>
<div class="home-footer">
	<div class="container">
		<div class="row">
			<div class="col-md-4">
				<nav class="footer-nav">
					<?php
						$a = new GlobalArea('footer1');
						$a->display();
					?>
				</nav>
			</div>
			<div class="col-md-4">
				<nav class="footer-nav">
					<?php
						$a = new GlobalArea('footer2');
						$a->display();
					?>
				</nav>
			</div>
			<div class="col-md-4">
				<nav class="footer-nav">
					<?php
						$a = new GlobalArea('footer3');
						$a->display();
					?>
				</nav>
			</div>
		</div><!--row-->
	</div><!--container-->
	<div class="container">
		<footer>
			<p>© 2009-2014 <a href="/">Concrete5 Japan Users Group</a> &amp; <a href="http://concrete5.org" target="_blank">Concrete CMS, Inc.</a>.<br>
			concrete5はMITライセンスで配布されているオープンソースCMSです。<br>
			"concrete5"のロゴならびに名称は、<a href="http://concrete5.org/" target="_blank">Concrete CMS, Inc.</a>と<a href="http://concrete5.co.jp/" target="_blank">コンクリートファイブジャパン株式会社</a>の登録商標です。<a href="/about/use_of_concrete5_logo/">名称とロゴの使用について</a>。<br>
			All rights reserved. サイト内の情報の著作権は放棄しておりません。</p>
		</footer>
	</div><!--container-->
</div><!--home-footer-->
<?php Loader::element('footer_required'); ?>
</body>
</html>