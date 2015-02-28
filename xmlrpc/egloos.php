<?
    /*
	*   이글루스
    *   Last updated : (09.08.17) 임민형
    */
function multi_posting_egloos($egloos_api,$egloos_id,$subject,$body,$tag){
	$GLOBALS['xmlrpc_internalencoding'] = 'utf-8';

	$apiKEY = $egloos_api;
	$userid = $egloos_id;
	$body = "이 글은 <a href=\"".home_url()."\">".get_option('blogname')."</a>에서 자동 포스팅된 글입니다.<br><br>".$body."<br><br>원문은 <a href=\"".home_url()."\">".get_option('blogname')."</a>에서 확인 가능합니다.";
	$f = new xmlrpcmsg("metaWeblog.newPost",
	array( 
		new xmlrpcval("", "string"),
		new xmlrpcval($userid, "string"),
		new xmlrpcval($apiKEY, "string"),
		new xmlrpcval(
			array(
				'title' => new xmlrpcval($subject),
				'description' => new xmlrpcval($body),
				'category' => new xmlrpcval($tag)
			),"struct"),
		new xmlrpcval(true, "boolean") )
	);


	$c = new xmlrpc_client("/rpc1","rpc.egloos.com", 80);
	$r = $c->send($f);
	$v = $r->value();

}
?>