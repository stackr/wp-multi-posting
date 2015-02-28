<?php
if(!function_exists('add_action')){
	require_once(dirname(dirname(dirname(dirname(dirname(dirname(dirname(dirname(__FILE__)))))))).'/wp-load.php');
}

update_option('daum_access_token',$_COOKIE['access_token']);
update_option('daum_access_token_secret',$_COOKIE['access_token_secret']);

setcookie('access_token','',time()-3600);
setcookie('access_token_secret','',time()-3600);
echo '<script type="text/javascript">
	window.opener.document.location.href = window.opener.document.URL;
	window.close();
</script>';

?>