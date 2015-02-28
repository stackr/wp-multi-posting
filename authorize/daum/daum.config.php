<?php
if(!function_exists('add_action')){
	require_once(dirname(dirname(dirname(dirname(dirname(dirname(dirname(dirname(__FILE__)))))))).'/wp-load.php');
}
$request_token_url = "https://apis.daum.net/oauth/requestToken";

$authorize_url = "https://apis.daum.net/oauth/authorize";


$access_token_url = "https://apis.daum.net/oauth/accessToken";

$consumer_key = get_option('daumoauth_key');//"835fbcaf-086c-4041-9cc1-50b75c43f08d";
$consumer_secret = get_option('daumoauth_secret');//"tVqk8rxMRBHKhVdzm2CKcUcgiPpoRPtnHOcSjSUG2XMo4rN6ewNBdw00";
$callback_url = home_url("/wp-content/plugins/HotPack/modules/multi_posting/authorize/daum/callback.php");

$api_url = 'https://apis.daum.net';

define('CONSUMER_KEY', get_option('daumoauth_key'));
define('CONSUMER_SECRET', get_option('daumoauth_secret'));
define('OAUTH_CALLBACK', $callback_url);
?>