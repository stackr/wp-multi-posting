<?
    /*
	*   티스토리
    *   Last updated : (11.11.29) 임민형
	*	최초 개발: 09.08.19
	*   API 변경으로 수정 (11.11.29)
    */

function multi_posting_tistory($tistory_blogurl,$tistory_token,$title,$description,$tag){
	$apiurl = 'https://www.tistory.com/apis/post/write';
	$visibility = 2;
	$description = "이 글은 <a href=\"".home_url()."\">".get_option('blogname')."</a>에서 자동 포스팅된 글입니다.<br><br>".$description."<br><br>원문은 <a href=\"".home_url()."\">".get_option('blogname')."</a>에서 확인 가능합니다.";
	$post_data = array(
		'targetUrl' => $tistory_blogurl,
		'access_token' => $tistory_token,
		'title' => $title,
		'content' => $description,
		'visibility' => $visibility
	);
	$result = mh_post_request($apiurl,$post_data);

/*	$GLOBALS['xmlrpc_internalencoding'] = 'utf-8';
	$g_blog_url = $tistory_api;

	$blogid = $tistory_id;
	$password = $tistory_key;
	$publish = true; //게시글 공게 여부 설정 


	echo $g_blog_url.','.$blogid.','.$password;

	$client = new xmlrpc_client($g_blog_url);

	$client->setSSLVerifyPeer(false); 

	$struct = array(

	'title' => new xmlrpcval($title, "string"), 

	'description' => new xmlrpcval($description, "string") 

	);




	$f = new xmlrpcmsg("metaWeblog.newPost", 

	array( 

		new xmlrpcval($blogid, "string"),
		new xmlrpcval($password, "string"),
		new xmlrpcval($struct , "struct"), 
	 ));


	$f->request_charset_encoding = 'UTF-8';
	$response = $client->send($f);
exit;
	return $response = $client->send($f);
	
*/
}
?>