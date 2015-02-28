<?php
$mh_siteurl = $_SERVER['HTTP_HOST'];
session_set_cookie_params(0,"/",$mh_siteurl);
if(!function_exists('add_action')){
	require_once(dirname(dirname(dirname(dirname(dirname(dirname(dirname(__FILE__))))))).'/wp-load.php');
}


$redirect_site = $_COOKIE['mh_siteurl'];
if($_GET['access_token']){
	$access_token = $_GET['access_token'];
	update_option('tistory_access_token',$access_token);
	update_option('tistory_ac','2');
	echo '<script type="text/javascript">
		window.opener.document.location.href = window.opener.document.URL;
		window.close();
	</script>';
}else{
	$redirect_uri = $userdata->source_domain;

	$authorization_code = $_REQUEST['code'];
	 
	$client_id = get_option('tistory_clientid');
	$client_secret = get_option('tistory_secret');
	$redirect_uri = home_url("/wp-content/plugins/HotPack/modules/multi_posting/authorize/tistory.php");
	$grant_type = 'authorization_code';

	$url = 'https://www.tistory.com/oauth/access_token/?code=' . $authorization_code .
			'&client_id=' . $client_id . '&client_secret=' . $client_secret .
			'&redirect_uri=' . urlencode($redirect_uri) . '&grant_type=' . $grant_type;

	$access_token = wp_remote_get($url);
	
	$access_token = $access_token['body'];
	$access_token = explode('=',$access_token);
	$href = home_url("/wp-content/plugins/HotPack/modules/multi_posting/authorize/tistory.php?access_token=".trim($access_token[1]));
	if($access_token[0] == 'access_token'){
		echo '<script type="text/javascript">
			location.href = "'.$href.'";
		</script>';
	}
	exit;
	
}
?>
