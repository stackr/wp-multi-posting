<?php
/**
 * Request Token 요청
 * 다음 oAuth
 * 11.11.29
 * 임민형
 *
 */
session_start();
require_once(dirname(dirname(dirname(__FILE__))).'/OAuth/daum.class.OAuth.php');
require_once('daum.config.php');
$mh_siteurl = $_SERVER['HTTP_HOST'];

$connection = new DaumOAuth(CONSUMER_KEY, CONSUMER_SECRET);
 
/* Get temporary credentials. */
$request_token_info = $connection->getRequestToken(OAUTH_CALLBACK);

$_COOKIE['request_token_secret'] = $request_token_info['oauth_token_secret'];
setcookie('request_token_secret',$request_token_info['oauth_token_secret'],time()+3600,'/',$mh_siteurl);
$_SESSION['oauth_token'] = $token = $request_token_info['oauth_token'];
$_SESSION['oauth_token_secret'] = $request_token_info['oauth_token_secret'];
setcookie('access_token',$_SESSION['oauth_token'],time()+3600,'/',$mh_siteurl);
setcookie('access_token_secret', $_SESSION['oauth_token_secret'],time()+3600,'/',$mh_siteurl);

header('Location:'.$authorize_url.'?oauth_token='.$request_token_info['oauth_token']);
?>