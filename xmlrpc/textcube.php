<?
    /*
	*   텍스트큐브
    *   Last updated : (09.08.19) 임민형
    */
function multi_posting_textcube($textcube_api,$textcube_id,$textcube_pw,$textcube_apiadd,$subject,$body,$tag){
	$GLOBALS['xmlrpc_internalencoding'] = 'utf-8';

	$apiKEY = $textcube_api;
	$userID = $textcube_id;
	$userPW = $textcube_pw;
	$apiADD = $textcube_apiadd;
	
	$f = new xmlrpcmsg("metaWeblog.newPost",
	array( 
		new xmlrpcval($apiKEY, "string"),
		new xmlrpcval($userID, "string"),
		new xmlrpcval($userPW, "string"),
		new xmlrpcval(
			array(
				'title' => new xmlrpcval($subject),
				'description' => new xmlrpcval($body),
				'category' => new xmlrpcval($tag)
			),"struct"),
		new xmlrpcval(true, "boolean") )
	);


	$c = new xmlrpc_client("/api/blogapi",$apiADD, 80);

	$r = $c->send($f);
	$v = $r->value();

}
?>