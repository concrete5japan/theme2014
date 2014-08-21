<?php	 defined('C5_EXECUTE') or die("Access Denied.");
$th = Loader::helper('text');
?>
<div id="ccm-profile-wrapper">
    <?php	 Loader::element('profile/sidebar', array('profile'=> $profile)); ?>    
    <div id="ccm-profile-body">	
    	<div id="ccm-profile-body-attributes">
    	<div class="ccm-profile-body-item">
    	
        <h1><?php echo $profile->getUserName()?></h1>
        <?php	
        $uaks = UserAttributeKey::getPublicProfileList();
        foreach($uaks as $ua) { ?>
            <div>
                <dt><?php	echo tc('AttributeKeyName', $ua->getAttributeKeyName())?></dt>
                <dd style="margin:16px;">
                <?php
                $atval = $profile->getAttribute($ua, 'displaySanitized', 'display');
				if ($ua->getAttributeKeyHandle() == "twitter") {
					// ToDo: autolink
					$atval = $th->twitterAutolink($atval);
				} else {
					$atval = $th->autolink($atval, $newWindow = 1);
					$atval = nl2br($atval);
				}
                echo $atval;
                ?>
                </dd>
            </div>
        <?php	 } ?>		
        
        </div>

		</div>
		
		<?php	 
			$a = new Area('Main'); 
			$a->setAttribute('profile', $profile); 
			$a->setBlockWrapperStart('<div class="ccm-profile-body-item">');
			$a->setBlockWrapperEnd('</div>');
			$a->display($c); 
		?>
		
    </div>
	
	<div class="ccm-spacer"></div>
	
</div>