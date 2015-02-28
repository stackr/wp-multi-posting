<?
/*
*   naver 블로깅
*   Last updated : (11.11.29) 임민형
*/
function multi_posting_naver($naver_id,$naver_blogid,$naver_api,$title,$description,$tag){
	$GLOBALS['xmlrpc_internalencoding'] = 'utf-8';
	$g_blog_url = "https://api.blog.naver.com/xmlrpc";

	$user_id = $naver_id;

	$blogid = $naver_blogid;
	$password = $naver_api;
	$publish = true; //게시글 공게 여부 설정 




	$client = new xmlrpc_client($g_blog_url);

	$client->setSSLVerifyPeer(false); 

	$struct = array(

	'title' => new xmlrpcval($title, "string"), 

	'description' => new xmlrpcval("이 글은 <a href=\"".home_url()."\">".get_option('blogname')."</a>에서 자동 포스팅된 글입니다.<br><br>".$description."<br><br>원문은 <a href=\"".home_url()."\">".get_option('blogname')."</a>에서 확인 가능합니다.", "string") 

	);




	$f = new xmlrpcmsg("metaWeblog.newPost", 

	array( 

	new xmlrpcval($blogid, "string"),

	new xmlrpcval($user_id, "string"),

	new xmlrpcval($password, "string"),

	new xmlrpcval($struct , "struct"), 

	new xmlrpcval($publish, "boolean")

         ));


$f->request_charset_encoding = 'UTF-8';

return $response = $client->send($f);
}
?>