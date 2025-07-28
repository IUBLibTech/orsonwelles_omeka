<?php

class IuWebsitePlugin extends Omeka_Plugin_AbstractPlugin
{
    protected $_hooks = array('public_head','public_body','public_footer');

    function hookpublichead()
    {		
	?>
<?php }

function hookpublicbody()
	{
		$head_html = file_get_contents('https://assets.iu.edu/brand/3.x/header-iub.html');
		$head_html = $head_html . '    <div id="toggles">
	<div class="row pad">
	             <!--<button class="button hide-for-large" data-toggle="offCanvas">Menu</button> 
          <a class="button search-toggle" href="/solr-search">Open Search Feature</a>-->
	</div>
      </div>';
		echo $head_html;
	}
	
function hookpublicfooter()
	{
		$foot_html = file_get_contents('https://assets.iu.edu/brand/3.x/footer.html');
		echo $foot_html;
?>
		<script>
		var newPrivacyURL = 'http://www.iu.edu/comments/privacy.shtml';
		(oldPrivacyURL = document.getElementById('privacy-policy-link')) ? (oldPrivacyURL.href = newPrivacyURL) : '';
		</script>
<?php }
	
	/*
	* Admin with jwplayer
	*/
    function iuwebsite_admin_head()
    {
    }	
}
?>