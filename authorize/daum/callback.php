<?php
require "daum.config.php";
require_once(dirname(dirname(dirname(__FILE__))).'/OAuth/daum.class.OAuth.php');
$redirect_site = $_COOKIE['mh_siteurl'];
if($_GET['oauth_verifier']){
	try{
		print_r($_COOKIE);
		$connection = new DaumOAuth(CONSUMER_KEY, CONSUMER_SECRET, $_COOKIE['access_token'], $_COOKIE['access_token_secret']);
		$access_token = $connection->getAccessToken($_GET['oauth_verifier']);	
		
		//$oauth->setToken($_GET['oauth_token'], $_COOKIE['request_token_secret']);
		//$access_token_info = $oauth->getAccessToken($access_token_url, null, $_GET['oauth_verifier']);
		
		//unset($_COOKIE['request_token_secret']);
		unset($_COOKIE['access_token']);
		unset($_COOKIE['access_token_secret']);
		$mh_siteurl = $_SERVER['HTTP_HOST'];
		setcookie('access_token',$access_token['oauth_token'],time()+3600,'/',$mh_siteurl);
		setcookie('access_token_secret', $access_token['oauth_token_secret'],time()+3600,'/',$mh_siteurl);
		//print_r($_COOKIE);
		header('Location:'.home_url("/wp-content/plugins/HotPack/modules/multi_posting/authorize/daum/redirect.php"));
	}catch(OAuthException $E){
		print_r($E);
		exit;
	}
}
?>