<?
/*
*   daum 블로깅
*   Last updated : (09.11.29) 임민형
*   09.08.18 : 최초 개발
*   11.11.29 : API 변경으로 재개발
*/
function multi_posting_daum($daum_access_token,$daum_access_token_secret,$daum_blogurl,$subject,$body,$tag){
	include(dirname(dirname(__FILE__))."/authorize/daum/daum.config.php");
	require_once(dirname(dirname(__FILE__)).'/OAuth/daum.class.OAuth.php');
	$connection = new DaumOAuth(CONSUMER_KEY, CONSUMER_SECRET,$daum_access_token,$daum_access_token_secret);
	$body = "이 글은 <a href=\"".home_url()."\">".get_option('blogname')."</a>에서 자동 포스팅된 글입니다.<br><br>".$body."<br><br>원문은 <a href=\"".home_url()."\">".get_option('blogname')."</a>에서 확인 가능합니다.";
	$post_data = array(
		'blogName'=>$daum_blogurl,
		'title'=>$subject,
		'content'=>$body,
		'tag'=>'',
		'output'=>'json'
	);

	$write_api = 'https://apis.daum.net/blog/post/write.do';
	//$write_api = 'https://apis.daum.net/blog/v1/'.$daum_blogurl.'/write.xml';
	$return = $connection->post($write_api,$post_data,OAUTH_HTTP_METHOD_POST);
	//$xml = simplexml_load_string($connection->getLastResponse());
	print_r($return);
	die();

	
}
?>